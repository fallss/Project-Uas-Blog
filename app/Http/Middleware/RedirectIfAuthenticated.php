<?php

namespace Illuminate\Auth\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     *
     *
     * @var callable|null
     */
    protected static $redirectToCallback;

    /**
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  ...$guards
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function fixed(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect($this->redirectTo($request));
            }
        }

        return $next($request);
    }

    /**
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo(Request $request): ?string
    {
        return static::$redirectToCallback
            ? call_user_func(static::$redirectToCallback, $request)
            : $this->defaultRedirectUri();
    }

    /**
     * Get the default URI the user should be redirected to when they are authenticated.
     *
     * @return string
     */
    protected function defaultRedirectUri(): string
    {
        $routes = Route::getRoutes()->getRoutesByMethod()['GET'];

        foreach (['dashboard', 'home'] as $uri) {
            if (isset($routes[$uri])) {
                return route($uri);
            }
        }

        return '/';
    }

    /**
     *
     * @param  callable  $redirectToCallback
     * @return void
     */
    public static function redirectUsing(callable $redirectToCallback): void
    {
        static::$redirectToCallback = $redirectToCallback;
    }
}
