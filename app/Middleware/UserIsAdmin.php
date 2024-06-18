<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserIsAdmin{
    public function handle($req, Closure $continue){
        if(Auth::user() && Auth::user()->isAdmin){
            return $continue($req);
        }
        return redirect('home')->with('error', 'User doesnt have admin access');
    }
}
?>
