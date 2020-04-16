<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\UsersService\UsersService;
use Illuminate\Http\Request;

class SimpleAuthController extends Controller
{
    protected $usersService;

    public function __construct(UsersService $users_service)
    {
        $this->usersService = $users_service;
    }

    public function login(LoginRequest $request) {
        $user = $this->usersService->getFromLoginCredentials($request->getData());
        $this->usersService->remember($user);
        return redirect()->route('home');
    }

    public function logout() {
        $this->usersService->forget();
        return back();
    }
}
