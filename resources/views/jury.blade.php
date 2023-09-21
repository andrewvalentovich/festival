@extends('layouts.client')

@section('title')Жюри@endsection
@section('content')
    <div class="type__about-title type__title">
        Жюри
    </div>
    <div class="type__news-list">
        @if(isset($jury[3]))
            @foreach($jury[3] as $person)
                <div class="type__news-item type__news-item_jury">
                    <div class="type__about-item-pic">
                        <img src="{{ asset('storage/' . $person->image) }}">
                    </div>
                    <div class="type__news-item-text">
                        <p class="type__subtitle">
                            {{ $person->last_name }} {{ $person->name }} {{ !is_null($person->patronymic) ? $person->patronymic : '' }}
                        </p>
                        <p class="type__lead" style="-webkit-line-clamp: unset;">@if(!is_null($person->merits)){{ $person->merits }}@endif</p>
                    </div>
                </div>
            @endforeach
        @endif
        @if(isset($jury[2]))
            @foreach($jury[2] as $person)
                <div class="type__news-item type__news-item_jury">
                    <div class="type__about-item-pic">
                        <img src="{{ asset('storage/' . $person->image) }}">
                    </div>
                    <div class="type__news-item-text">
                        <p class="type__subtitle">
                            {{ $person->last_name }} {{ $person->name }} {{ !is_null($person->patronymic) ? $person->patronymic : '' }}
                        </p>
                        <p class="type__lead" style="-webkit-line-clamp: unset;">@if(!is_null($person->merits)){{ $person->merits }}@endif</p>
                    </div>
                </div>
            @endforeach
        @endif
        @if(isset($jury[1]))
            @foreach($jury[1] as $person)
                <div class="type__news-item type__news-item_jury">
                    <div class="type__about-item-pic">
                        <img src="{{ asset('storage/' . $person->image) }}">
                    </div>
                    <div class="type__news-item-text">
                        <p class="type__subtitle">
                            {{ $person->last_name }} {{ $person->name }} {{ !is_null($person->patronymic) ? $person->patronymic : '' }}
                        </p>
                        <p class="type__lead" style="-webkit-line-clamp: unset;">@if(!is_null($person->merits)){{ $person->merits }}@endif</p>
                    </div>
                </div>
            @endforeach
        @endif
        @if(isset($jury[""]))
            @foreach($jury[""] as $person)
                <div class="type__news-item type__news-item_jury">
                    <div class="type__about-item-pic">
                        <img src="{{ asset('storage/' . $person->image) }}">
                    </div>
                    <div class="type__news-item-text">
                        <p class="type__subtitle">
                            {{ $person->last_name }} {{ $person->name }} {{ !is_null($person->patronymic) ? $person->patronymic : '' }}
                        </p>
                        <p class="type__lead" style="-webkit-line-clamp: unset;">@if(!is_null($person->merits)){{ $person->merits }}@endif</p>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
