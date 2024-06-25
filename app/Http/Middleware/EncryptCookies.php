<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware{
    /**
     * @var array
     */
    protected $except = [
        'cookie_web',
        'cookie_kel9',
        'cookie_admin',
    ];
}
