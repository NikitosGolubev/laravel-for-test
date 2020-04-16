@extends('layouts.app')

@section('title', 'Список моих статей')

@section('page-content')
    @include('subviews.nav-auth')

    <div class="create-article">
        <h2 class="heading">Мои статьи</h2>

        @if($articles->isEmpty())
            @include('subviews.empty-img')
        @endif

        <div class="articles-list">
            @foreach ($articles as $article)
                <div class="article-item articles-list__item">
                    <div class="article-item__header_wrap">
                        <a href="/articles/{{$article->id}}" class="article-item__header">
                            {{ $article->title }}
                        </a>
                    </div>
                    <div class="article-item__controls">
                        <div>Последнее обновление: {{ $article->updated_at }}</div>
                        <div class="button-controls">
                            <div class="button-controls__item">
                                <a class="btn btn_size_sm btn_color_blue" href="/articles/{{ $article->id }}/edit">
                                    Изменить
                                </a>
                            </div>
                            <div class="button-controls__item">
                                <form name="delete_article" method="POST" action="/articles/{{ $article->id }}/delete">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn_size_sm btn_color_pink" type="submit">Удалить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
