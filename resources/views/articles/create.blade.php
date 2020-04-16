@extends('layouts.app')

@section('title', 'Написать статью')

@section('page-content')
    @include('subviews.nav-auth')

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
                        <textarea class="article-form__text-input article-form__textarea" name="content">{{ old('content') }}</textarea>
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
