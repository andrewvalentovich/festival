@extends('layouts.client')

@section('content')
    <div class="type__about-title type__title">
        Альбомы
    </div>
    <div class="type__gallery-list">
        @foreach($albums as $album)
            <div class="type__galler-item">
                <a href="{{ route('galleries.detail', $album->slug) }}" class="type__subtitle">
                    {{ $album->title }}
                </a>
                <p class="type__lead">
                    {{ count($album->photos) }} фото
                </p>
            </div>
        @endforeach
    </div>
@endsection
