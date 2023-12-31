@extends('layouts.client')

@section('title')Подать заявку на конкурс@endsection
@section('content')
    <div class="type__about-title type__title">
        Подать заявку на конкурс
    </div>
    <div class="type__about-title type__title" style="color: red; font-size: 20px;">
        Окончание приёма заявок до 25.09.2023 23:59
    </div>
    <div class="type__gallery-list">
        <div style="margin-bottom: 38px;">
            <div class="type__galler">
                <p class="type__subtitle" style="text-decoration: none">
                    Для музыкантов
                </p>
            </div>
            <div class="type__galler-item" style="display:flex; flex-direction: column">
                <a target="_blank" href="storage/docs/%D0%9F%D0%BE%D0%BB%D0%BE%D0%B6%D0%B5%D0%BD%D0%B8%D0%B5%20%D0%BE%20%D0%BA%D0%BE%D0%BD%D0%BA%D1%83%D1%80%D1%81%D0%B5.docx%20%D0%9C%D0%A3%D0%97%D0%AB%D0%9A%D0%90.pdf" style="text-decoration: underline">Положение о конкурсе</a>
                <a target="_blank" href="storage/docs/%D0%9F%D0%BE%D0%BB%D0%BE%D0%B6%D0%B5%D0%BD%D0%B8%D0%B5%20%D0%BE%20%D0%BA%D0%BE%D0%BD%D0%BA%D1%83%D1%80%D1%81%D0%B5.docx%20%D0%9C%D0%A3%D0%97%D0%AB%D0%9A%D0%90.pdf" style="text-decoration: underline">Пресс-релиз конкурса</a>
                <a href="{{ route('contests.music') }}" style="text-decoration: underline">Подать заявку на конкурс</a>
            </div>
        </div>
        <div style="margin-bottom: 38px;">
            <div class="type__galler">
                <p class="type__subtitle" style="text-decoration: none">
                    Для поэтов
                </p>
            </div>
            <div class="type__galler-item" style="display:flex; flex-direction: column">
                <a target="_blank" href="storage/docs/%D0%9F%D0%BE%D0%BB%D0%BE%D0%B6%D0%B5%D0%BD%D0%B8%D0%B5%20%D0%BE%20%D0%BA%D0%BE%D0%BD%D0%BA%D1%83%D1%80%D1%81%D0%B5%20%D0%9F%D0%9E%D0%AD%D0%97%D0%98%D0%AF.pdf" style="text-decoration: underline">Положение о конкурсе</a>
                <a target="_blank" href="storage/docs/%D0%9F%D0%BE%D0%BB%D0%BE%D0%B6%D0%B5%D0%BD%D0%B8%D0%B5%20%D0%BE%20%D0%BA%D0%BE%D0%BD%D0%BA%D1%83%D1%80%D1%81%D0%B5%20%D0%9F%D0%9E%D0%AD%D0%97%D0%98%D0%AF.pdf" style="text-decoration: underline">Пресс-релиз конкурса</a>
                <a href="{{ route('contests.poetry') }}" style="text-decoration: underline">Подать заявку на конкурс</a>
            </div>
            <div style="margin-bottom: 38px;">
                <div class="type__galler">
                    <p class="type__subtitle" style="text-decoration: none">
                        Для художников
                    </p>
                </div>
                <div class="type__galler-item" style="display:flex; flex-direction: column">
                    <a target="_blank" href="storage/docs/%D0%9F%D0%BE%D0%BB%D0%BE%D0%B6%D0%B5%D0%BD%D0%B8%D0%B5%20%D0%BE%20%D0%BA%D0%BE%D0%BD%D0%BA%D1%83%D1%80%D1%81%D0%B5.pdf" style="text-decoration: underline">Положение о конкурсе</a>
                    <a target="_blank" href="storage/docs/%D0%9F%D0%BE%D0%BB%D0%BE%D0%B6%D0%B5%D0%BD%D0%B8%D0%B5%20%D0%BE%20%D0%BA%D0%BE%D0%BD%D0%BA%D1%83%D1%80%D1%81%D0%B5.pdf" style="text-decoration: underline">Пресс-релиз конкурса</a>
                    <a href="{{ route('contests.art') }}" style="text-decoration: underline">Подать заявку на конкурс</a>
                </div>
            </div>
        </div>
    </div>
    <p class="type__subtitle" style="color: red; font-size: 15px;">
        nrfest@yandex.ru
    </p>
    <p class="type__subtitle" style="margin-top: 30px; text-align: center"><strong>Дорогие друзья!</strong></p>
    <p class="type__subtitle">
        Благодарим всех, кто откликнулся и принял участие в конкурсе "Народный Рахманинов". В связи с большим количеством заявок, по решению оргкомитета, работа членов жюри продлена по 2 октября включительно.  Результаты конкурса будут объявлены 3 октября и опубликованы на сайте:
    <a class="type__subtitle" style="text-decoration: underline" href="{{ route('index') }}">www.nrfest.ru</a>
    </p>
@endsection
