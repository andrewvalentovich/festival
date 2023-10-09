@extends('layouts.client')

@section('title')Видео@endsection
@section('content')
    <div class="type__about-title type__title">
        Видео
    </div>
    <div class="type__about-video">
        <video style="width:100%; height:auto" controls loop src="https://videon.img.ria.ru/Out/Flv/direct/2023_10_06_MMPC202310061300ZAL32_cyoh0gty.2m5.mp4"></video>
{{--        <iframe style="width: 100%" height="315" src="https://www.youtube.com/embed/av9qnHKieZs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>--}}
    </div>
@endsection
