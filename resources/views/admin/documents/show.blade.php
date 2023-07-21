@extends('layouts.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Просмотр документа</h1>
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
                                <a href="{{ route('admin.documents.edit', $document->id) }}" class="btn btn-primary">Редактировать</a>
                            </div>
                            <form action="{{ route('admin.documents.destroy', $document->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger" value="Удалить">
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-3">
                            <div class="form-group">
                                <label for="id">Id</label>
                                <input type="text" id="id" class="form-control" value="{{ $document->id }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="title">Название</label>
                                <input type="text" id="title" class="form-control" value="{{ $document->title }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="link">Ссылка на документ</label>
                                <a target="_blank" href="{{ $document->link }}">{{ $document->link }}</a>
                            </div>
                            <div class="form-group">
                                <label for="description">Описание</label>
                                <textarea id="description" class="form-control" rows="8" readonly>{{ $document->description }}</textarea>
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
