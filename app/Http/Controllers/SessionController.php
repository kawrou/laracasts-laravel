<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function create()
    {
        return view("auth.login");
    }

    public function store(Request $request)
    {
        // validate
        $attributes = $request->validate([
            'email'=>['required','email'],
            'password'=>['required'],
        ]); 
        
        // attempt to login the user
        Auth::attempt($attributes); 

        // regnerate the session token
        $request->session()->regenerate();

        // redirect
        return redirect('/jobs');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect("/");
    }
}
