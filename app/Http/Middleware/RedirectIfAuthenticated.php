<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use App\Services\UsersService\UsersService;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    protected $usersService;

    public function __construct(UsersService $users_service)
    {
        $this->usersService = $users_service;
    }

    public function handle($request, Closure $next, $guard = null)
    {
        if ($this->usersService->isAuthenticated()) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
