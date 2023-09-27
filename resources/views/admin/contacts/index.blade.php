@extends('layouts.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Контакты</h1>
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
                            <a href="{{ route('admin.contacts.create') }}" class="btn btn-primary">Добавть контакт</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0 m-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <td>ID</td>
                                    <td style="max-width: 160px;">Фото</td>
                                    <td>ФИО</td>
                                    <td>Должность</td>
                                    <td>Номер телефона</td>
                                    <td>Email</td>
                                    <td>Действие</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contacts as $person)
                                    <tr>
                                        <td>{{ $person->id }}</td>
                                        <td>
                                            <img style="max-width: 90px;" src="{{ $person->image_url }}" alt="Фото жюри">
                                        </td>
                                        <td>
                                            {{ $person->name }}
                                            {{ $person->last_name }}
                                            {{ !is_null($person->patronymic) ? $person->patronymic : '' }}
                                        </td>
                                        <td>{{ $person->position }}</td>
                                        <td>{{ $person->phone }}</td>
                                        <td>{{ $person->email }}</td>
                                        <td class="project-actions">
                                            <a class="btn btn-primary btn-sm" href="{{ route('admin.contacts.show', $person->id) }}">
                                                <i class="fas fa-folder"></i>
                                                Открыть
                                            </a>
                                            <a class="btn btn-info btn-sm" href="{{ route('admin.contacts.edit', $person->id) }}">
                                                <i class="fas fa-pencil-alt"></i>
                                                Редактировать
                                            </a>
                                            <form id="delete_contacts_form-{{ $person->id }}" style="display: none;" action="{{ route('admin.contacts.destroy', $person->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                            </form>
                                            <a class="btn btn-danger btn-sm" onclick="document.getElementById('delete_contacts_form-{{ $person->id }}').submit(); return false;">
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
