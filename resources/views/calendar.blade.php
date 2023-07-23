@extends('layouts.client')

@section('content')
    <div class="type__about-title type__title">
        Календарный план
    </div>
    <div class="datepicker-w">
        <div id="datepicker"></div>
        <input type="hidden" id="datepicker_value" value="">
    </div>
    <div class="type__gallery-list">
        {{ $events }}
    </div>
@endsection
