@extends('layouts.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Партнёры</h1>
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
                            <a href="{{ route('admin.partners.create') }}" class="btn btn-primary">Добавть партнёра</a>
                        </div>
                        <!-- /.card-header -->
                        <p class="card-body table-responsive p-0 m-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Фото</td>
                                    <td>Название</td>
                                    <td>Ссылка на сайт</td>
                                    <td>Описание</td>
                                    <td>Действия</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($partners as $partner)
                                    <tr>
                                        <td>{{ $partner->id }}</td>
                                        <td>
                                            @if(isset($partner->logo_image))
                                                <img style="max-width: 150px;" src="{{ $partner->logo_image_url }}" alt="Фото партнёра">
                                            @endif
                                        </td>
                                        <td>{{ $partner->title }}</td>
                                        <td>
                                            <a target="_blank" href="{{ $partner->link }}">Перейти на сайт</a>
                                        </td>
                                        <td>{{ isset($partner->description) ? Str::limit($partner->description, 30) : "" }}</td>
                                        <td class="project-actions">
                                            <a class="btn btn-primary btn-sm" href="{{ route('admin.partners.show', $partner->id) }}">
                                                <i class="fas fa-folder"></i>
                                                Открыть
                                            </a>
                                            <a class="btn btn-info btn-sm" href="{{ route('admin.partners.edit', $partner->id) }}">
                                                <i class="fas fa-pencil-alt"></i>
                                                Редактировать
                                            </a>
                                            <form id="delete_partner_form-{{ $partner->id }}" style="display: none;" action="{{ route('admin.partners.destroy', $partner->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                            </form>
                                            <a class="btn btn-danger btn-sm" onclick="document.getElementById('delete_partner_form-{{ $partner->id }}').submit(); return false;">
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
