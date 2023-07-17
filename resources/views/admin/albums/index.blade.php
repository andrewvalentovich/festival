@extends('layouts.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Альбомы</h1>
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
                <div class="col-10">
                    <div class="card">
                        <div class="card-header border-bottom-0">
                            <a href="{{ route('albums.create') }}" class="btn btn-primary">Создать альбом</a>
                        </div>
                        <!-- /.card-header -->
                        <p class="card-body table-responsive p-0 m-0">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Название</td>
                                        <td>Дата создания</td>
                                        <td>Действия</td>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($albums as $album)
                                    <tr>
                                        <td>{{ $album->id }}</td>
                                        <td>{{ $album->title }}</td>
                                        <td>{{ date('d-m-Y H:i:s', strtotime($album->created_at)) }}</td>
                                        <td class="project-actions">
                                            <a class="btn btn-warning btn-sm" href="{{ route('albums.photos.index', $album->id) }}">
                                                <i class="fas fa-external-link-square-alt"></i>
                                                Фотографии
                                            </a>
                                            <a class="btn btn-primary btn-sm" href="{{ route('albums.show', $album->id) }}">
                                                <i class="fas fa-folder"></i>
                                                Открыть
                                            </a>
                                            <a class="btn btn-info btn-sm" href="{{ route('albums.edit', $album->id) }}">
                                                <i class="fas fa-pencil-alt"></i>
                                                Редактировать
                                            </a>
                                            <form id="delete_album_form-{{ $album->id }}" style="display: none;" action="{{ route('albums.destroy', $album->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                            </form>
                                            <a class="btn btn-danger btn-sm" onclick="document.getElementById('delete_album_form-{{ $album->id }}').submit(); return false;">
                                                <i class="fas fa-trash"></i>
                                                Удалить
                                            </a>
                                        </td>
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
