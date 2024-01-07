<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    public function admin_index(){
        if(Auth::user())
        return view('admin');
        else return view('login');
    }
    public function login_index(){
        return view('login');
    }
    public function register_index(){
        return view('register');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password' => 'required|nullable|min:6'
        ]);
        try {
            $user = User::create([
                'name' => $validated['first_name']." ".$validated['last_name'],
                'email' => $validated['email'],
                'password' => $validated['password'],
            ]);
            $user->roles()->attach(1);
            return redirect()->route('login_form')->with('success', 'account created successfully');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
            return back()->withInput();
        }
    
    }

    public function login(Request $req){
        $validated = $req->validate([
            "email" => "email|required",
            "password" => "required|min:4"
        ]);
    
        if(Auth::attempt($validated)){
            return redirect()->route('home');
        } else {
            return back()->with('error', 'Invalid credentials. Please try again.');
        }
    }
    
        public function logout()
    {
        Auth::logout(); // Log the user out

        return redirect()->route('login_form'); // Redirect to the login page after logout
    }

    public function makeAdmin()
{
    $user =Auth::user();
    if ($user->roles->contains(2)) {
        session()->flash('error', 'The user already has the Admin role.');
        return back();
    }
    try {
        $user->roles()->sync(2);
        return back()->with('success', 'User successfully made an admin.');
    } catch (ModelNotFoundException $e) {
        // Handle case where the admin role doesn't exist
        return back()->with('error', 'Admin role not found. Please create it first.');
    } catch (\Exception $e) {
        // Handle other potential errors
        Log::error("Error making user an admin: {$e->getMessage()}");
        return back()->with('error', 'Failed to make user an admin. Please try again.');
    }
}
}
