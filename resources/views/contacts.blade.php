@extends('layouts.client')
@section('title')Контакты@endsection
@section('content')
    <div class="type__about-title type__title">
        Контакты
    </div>
    <div class="type__news-list">
        @foreach($contacts as $contact)
        <div class="type__news-item">
            <div class="type__about-item-pic">
                <img src="{{ $contact->image_url }}" alt="contact">
            </div>
            <div class="type__news-item-text">
                <p class="type__subtitle">
                    {{ $contact->last_name }}
                    {{ $contact->name }}
                    {{ !is_null($contact->patronymic) ? $contact->patronymic : '' }}
                </p>
                <p class="type__lead">
                    {{ $contact->position }}
                </p>
                <p class="type__lead">
                    <a href="mailto:{{ $contact->email }}">
                        {{ $contact->email }}
                    </a>
                </p>
                <p class="type__lead">
                    <a href="tel:{{ $contact->phone }}">
                        {{ $contact->phone }}
                    </a>
                </p>
            </div>
        </div>
        @endforeach
    </div>
@endsection
