@extends('layouts.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Просмотр обращения</h1>
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
                <div class="col-8">
                    <div class="card">
                        <div class="card-header d-flex p-3">
                            <div class="mr-3">
                                <a href="{{ route('admin.appeals.edit', $appeal->id) }}" class="btn btn-primary">Редактировать</a>
                            </div>
                            <form action="{{ route('admin.appeals.destroy', $appeal->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger" value="Удалить">
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-3">
                            <div class="form-group">
                                <img src="{{ asset($appeal->imageUrl) }}" alt="">
                            </div>
                            <div class="form-group">
                                <label for="id">Id</label>
                                <input type="text" id="id" class="form-control" value="{{ $appeal->id }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="name">Имя</label>
                                <input type="text" id="name" class="form-control" value="{{ $appeal->name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="last_name">Фамилия</label>
                                <input type="text" id="last_name" class="form-control" value="{{ $appeal->last_name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="patronymic">Отчество</label>
                                <input type="text" id="patronymic" class="form-control" value="{{ $appeal->patronymic }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="merits">Заслуги/Награды/Достижения</label>
                                <textarea id="description" class="form-control" rows="8" readonly>{{ $appeal->merits }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="description">Описание</label>
                                <textarea id="description" class="form-control" rows="8" readonly>{{ $appeal->description }}</textarea>
                            </div>
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
