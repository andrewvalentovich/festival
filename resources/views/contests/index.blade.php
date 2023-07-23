@extends('layouts.client')

@section('content')
    <div class="type__about-title type__title">
        Подать заявку на конкурс
    </div>
    <div class="type__gallery-list">
        <div class="type__galler-item">
            <p target="_blank" href="#" class="type__subtitle" style="text-decoration: none">
                Для художников
            </p>
        </div>
        <div class="type__galler-item" style="display:flex; flex-direction: column">
            <a target="_blank" href="http://localhost:8879/storage/docs/%D0%9F%D0%BE%D0%BB%D0%BE%D0%B6%D0%B5%D0%BD%D0%B8%D0%B5%20%D0%BE%20%D0%BA%D0%BE%D0%BD%D0%BA%D1%83%D1%80%D1%81%D0%B5%20%D0%9F%D0%9E%D0%AD%D0%97%D0%98%D0%AF.pdf" style="text-decoration: underline">Положение о конкурсе</a>
            <a target="_blank" href="http://localhost:8879/storage/docs/%D0%9F%D0%BE%D0%BB%D0%BE%D0%B6%D0%B5%D0%BD%D0%B8%D0%B5%20%D0%BE%20%D0%BA%D0%BE%D0%BD%D0%BA%D1%83%D1%80%D1%81%D0%B5%20%D0%9F%D0%9E%D0%AD%D0%97%D0%98%D0%AF.pdf" style="text-decoration: underline">Пресс-релиз конкурса</a>
            <a target="_blank" href="{{ route('contests.art') }}" style="text-decoration: underline">Подать заявку на конкурс</a>
        </div>
    </div>
@endsection
