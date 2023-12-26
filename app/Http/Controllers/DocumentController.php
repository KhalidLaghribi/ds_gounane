<?php

namespace App\Http\Controllers;

use App\Models\document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::all();
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
        ]);
    
        if ($request->hasFile('fichier') && $request->file('fichier')->isValid()) {
            $filepath = $request->file('fichier')->store('documents', 'public');
        } else {
            return back()->withInput()->with('error', 'Invalid file or file upload error');
        }
    
        try {
            $document = Document::create([
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

    public function download($id)
    {
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
