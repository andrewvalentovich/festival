@extends('layouts.client')

@section('content')
    <div class="type__about-title type__title">
        Положения
    </div>
    <div class="type__gallery-list">
        @if(count($decrees) != 0)
            @foreach($decrees as $decree)
                <div class="type__galler-item">
                    <a target="_blank" href="{{ $decree->link }}" class="type__subtitle">
                        {{ $decree->title }}
                    </a>
                </div>
            @endforeach
        @else
            <div class="type__galler-item">
                <p class="type__subtitle" style="text-decoration: none;">Положений нет</p>
            </div>
        @endif
    </div>
@endsection
