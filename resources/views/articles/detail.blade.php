@extends('layouts.client')

@section('content')
    <div class="type__about-title type__title">
        {{ $article->title }}
    </div>
    <div class="type__about-video">
        <img src="{{ $article->image_url }}" alt="article">
    </div>
    <p class="type__about-item-lead  type__lead" style="white-space: pre-line;">
        {{ $article->content }}
    </p>
    <p class="type__lead type__date">
        {{ $article->created_date_day_month_year_format }}
    </p>
@endsection
