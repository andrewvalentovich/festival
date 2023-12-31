@extends('layouts.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Положения</h1>
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
                            <a href="{{ route('admin.decrees.create') }}" class="btn btn-primary">Добавить положение</a>
                        </div>
                        <!-- /.card-header -->
                        <p class="card-body table-responsive p-0 m-0">
                            <table class="table table-hover text-nowrap bg-light">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Название</td>
                                        <td>Ссылка</td>
                                        <td>Ссылка на файл</td>
                                        <td>Действия</td>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($decrees as $decree)
                                    <tr>
                                        <td>{{ $decree->id }}</td>
                                        <td>{{ $decree->title }}</td>
                                        <td>
                                            <a target="_blank" href="{{ $decree->link }}">{{ Str::limit($decree->link, 40) }}</a>
                                        </td>
                                        <td>
                                            <a target="_blank" href="{{ $decree->file_url }}">{{ Str::limit($decree->file_url, 40) }}</a>
                                        </td>
                                        <td class="project-actions">
                                            <a class="btn btn-primary btn-sm" href="{{ route('admin.decrees.show', $decree->id) }}">
                                                <i class="fas fa-folder"></i>
                                                Открыть
                                            </a>
                                            <a class="btn btn-info btn-sm" href="{{ route('admin.decrees.edit', $decree->id) }}">
                                                <i class="fas fa-pencil-alt"></i>
                                                Редактировать
                                            </a>
                                            <form id="delete_decree_form-{{ $decree->id }}" style="display: none;" action="{{ route('admin.decrees.destroy', $decree->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                            </form>
                                            <a class="btn btn-danger btn-sm" onclick="document.getElementById('delete_decree_form-{{ $decree->id }}').submit(); return false;">
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
