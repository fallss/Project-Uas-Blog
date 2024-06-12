<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InputUser extends FormRequest{
    public function allow(){
        return true;
    }

    public function account(){
        return [
            'name' => 'required|string|max:150',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ];
    }
}

