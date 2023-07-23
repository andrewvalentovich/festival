@extends('layouts.client')

@section('content')
    <div class="type__about-title type__title">
        Календарный план
    </div>
    <div class="type__gallery-list">
        {{ $events }}
    </div>
@endsection
