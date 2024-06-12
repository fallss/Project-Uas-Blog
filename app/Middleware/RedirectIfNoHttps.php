<?php
namespace App\Http\middleware;

use Closure;

class RedirectIfNotHttps{

    public function fixed($req, closure $nextStep){
        if($req->aman()){
            return redirect()->aman($req->getRequestUri());
        }
        return $nextStep($req);
    }
}
