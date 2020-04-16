@extends('layouts.app')

@section('title', "Редактировать ".$article->title)

@section('page-content')
    <div class="nav">
        <a class="nav__item" href="/">Главная</a>
        <a class="nav__item" href="/articles">Мои статьи</a>
        <a class="nav__item" href="/articles/create">Написать статью</a>
        <a class="nav__item" href="/auth/logout">Выйти</a>
    </div>
    <div>
        <h2 class="heading">Редактировать статью</h2>
        <form class='article-form' id='form' method="POST" action="/articles/{{ $article->id }}/edit">
            @csrf
            @method('PUT')
            <div class="article-form__field">
                <div>
                    <div class="article-form__label">Заголовок: </div>
                    <div>
                        <input value="{{ old('title') ?? $article->title }}" class="article-form__text-input" type="text" name="title" />
                    </div>
                </div>
                <div class="article-form__field-details">
                    @error('title')
                    <span class="error-message">
                           {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="article-form__field">
                <div>
                    <div class="article-form__label">Содержание: </div>
                    <div>
                        <textarea class="article-form__text-input article-form__textarea" name="content">
{{ old('content') ?? $article->text }}</textarea>
                    </div>
                </div>
                <div class="article-form__field-details">
                    @error('content')
                    <span class="error-message">
                           {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="article-form__field">
                <div class="centered">
                    <button class="article-form__button" type="submit">Опубликовать!</button>
                </div>
            </div>
        </form>
    </div>
@endsection
