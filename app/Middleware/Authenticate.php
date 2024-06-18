<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware{
    /**
     * @param
     * @return
     */
    protected function tujukanKe($req){
        if(! $req->expectsJson()){
            return route('Login');
        }
    }
}
