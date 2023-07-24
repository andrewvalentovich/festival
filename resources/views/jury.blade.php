@extends('layouts.client')

@section('title')Жюри@endsection
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
                    {{ $person->last_name }} {{ $person->name }} {{ !is_null($person->patronymic) ? $person->patronymic : '' }}
                </p>
                <p class="type__lead">
                    @if(!is_null($person->merits))
                        {{ $person->merits }}
                    @endif
                </p>
            </div>
        </div>
        @endforeach
    </div>
@endsection
