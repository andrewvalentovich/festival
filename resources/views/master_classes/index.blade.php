@extends('layouts.client')
@section('title')Художественные Мастер-классы@endsection
@section('content')
    <div class="type__about-title type__title">
        Художественные Мастер-классы
    </div>
    <div class="type__news-list">
        <div class="type__news-item-text">
            <a class="type__subtitle" style="text-decoration: underline" href="{{ route('master-classes.participants') }}">
                Участники мастер-класса
            </a>
        </div>
        <div class="type__news-item-text">
            <a class="type__subtitle" style="text-decoration: underline" href="{{ route('master-classes.schedule') }}">
                График и тайминг мастер-классов
            </a>
        </div>
        <div class="type__news-item-text">
            <a class="type__subtitle" style="text-decoration: underline" href="{{ route('master-classes.booking') }}">
                Онлайн-запись на мастер-классы
            </a>
        </div>
    </div>
@endsection
