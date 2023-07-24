@extends('layouts.client')

@section('title')Галерея@endsection
@section('content')
    <div class="type__about-title type__title">
        Фотографии альбома "{{ $album->title }}"
    </div>
    @foreach($photos as $photo)
        <div class="type__about-video">
            <img src="{{ $photo->image_url }}" alt="photo">
        </div>
    @endforeach
    <div>
        {{ $photos->links() }}
    </div>
@endsection
