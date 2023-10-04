@extends('layouts.client')

@section('title')Партнёры@endsection
@section('content')
    <div class="type__about-title type__title">
        Партнеры
    </div>
    <div class="type__partners-list">
        @foreach($partners as $partner)
        <div class="type__partners-item">
            <div class="type__news-item-pic">
                <img src="{{ $partner->logo_image_url }}" alt="partner">
            </div>
            <div class="type__news-item-text">
                <p class="type__subtitle">
                    {{ $partner->title }}
                </p>
                @if(isset($partner->description))
                    <p class="type__lead">
                        {{ $partner->description }}
                    </p>
                @endif
                <a class="type__link" target="_blank" href="{{ $partner->link }}">
                    {{ $partner->link }}
                </a>
            </div>
        </div>
        @endforeach
    </div>
@endsection
