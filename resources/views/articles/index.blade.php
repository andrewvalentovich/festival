@extends('layouts.client')

@section('content')
    <div class="type__about-title type__title">
        События
    </div>
    <div class="type__news-list">
        <div class="type__news-item ">
            <div class="type__news-item-pic">
                <img src="{{ asset('dist/img/pic/news-4.png') }}" alt="news">
            </div>
            <div class="type__news-item-text">
                <p class="type__subtitle">
                    Всероссийский фестиваль народный Рахманинов
                </p>
                <p class="type__date">
										<span>
											22.07.2023
										</span>
                </p>
                <p class="type__lead">
                    Повседневная практика показывает, что реализация намеченных плановых заданий в значительной степени обуславливает...
                </p>
                <a class="type__news-item-more type__link" href="{{ route('events.detail') }}">
                    Далее...
                </a>
            </div>
        </div>
        <div class="type__news-item ">
            <div class="type__news-item-pic">
                <img src="{{ asset('dist/img/pic/news-2.png') }}" alt="news">
            </div>
            <div class="type__news-item-text">
                <p class="type__subtitle">
                    Всероссийский фестиваль народный Рахманинов
                </p>
                <p class="type__date">
										<span>
											22.07.2023
										</span>
                </p>
                <p class="type__lead">
                    Повседневная практика показывает, что реализация намеченных плановых заданий в значительной степени обуславливает...
                </p>
                <a class="type__news-item-more type__link" href="{{ route('events.detail') }}">
                    Далее...
                </a>
            </div>
        </div>
        <div class="type__news-item ">
            <div class="type__news-item-pic">
                <img src="{{ asset('dist/img/pic/news-3.png') }}" alt="news">
            </div>
            <div class="type__news-item-text">
                <p class="type__subtitle">
                    Всероссийский фестиваль народный Рахманинов
                </p>
                <p class="type__date">
										<span>
											22.07.2023
										</span>
                </p>
                <p class="type__lead">
                    Повседневная практика показывает, что реализация намеченных плановых заданий в значительной степени обуславливает...
                </p>
                <a class="type__news-item-more type__link" href="{{ route('events.detail') }}">
                    Далее...
                </a>
            </div>
        </div>
        <div class="type__news-item ">
            <div class="type__news-item-pic">
                <img src="{{ asset('dist/img/pic/news-1.png') }}" alt="news">
            </div>
            <div class="type__news-item-text">
                <p class="type__subtitle">
                    Всероссийский фестиваль народный Рахманинов
                </p>
                <p class="type__date">
										<span>
											22.07.2023
										</span>
                </p>
                <p class="type__lead">
                    Повседневная практика показывает, что реализация намеченных плановых заданий в значительной степени обуславливает...
                </p>
                <a class="type__news-item-more type__link" href="{{ route('events.detail') }}">
                    Далее...
                </a>
            </div>
        </div>
    </div>
@endsection
