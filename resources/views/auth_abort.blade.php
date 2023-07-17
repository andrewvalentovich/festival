@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Вы не обладаете ролью администратора!</div>

                    <div class="card-body">
                        Пожалуйста, авторизуйтесь с помощью другой учётной записи или посетите <a href="{{ route('index') }}">главную страницу</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
