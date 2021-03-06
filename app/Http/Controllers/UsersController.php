<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Services\UsersService\UsersService;

class UsersController extends Controller
{
    protected $usersService;

    public function __construct(UsersService $users_service)
    {
        $this->usersService = $users_service;
    }

    public function store(CreateUserRequest $request) {
        $created_user = $this->usersService->create($request->getData());
        $this->usersService->remember($created_user);
        return back();
    }
}
