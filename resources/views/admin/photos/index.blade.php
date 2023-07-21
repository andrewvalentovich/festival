@extends('layouts.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Фотографии альбома - {{ $album->title }}</h1>
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
                        <div class="card-header border-bottom-0">
                            <a href="{{ route('admin.albums.photos.create', $album->id) }}" class="btn btn-primary">Добавить фотографии</a>
                        </div>
                        <!-- /.card-header -->
                        <p class="card-body table-responsive p-0 m-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Превью</td>
                                        <td>Дата создания</td>
                                        <td>Действия</td>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($photos as $photo)
                                    <tr>
                                        <td>{{ $photo->id }}</td>
                                        <td>
                                            @if(isset($photo->preview_image))
                                                <img style="max-width: 150px;" src="{{ $photo->preview_image_url }}" alt="Превью фото">
                                            @endif
                                        </td>
                                        <td>{{ $photo->created_at }}</td>
                                        <td class="project-actions">
                                            <a class="btn btn-primary btn-sm" href="{{ route('admin.photos.show', $photo->id) }}">
                                                <i class="fas fa-folder"></i>
                                                Открыть
                                            </a>
                                            <a class="btn btn-info btn-sm" href="{{ route('admin.photos.edit', $photo->id) }}">
                                                <i class="fas fa-pencil-alt"></i>
                                                Редактировать
                                            </a>
                                            <form
                                                id="delete_photo_form-{{ $photo->id }}"
                                                style="display: none;"
                                                action="{{ route('admin.photos.destroy', $photo->id) }}"
                                                method="post"
                                            >
                                                @csrf
                                                @method('delete')
                                            </form>
                                            <a class="btn btn-danger btn-sm" onclick="document.getElementById('delete_photo_form-{{ $photo->id }}').submit(); return false;">
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
