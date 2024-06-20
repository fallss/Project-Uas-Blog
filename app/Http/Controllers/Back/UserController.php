<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() 
    {
        return view('back.user.index', [
            'users' => User::get()
        ]);
    }
    public function store(UserRequest $request)
    {
        
        $dara = $request->validate();
    }



}