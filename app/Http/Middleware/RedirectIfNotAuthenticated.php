<?php

namespace App\Http\Middleware;

use App\Services\UsersService\UsersService;
use Closure;

class RedirectIfNotAuthenticated
{
    protected $usersService;

    public function __construct(UsersService $users_service)
    {
        $this->usersService = $users_service;
    }

    public function handle($request, Closure $next)
    {
        if (!$this->usersService->isAuthenticated()) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
