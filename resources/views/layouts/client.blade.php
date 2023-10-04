<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/files/fonts/stylesheet.css') }}">
    @yield('styles')
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/css/app.css'])
    <title>@yield('title')</title>
</head>
<body>
<div class="wrapper">
    <div class="header-w">
        <div class="header__content container">
            <div class="header__logo header__logo_1">
                <picture>
                    <!-- <source media="(max-width: 539px)" srcset="./img/pic/logo-2-mob.png" /> -->
                    <img src="{{ asset('dist/img/pic/logo-2.png') }}" alt="Фонд Рахманиновское 150 лет сообщество">
                </picture>
            </div>
            <div class="header__title">
                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="11" height="25" viewBox="0 0 11 25" fill="none">
                    <path d="M3.75005 22.7151V3.36022C3.84183 1.189 1.48351 0.663363 0 0.660927L7.74184e-05 0H11V0.672047C7.80002 0.672047 7.16669 2.46416 7.25003 3.36022V22.7151C7.75002 24.1129 9.95834 24.2832 11 24.1936V25H0.125077V24.1936C2.22506 24.5161 3.41672 23.3423 3.75005 22.7151Z" fill="white" fill-opacity="0.96"/>
                </svg> -->
                Первый всероссийский фестиваль
                <span>
                НАРОДНЫЙ Рахманинов
            </span>
            </div>
            <div class="header__logo-list">
                <div class="header__logo">
                    <picture>
                        <source media="(max-width: 1023px)" srcset="{{ asset('dist/img/pic/logo-1.png') }}" />
                        <img src="{{ asset('dist/img/pic/logo-1.png') }}" alt="Народный Рахманинов">
                    </picture>
                </div>
                <div class="header__logo">
                    <picture>
                        <source media="(max-width: 1023px)" srcset="{{ asset('dist/img/pic/logo-3.png') }}" />
                        <img src="{{ asset('dist/img/pic/logo-3.png') }}" alt="Президентский фонд культурных инициатив">
                    </picture>
                    <p style="padding-top: 10px;">Заявка No ПФКИ-23-2-014731</p>
                </div>
            </div>
            <div class="header__menu ">
                <div class="nav-icon toggle-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="border_block nav">
                <nav class="nav__body block ">
                    <div class="nav__list">
                        <a href="{{ route('index') }}" class="nav__list-item {{ request()->routeIs('index') ? 'active' : '' }}">Главная</a>
                        <a href="{{ route('about') }}" class="nav__list-item {{ request()->routeIs('about') ? 'active' : '' }}">О фестивале</a>
                        <a href="{{ route('jury') }}" class="nav__list-item {{ request()->routeIs('jury') ? 'active' : '' }}">Жюри</a>
                        <a href="{{ route('galleries.index') }}" class="nav__list-item {{ request()->routeIs('galleries.index') ? 'active' : '' }}">Фото</a>
                        <a href="{{ route('video') }}" class="nav__list-item {{ request()->routeIs('video') ? 'active' : '' }}">Видео</a>
                        <a href="{{ route('partners') }}" class="nav__list-item {{ request()->routeIs('partners') ? 'active' : '' }}">Партнеры</a>
                        <a href="{{ route('articles.index') }}" class="nav__list-item {{ request()->routeIs('articles.index') ? 'active' : '' }}">Архив</a>
                        <a href="{{ route('events.index') }}" class="nav__list-item {{ request()->routeIs('events.index') ? 'active' : '' }}">События</a>
                        <a href="{{ route('contacts') }}" class="nav__list-item {{ request()->routeIs('contacts') ? 'active' : '' }}">Контакты</a>
                        <!-- <a href="#" class="nav__list-item active">
                            Главная
                        </a>
                        <a href="#" class="nav__list-item">
                            О фестивале
                        </a>
                        <a href="#" class="nav__list-item">
                            Жюри
                        </a>
                        <a href="#" class="nav__list-item">
                            Фото
                        </a>
                        <a href="#" class="nav__list-item">
                            Видео
                        </a>
                        <a href="#" class="nav__list-item">
                            Партнеры
                        </a>
                        <a href="#" class="nav__list-item">
                            Архив
                        </a>
                        <a href="#" class="nav__list-item">
                            События
                        </a>
                        <a href="#" class="nav__list-item">
                            Контакты
                        </a> -->
                    </div>
                </nav>
            </div>
        </div>
    </div>



    <div class="header-m">
        <nav class="header-m__list">
            <a href="{{ route('index') }}" class="nav__list-item {{ request()->routeIs('index') ? 'active' : '' }}">Главная</a>
            <a href="{{ route('about') }}" class="nav__list-item {{ request()->routeIs('about') ? 'active' : '' }}">О фестивале</a>
            <a href="{{ route('jury') }}" class="nav__list-item {{ request()->routeIs('jury') ? 'active' : '' }}">Жюри</a>
            <a href="{{ route('galleries.index') }}" class="nav__list-item {{ request()->routeIs('galleries.index') ? 'active' : '' }}">Фото</a>
            <a href="{{ route('video') }}" class="nav__list-item {{ request()->routeIs('video') ? 'active' : '' }}">Видео</a>
            <a href="{{ route('partners') }}" class="nav__list-item {{ request()->routeIs('partners') ? 'active' : '' }}">Партнеры</a>
            <a href="{{ route('articles.index') }}" class="nav__list-item {{ request()->routeIs('articles.index') ? 'active' : '' }}">Архив</a>
            <a href="{{ route('events.index') }}" class="nav__list-item {{ request()->routeIs('events.index') ? 'active' : '' }}">События</a>
            <a href="{{ route('contacts') }}" class="nav__list-item {{ request()->routeIs('contacts') ? 'active' : '' }}">Контакты</a>
        </nav>
    </div>
    <div class="type container">
        <div class="type__content">
            <div class="type__action">
                <div class="type__action-nav border_block">
                    <div class="type__action-nav-body block">
                        <a class="type__action-nav-item" href="{{ route('contests.results') }}">
                            <div class="pic">
                                <img src="{{ asset('dist/img/icons/Pencil.svg') }}" alt="Результаты онлайн-конкурса">
                            </div>
                            <span>
                                Результаты онлайн-конкурса
{{--                                <div style="color: orange;">(до 25.09.2023)</div>--}}
                            </span>
                        </a>
                        <a class="type__action-nav-item" href="{{ route('master-classes.index') }}">
                            <div class="pic">
                                <img src="{{ asset('dist/img/icons/Calendar.svg') }}" alt="Календарный план">
                            </div>
                            <span>
                                Регистрация&nbsp;на
                                художественные
                                мастер&#8209;классы
                                11&#8209;16.10.2023
                            </span>
                        </a>
                        <a class="type__action-nav-item" href="{{ route('calendar') }}">
                            <div class="pic">
                                <img src="{{ asset('dist/img/icons/Calendar.svg') }}" alt="Календарный план">
                            </div>
                            <span>
                                Регистрация на лекции, концерты, творческие встречи
                            </span>
                        </a>
                        <a class="type__action-nav-item" href="{{ route('live') }}">
                            <div class="pic">
                                <img src="{{ asset('dist/img/icons/Security.svg') }}" alt="Трансляция online">
                            </div>
                            <span>
									Трансляция online
								</span>
                        </a>
                        <a class="type__action-nav-item" href="{{ route('documents') }}">
                            <div class="pic">
                                <img src="{{ asset('dist/img/icons/Messages.svg') }}" alt="Документы">
                            </div>
                            <span>
									Документы
								</span>
                        </a>
                        <a class="type__action-nav-item" href="{{ route('decrees') }}">
                            <div class="pic">
                                <img src="{{ asset('dist/img/icons/Suitcase.svg') }}" alt="Положения">
                            </div>
                            <span>
									Положения
								</span>
                        </a>
                    </div>
                </div>
                <div class="type__action-pic border_block">
                    <img src="{{ asset('dist/img/pic/rahmanov.png') }}" alt="rahmanov">
                </div>
            </div>
            <div class="type__about border_block">
                <div class="type__about-body block">
                    @yield('content')
                </div>
            </div>
            <div class="type__news border_block">
                <div class="type__news-body block">
                    <div class="type__news-title type__title">
                        Новости
                    </div>
                    <div class="type__news-list">
                        @if(isset($sidebar_articles))
                            @foreach($sidebar_articles as $article)
                                <div class="type__news-item">
                                    <div class="type__news-item-pic">
                                        <img src="{{ $article->image_url }}" alt="news">
                                    </div>
                                    <div class="type__news-item-text">
                                        <p class="type__lead">
                                            {{ $article->content }}
                                        </p>
                                        <a class="type__news-item-more type__link" href="{{ route('articles.detail', $article->slug) }}">
                                            Далее...
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="type__pic-mobile border_block">
                <img src="{{ asset('dist/img/pic/rahmanov.png') }}" alt="rahmanov">
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="footer__content container">
        <span class="footer__rights">
            @2023 Все права защищены
        </span>
            <a href="#">
                Политика конфиденциальности
            </a>
        </div>
    </footer>
</div>
<script src="{{ asset('https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js') }}"></script>
@vite(['resources/js/app.js'])
@yield('scripts')
</body>
</html>
