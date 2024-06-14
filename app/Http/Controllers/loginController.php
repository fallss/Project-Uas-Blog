<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
class loginController extends Controller
{
    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(Request $req){
       $req->validate([
        'email' => 'required\email',
        'password' => 'required',
       ]);

       if(Auth::attemp($req->only('email', 'password'))){
        $req->session()->regenerate();

        return redirect()->intended('dashboard');
       }

       throw ValidationException::withMessages([
        'email' => __('auth.failed'),
       ]);
    }

    public function logout(Request $req){
        Auth::logout();

        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect('/');
    }
}
