<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller{
    public function showRegistrationForm(){
        return view('register');
    }
public function register(Request $req)
{
    $validator = Validator::make($req->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ]);

    if($validator->fails()){
        return redirect()->back()
        ->withErrors($validator)
        ->withInput();
    }

    User::create([
        'name' => $req->name,
        'email' => $req->email,
        'password' => Hash::make($req->password),
    ]);

    return redirect()->route('login')->with('success', 'Registration completed. Please log in.');
}
}
?>
