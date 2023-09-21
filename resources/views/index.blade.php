@extends('layouts.client')

@section('title')
    ПЕРВЫЙ ВСЕРОССИЙСКИЙ ФЕСТИВАЛЬ НАРОДНЫЙ РАХМАНИНОВ
@endsection

@section('content')
    <div class="type__about-title type__title">
        О нашем фестивале
    </div>
    <div class="type__about-list">

        @foreach($appeals as $key => $value)
            @foreach($value as $person)
            <div class="type__about-item border_block">
                <div class="type__about-item-body block">
                    <div class="type__about-item-pic">
                        <img src="{{ $person->image_url }}">
                    </div>
                    <div class="type__about-item-text">
                        <div class="type__about-item-info">
                            <p class="type__about-item-name type__subtitle">
                                {{ $person->last_name }} {{ $person->name }} {{ !is_null($person->patronymic) ? $person->patronymic : '' }}
                                @if(!is_null($person->merits))
                                    <span>
                                        {{ $person->merits }}
                                    </span>
                                @endif
                            </p>
                            <p class="type__about-item-lead type__lead">
                                {{ $person->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endforeach
    </div>
@endsection
