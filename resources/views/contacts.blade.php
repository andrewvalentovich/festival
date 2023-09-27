@extends('layouts.client')
@section('title')Контакты@endsection
@section('content')
    <div class="type__about-title type__title">
        Контакты
    </div>
    <div class="type__news-list">
        @foreach($contacts as $contact)
        <div class="type__news-item">
            @if (!is_null($contact->image))
                <div class="type__about-item-pic">
                    <img src="{{ $contact->image_url }}" alt="contact">
                </div>
            @endif
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
        <div class="type__news-item">
            <div class="type__news-item-text">
                <p class="type__subtitle" style="text-decoration: underline; padding-bottom: 10px;">Горячая линия</p>
                <a href="tel:89182017080" class="type__lead">+7 (918) 201-70-80</a>
                <p class="type__lead">nrfest@yandex.ru</p>
            </div>
        </div>
        <div class="type__news-item">
            <div class="type__news-item-text">
                <p class="type__subtitle" style="text-decoration: underline; padding-bottom: 10px;">Адрес</p>
                <p class="type__lead">Фонд содействия сохранению наследия Сергея Рахманинова «Рахманиновское общество» 115035, г. Москва, ул. Большая Ордынка, д. 6/2, стр. 1.
                </p>
            </div>
        </div>
    </div>
@endsection
