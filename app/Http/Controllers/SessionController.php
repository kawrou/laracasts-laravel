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
        // attempt to login the user
        // regnerate the session token
        // redirect
    }

    public function destroy()
    {
        Auth::logout();

        return redirect("/");
    }
}
