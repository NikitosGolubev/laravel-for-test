<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\Articles\CreateArticleRequest;
use App\Http\Requests\Articles\UpdateArticleRequest;
use App\Services\ArticlesService\ArticlesService;
use App\Services\UsersService\UsersService;
use Illuminate\Support\Facades\Gate;

class ArticlesController extends Controller
{
    protected $articlesService;
    protected $usersService;

    public function __construct(ArticlesService $articles_service, UsersService $users_service)
    {
        $this->articlesService = $articles_service;
        $this->usersService = $users_service;
    }

    public function index() {
        $user = $this->usersService->currentAuth();
        $articles = $user->articles()->latest('updated_at')->get();
        return view('articles.index', ['articles' => $articles]);
    }

    public function create() {
        return view('articles.create');
    }

    public function store(CreateArticleRequest $request) {
        $user = $this->usersService->currentAuth();
        $this->articlesService->create($request->getData(), $user);
        return redirect()->route('my-articles');
    }

    public function show(Article $article) {
        $this->checkIfUserCanEngageWithArticle($article);
        return view('articles.show', ['article' => $article]);
    }

    public function edit(Article $article) {
        $this->checkIfUserCanEngageWithArticle($article);
        return view('articles.edit', ['article' => $article]);
    }

    public function update(UpdateArticleRequest $request, Article $article) {
        $this->checkIfUserCanEngageWithArticle($article);
        $article = $this->articlesService->edit($request->getData(), $article);
        return redirect()->route('article.show', [$article]);
    }

    public function destroy($request, Article $article) {
        $this->checkIfUserCanEngageWithArticle($article);

    }

    private function checkIfUserCanEngageWithArticle(Article $article) {
        $user = $this->usersService->currentAuth();
        if (Gate::forUser($user)->denies('engage-article', $article)) {
            abort(403, 'Это не ваша статья');
        }
    }
}
