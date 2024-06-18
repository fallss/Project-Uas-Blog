<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class loginController extends Controller
{
    protected $goesTo = '/Tech';
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => 'required|string|min:6',
        ]);

        $credentials = $request->only('username','email', 'password');

        return redirect('/tech');
    }

    public function logout(Request $req)
    {
        Auth::logout();
        return redirect('/login');
    }

}
