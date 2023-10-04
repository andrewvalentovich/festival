@extends('layouts.client')
@section('title')Каталог онлайн-конкурса@endsection
@section('content')
    <div class="type__about-title type__title">
        Каталог онлайн-конкурса
    </div>
    <div class="type__news-list">
        <div class="type__news-item-text">
            <a class="type__subtitle" style="text-decoration: underline" href="{{ route('contests.results') }}">
                Результаты онлайн-конкурса
            </a>
        </div>
        <div class="type__news-item-text">
            <a class="type__subtitle" style="text-decoration: underline" href="{{ route('contests.list') }}">
                Запись на онлайн-конкурс
                <div style="color: orange;">(до 25.09.2023)</div>
            </a>
        </div>
    </div>
@endsection
