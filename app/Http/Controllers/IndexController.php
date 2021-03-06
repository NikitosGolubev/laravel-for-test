<?php

namespace App\Http\Controllers;

use App\Services\UsersService\UsersService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    protected $usersService;

    public function __construct(UsersService $users_service)
    {
        $this->usersService = $users_service;
    }

    public function index() {
        if ($this->usersService->isAuthenticated()) {
            return view('user-home');
        }

        return view('guest');
    }

    public function login() {
        return view('login');
    }
}
