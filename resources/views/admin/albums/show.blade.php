@extends('layouts.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Просмотр альбома</h1>
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
                                <a href="{{ route('admin.albums.edit', $album->id) }}" class="btn btn-primary">Редактировать</a>
                            </div>
                            <form action="{{ route('admin.albums.destroy', $album->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger" value="Удалить">
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-3">
                            <div class="form-group">
                                <label for="id">Id</label>
                                <input type="text" id="id" class="form-control" value="{{ $album->id }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="title">Название</label>
                                <input type="text" id="title" class="form-control" value="{{ $album->title }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="description">Описание</label>
                                <textarea id="description" class="form-control" rows="8" readonly>{{ $album->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="created_at">Дата создания</label>
                                <input type="text" id="created_at" class="form-control" value="{{ date('d-m-Y H:i:s', strtotime($album->created_at)) }}" readonly>
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
