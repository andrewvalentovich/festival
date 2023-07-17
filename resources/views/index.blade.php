@extends('layouts.client')

@section('content')
    <div class="type__about-title type__title">
        О нашем фестивале
    </div>
    <div class="type__about-list">
        <div class="type__about-item border">
            <div class="type__about-item-body block">
                <div class="type__about-item-pic">
                    <img src="{{ asset('dist//img/pic/sotrudnik-1.png') }}">
                </div>
                <div class="type__about-item-text">
                    <div class="type__about-item-info">
                        <p class="type__about-item-name type__subtitle">
                            Любовь Казарновская
                        </p>
                        <p class="type__about-item-lead type__lead">
                            Повседневная практика показывает, что реализация намеченных плановых заданий в значительной степени обуславливает...
                        </p>
                    </div>
                    <a class="type__about-item-more type__link" href="">
                        Далее...
                    </a>
                </div>
            </div>
        </div>
        <div class="type__about-item border">
            <div class="type__about-item-body block">
                <div class="type__about-item-pic">
                    <img src="{{ asset('dist/img/pic/sotrudnik-2.png') }}">
                </div>
                <div class="type__about-item-text">
                    <div class="type__about-item-info">
                        <p class="type__about-item-name type__subtitle">
                            Анна Нетребко
                        </p>
                        <p class="type__about-item-lead type__lead">
                            Повседневная практика показывает, что реализация намеченных плановых заданий в значительной степени обуславливает...
                        </p>
                    </div>
                    <a class="type__about-item-more type__link" href="">
                        Далее...
                    </a>
                </div>
            </div>
        </div>
        <div class="type__about-item border">
            <div class="type__about-item-body block">
                <div class="type__about-item-pic">
                    <img src="{{ asset('dist/img/pic/sotrudnik-3.png') }}">
                </div>
                <div class="type__about-item-text">
                    <div class="type__about-item-info">
                        <p class="type__about-item-name type__subtitle">
                            Дмитрий Певцов
                        </p>
                        <p class="type__about-item-lead type__lead">
                            Повседневная практика показывает, что реализация намеченных плановых заданий в значительной степени обуславливает...
                        </p>
                    </div>
                    <a class="type__about-item-more type__link" href="">
                        Далее...
                    </a>
                </div>
            </div>
        </div>
        <div class="type__about-item border">
            <div class="type__about-item-body block">
                <div class="type__about-item-pic">
                    <img src="{{ asset('dist/img/pic/sotrudnik-4.png') }}">
                </div>
                <div class="type__about-item-text">
                    <div class="type__about-item-info">
                        <p class="type__about-item-name type__subtitle">
                            Марьяна Бедникова
                        </p>
                        <p class="type__about-item-lead type__lead">
                            Повседневная практика показывает, что реализация намеченных плановых заданий в значительной степени обуславливает...
                        </p>
                    </div>
                    <a class="type__about-item-more type__link" href="">
                        Далее...
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
