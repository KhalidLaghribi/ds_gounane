<?php

namespace App\Http\Controllers;

use App\Models\document;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::orderBy('created_at', 'desc')->get();
        return view("home", compact('documents'));
    }
    public function form (){
        return view("formulaire");
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|unique:documents|max:255',
            'description' => 'required',
            'fichier' => 'required|nullable|mimes:pdf|max:10000'
        ],[
            'fichier.mimes' => 'The :attribute must be a PDF file.',
        ]);
    
        if ($request->hasFile('fichier') && $request->file('fichier')->isValid()) {
            $filepath = $request->file('fichier')->store('documents', 'public');
        } else {
            return back()->withInput()->with('error', 'Invalid file or file upload error');
        }
        $user = Auth::user();
        
        try {
            $document = $user->documents()->create([
                'titre' => $validated['titre'],
                'description' => $validated['description'],
                'downloads' => $filepath
            ]);

            return redirect()->route('home')->with('success', 'Document saved successfully');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to save the document: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    public function show(){
        $user = Auth::user();
        $documents = $user->documents;
        return view("listfile", compact('documents'));
    }

    public function delete($id){
        $document = Document::find($id);
        if ($document) {
            $document->delete();
            return redirect()->route('list_file')->with('success', 'Document deleted successfully');
        } else {
            return redirect()->route('list_file')->with('error', 'Document not found');
        }
    }

    public function delete_admin($id){
        $document = Document::find($id);
        if ($document) {
            $document->delete();
            return redirect()->route('home')->with('success', 'Document deleted successfully');
        } else {
            return redirect()->route('home')->with('error', 'Document not found');
        }
    }
    public function download($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login_form'); // Redirect to the login page if not logged in
        }
        $document = Document::find($id);
    
        if (!$document) {
            abort(404); // Handle not found document in your way
        }
    
        // Construct the full file path using the storage disk and 'documents' directory
        $filePath = storage_path("app/public/{$document->downloads}");
    
        if (!file_exists($filePath)) {
            abort(404); // Handle not found file in your way
        }
        $document->increment('nbr_downloads');
        // dd($filePath);
        return response()->download($filePath, $document->titre . '.pdf');
        
    }
    
}
