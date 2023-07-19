@extends('layouts.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Просмотр опции</h1>
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
                                <a href="{{ route('options.edit', $option->id) }}" class="btn btn-primary">Редактировать</a>
                            </div>
                            <form action="{{ route('options.destroy', $option->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger" value="Удалить">
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-3">
                            <div class="form-group">
                                <label for="id">Id</label>
                                <input type="text" id="id" class="form-control" value="{{ $option->id }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="title">Название</label>
                                <input type="text" id="title" class="form-control" value="{{ $option->title }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="key">Ключ опции</label>
                                <input type="text" id="key" class="form-control" value="{{ $option->key }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="value">Значение опции</label>
                                <input type="text" id="value" class="form-control" value="{{ $option->value }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="type">Тип опции</label>
                                <input type="text" id="type" class="form-control" value="{{ $option->type }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="description">Описание</label>
                                <textarea id="description" class="form-control" rows="8" readonly>{{ $option->description }}</textarea>
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
