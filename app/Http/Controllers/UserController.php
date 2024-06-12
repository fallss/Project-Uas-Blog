<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;

class UserController extends Controller{
    public function showRegistrationForm(){
        return view('register');
    }

    public function register(Request $req)
    {
        $req->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|max:8|unique:confirmed',
        ]);

    User::create([
        'name' => $req->name,
        'email' => $req->email,
        'password' => bcrypt($req->password),
    ]);

    return Redirect()->route('articles.index')->with('success', 'Registration completed');
    }
}
