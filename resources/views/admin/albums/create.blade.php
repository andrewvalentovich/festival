@extends('layouts.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Создание альбома</h1>
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
                <div class="col-6">
                    <form action="{{ route('albums.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <input type="text" value="{{ old('title') }}" name="title" class="form-control" placeholder="Название">
                            @error('title')
                                <label class="text-danger font-weight-normal" for="title">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <textarea
                                name="description"
                                id="admin_album_create_textarea"
                                class="form-control"
                                placeholder="Описание (* необязательное поле)"
                                cols="30" rows="10"
                            >{{ old('description') }}</textarea>
                            @error('description')
                                <label class="text-danger font-weight-normal" for="description">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Создать">
                        </div>
                    </form>
                </div>

            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
