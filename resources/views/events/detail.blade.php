@extends('layouts.client')

@section('content')
    <div class="type__about-title type__title">
        {{ $event->title }}
    </div>
    <div class="type__about-video">
        <img src="{{ $event->image_url }}" alt="event">
    </div>
    <p class="type__about-item-lead  type__lead">
        {{ $event->description }}
    </p>
    <p class="type__lead type__date">
        {{ $event->date_day_month_year_format }}
    </p>
@endsection
