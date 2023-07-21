@extends('layouts.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Мероприятия/События</h1>
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
                            <a href="{{ route('admin.events.create') }}" class="btn btn-primary">Создать мероприятие</a>
                        </div>
                        <!-- /.card-header -->
                        <p class="card-body table-responsive p-0 m-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Название</td>
                                        <td>Место проведения</td>
                                        <td>Дата проведения</td>
                                        <td>Действия</td>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($events as $event)
                                    <tr>
                                        <td>{{ $event->id }}</td>
                                        <td>{{ $event->title }}</td>
                                        <td>{{ $event->location }}</td>
                                        <td>{{ $event->date }}</td>
                                        <td class="project-actions">
                                            <a class="btn btn-primary btn-sm" href="{{ route('admin.events.show', $event->id) }}">
                                                <i class="fas fa-folder"></i>
                                                Открыть
                                            </a>
                                            <a class="btn btn-info btn-sm" href="{{ route('admin.events.edit', $event->id) }}">
                                                <i class="fas fa-pencil-alt"></i>
                                                Редактировать
                                            </a>
                                            <form id="delete_event_form-{{ $event->id }}" style="display: none;" action="{{ route('admin.events.destroy', $event->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                            </form>
                                            <a class="btn btn-danger btn-sm" onclick="document.getElementById('delete_event_form-{{ $event->id }}').submit(); return false;">
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
