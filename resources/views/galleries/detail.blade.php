@extends('layouts.client')

@section('content')
    <div class="type__about-title type__title">
        Фотографии альбома "{{ $album->title }}"
    </div>
    @foreach($photos as $photo)
        <div class="type__about-video">
            <img src="{{ $photo->image_url }}" alt="photo">
        </div>
    @endforeach
@endsection
