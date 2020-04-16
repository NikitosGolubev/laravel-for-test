@extends('layouts.app')

@section('title', $article->title)

@section('page-content')
    @include('subviews.nav-auth')

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
