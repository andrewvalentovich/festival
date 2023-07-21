@extends('layouts.client')

@section('content')
    <div class="type__about-title type__title">
        Архив новостей
    </div>
    <div class="type__news-list">
        @foreach($articles as $article)
            <div class="type__news-item ">
                <div class="type__news-item-pic">
                    <img src="{{ $article->image_url }}" alt="article">
                </div>
                <div class="type__news-item-text">
                    <p class="type__subtitle">
                        {{ $article->title }}
                    </p>
                    <p class="type__lead">
                        {{ $article->content }}
                    </p>
                    <a class="type__news-item-more type__link" href="{{ route('articles.detail', $article->slug) }}">
                        Далее...
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <div>
        {{ $articles->links() }}
    </div>
@endsection
