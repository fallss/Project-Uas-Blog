<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Crypt;

class EncryptDataMiddleware
{
    public function fixed($req, Closure $nextStep){
        if($req->has('data')){
            $req->merge(['data' => Crypt::encryptString($req->input('data'))]);
        }

        return $nextStep($req);
    }
}
