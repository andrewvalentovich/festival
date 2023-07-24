@extends('layouts.client')
@section('title'){{ isset($page['about_title']) ? $page['about_title'] : '' }}@endsection
@section('content')
    <div class="type__about-title type__title">
        {{ isset($page['about_title']) ? $page['about_title'] : '' }}
    </div>
    <div class="type__about-video">
        @if(isset($page['about_image']))
            <img src="{{ asset('storage/'.$page['about_image']) }}" alt="Картинка">
        @endif
    </div>
    <p class="type__about-item-lead  type__lead">
        {{ isset($page['about_content']) ? $page['about_content'] : '' }}
    </p>
@endsection
