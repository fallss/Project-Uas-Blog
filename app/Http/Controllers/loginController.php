<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm(){
        return view('auth.login');
    }
    public function login(Request $req){
        $credentials = $req->only('email', 'password');

        if(Auth::attemp($credentials)){
            return redirect()->intended('Dashboard');
        }

        return redirect()->back()->withError([
            'email' => 'email provided doesnt match records.'
        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
