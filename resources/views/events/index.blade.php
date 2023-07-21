@extends('layouts.client')

@section('content')
    <div class="type__about-title type__title">
        События
    </div>
    <div class="type__news-list">
        @foreach($events as $event)
            <div class="type__news-item ">
                <div class="type__news-item-pic">
                    <img src="{{ $event->image_url }}" alt="event">
                </div>
                <div class="type__news-item-text">
                    <p class="type__subtitle">
                        {{ $event->title }}
                    </p>
                    <p class="type__date">
                        <span>
                            {{ $event->date_day_month_year_format }}
                        </span>
                    </p>
                    <p class="type__lead">
                        {{ $event->description }}
                    </p>
                    <a class="type__news-item-more type__link" href="{{ route('events.detail', $event->slug) }}">
                        Далее...
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <div>
        {{ $events->links() }}
    </div>
@endsection
