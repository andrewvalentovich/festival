@extends('layouts.client')

@section('title')События@endsection
@section('content')
    <div class="type__about-title type__title">
        {{ $event->title }}
    </div>
    @if(isset($event->image))
        <div class="type__about-video">
            <img src="{{ $event->image_url }}" alt="event">
        </div>
    @endif
    <p class="type__about-item-lead type__lead">
        {!! $event->description !!}
    </p>
    <p class="type__lead type__date">
        {{ $event->date_day_month_year_format }}
    </p>
    @if(isset($event->link))
        <a class="type__buy-btn type__btn" target="_blank" href="{{ $event->link }}">
            Регистрация
        </a>
    @endif
@endsection
