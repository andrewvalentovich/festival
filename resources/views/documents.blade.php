@extends('layouts.client')

@section('title')Документы@endsection
@section('content')
    <div class="type__about-title type__title">
        Документы
    </div>
    <div class="type__gallery-list">
        @if(count($documents) != 0)
            @foreach($documents as $document)
                <div class="type__galler-item">
                    <a target="_blank" href="{{ !is_null($document->file_url) ? $document->file_url : $document->link }}" class="type__subtitle">
                        {{ $document->title }}
                    </a>
                </div>
            @endforeach
        @else
            <div class="type__galler-item">
                <p class="type__subtitle" style="text-decoration: none;">Документов нет</p>
            </div>
        @endif
    </div>
@endsection
