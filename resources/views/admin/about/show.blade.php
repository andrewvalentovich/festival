@extends('layouts.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Просмотр страницы "О фестивале"</h1>
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
                                <a href="{{ route('admin.about.edit') }}" class="btn btn-primary">Редактировать</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-3">
                            <div class="form-group">
                                @if(isset($page['about_image']))
                                    <img style="max-width: 100%" src="{{ asset('storage/'.$page['about_image']) }}" alt="Картинка страницы">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="title">Заголовок</label>
                                <input type="text" id="title" class="form-control" value="{{ isset($page['about_title']) ? $page['about_title'] : '' }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="content">Контент</label>
                                <textarea id="content" class="form-control" rows="8" readonly>{{ isset($page['about_content']) ? $page['about_content'] : '' }}</textarea>
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
