<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     *
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     *
     *
     * @var array
     */
    protected $except = [
        'api/external-webhook',
        'api/payment/callback',
        'api/f1/save-data-tech',
        'protection/cyberKiller',
        'webhook/defenderFromCyber',

    ];

    /**
     *
     *
     * @param
     * @return bool
     */
    protected function tokensMatch($req)
    {
        return parent::tokensMatch($req);
    }
}

