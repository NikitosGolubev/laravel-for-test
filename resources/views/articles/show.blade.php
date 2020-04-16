@extends('layouts.app')

@section('title', $article->title)

@section('page-content')
    <div class="nav">
        <a class="nav__item" href="/">Главная</a>
        <a class="nav__item" href="/articles">Мои статьи</a>
        <a class="nav__item" href="/articles/create">Написать статью</a>
        <a class="nav__item" href="/auth/logout">Выйти</a>
    </div>
    <div>
        <div class="article">
            <div class="article__title">
                <h1 class="heading">{{ $article->title }}</h1>
            </div>
            <div class="article__content">
                {{ $article->text }}
            </div>
            <div class="article__controls">
                <div class="article__control-item">
                    <a class="btn btn_color_blue" href="/articles/{{ $article->id }}/edit">
                        Изменить
                    </a>
                </div>
                <div class="article__control-item">
                    <form name="delete_article" method="POST" action="/articles/{{ $article->id }}/delete">
                        @csrf
                        @method('delete')
                        <button class="btn btn_color_pink" type="submit">Удалить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
