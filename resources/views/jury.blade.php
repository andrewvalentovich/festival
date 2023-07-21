@extends('layouts.client')

@section('content')
    <div class="type__about-title type__title">
        Жюри
    </div>
    <div class="type__news-list">
        @foreach($jury as $person)
        <div class="type__news-item ">
            <div class="type__about-item-pic">
                <img src="{{ $person->image_url }}">
            </div>
            <div class="type__news-item-text">
                <p class="type__subtitle">
                    {{ $person->last_name }} {{ $person->name }} {{ $person->patronymic }}
                </p>
                <p class="type__lead">
                    {{ $person->merits }}
                </p>
            </div>
        </div>
        @endforeach
    </div>
@endsection
