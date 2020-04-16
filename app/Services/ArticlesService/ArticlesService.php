<?php


namespace App\Services\ArticlesService;


use App\Article;
use App\User;

class ArticlesService
{
    public function create($data, User $user): Article {
        $article = new Article();
        $article->title = $data['title'];
        $article->text = $data['content'];
        $article->save();

        $article->users()->attach($user);
        return $article;
    }
}
