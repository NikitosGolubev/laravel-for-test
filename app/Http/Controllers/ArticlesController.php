<?php

namespace App\Http\Controllers;

use App\Http\Requests\Articles\CreateArticleRequest;
use App\Services\ArticlesService\ArticlesService;
use App\Services\UsersService\UsersService;

class ArticlesController extends Controller
{
    protected $articlesService;
    protected $usersService;

    public function __construct(ArticlesService $articles_service, UsersService $users_service)
    {
        $this->articlesService = $articles_service;
        $this->usersService = $users_service;
    }

    public function create() {
        return view('articles.create');
    }

    public function store(CreateArticleRequest $request) {
        $user = $this->usersService->currentAuth();
        $this->articlesService->create($request->getData(), $user);
        return redirect()->route('my-articles');
    }
}
