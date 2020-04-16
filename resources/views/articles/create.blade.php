@extends('layouts.app')

@section('page-content')
    <div class="nav">
        <a class="nav__item" href="/">Главная</a>
        <a class="nav__item" href="/articles">Мои статьи</a>
        <a class="nav__item" href="/articles/create">Написать статью</a>
        <a class="nav__item" href="/auth/logout">Выйти</a>
    </div>
    <div class="create-article">
        <h2 class="heading">Написать статью</h2>
        <form class='article-form' id='form' method="POST" action="/articles/create">
            @csrf
            <div class="article-form__field">
                <div>
                    <div class="article-form__label">Заголовок: </div>
                    <div>
                        <input value="{{ old('title') }}" class="article-form__text-input" type="text" name="title" />
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
                        <textarea {{ old('content') }} class="article-form__text-input article-form__textarea" name="content">
                        </textarea>
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
