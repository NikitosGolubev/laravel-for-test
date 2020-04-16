<?php

namespace App\Http\Controllers;

use App\Services\UsersService\UsersService;
use Illuminate\Http\Request;

class SimpleAuthController extends Controller
{
    protected $usersService;

    public function __construct(UsersService $users_service)
    {
        $this->usersService = $users_service;
    }


    public function login() {

    }

    public function logout() {
        $this->usersService->forget();
        return back();
    }
}
