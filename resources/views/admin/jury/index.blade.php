@extends('layouts.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Жюри</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('jury.create') }}" class="btn btn-primary">Добавть жюри</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <td>ID</td>
                                    <td style="max-width: 160px;">Фото</td>
                                    <td>Имя</td>
                                    <td>Фамилия</td>
                                    <td>Отчество</td>
                                    <td>Описание</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($jury as $person)
                                    <tr>
                                        <td>{{ $person->id }}</td>
                                        <td><img src="{{ asset('storage/' . $person->preview_image) }}" alt="Фото жюри"></td>
                                        <td>
                                            <a href="{{ route('jury.show', $person->id) }}">{{ $person->name }}</a>
                                        </td>
                                        <td>{{ $person->last_name }}</td>
                                        <td>{{ $person->patronymic }}</td>
                                        <td>{{ $person->description }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
