@extends('layouts.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавление жюри</h1>
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
                    <form action="{{ route('jury.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="image">
                                    <label class="custom-file-label" for="image">Выберите фотографию</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузить</span>
                                </div>
                            </div>
                            @error('image')
                                <label class="text-danger font-weight-normal" for="image">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" value="{{ old('name') }}" name="name" class="form-control" placeholder="Имя">
                            @error('name')
                                <label class="text-danger font-weight-normal" for="name">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" value="{{ old('last_name') }}" name="last_name" class="form-control" placeholder="Фамилия">
                            @error('last_name')
                                <label class="text-danger font-weight-normal" for="last_name">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" value="{{ old('patronymic') }}" name="patronymic" class="form-control" placeholder="Отчество">
                            @error('patronymic')
                                <label class="text-danger font-weight-normal" for="patronymic">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <textarea
                                name="description"
                                id="admin_jury_create_textarea"
                                class="form-control"
                                placeholder="Описание"
                                cols="30" rows="5"
                            >
                                {{ old('description') }}
                            </textarea>
                            @error('description')
                                <label class="text-danger font-weight-normal" for="description">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Добавить">
                        </div>
                    </form>
                </div>

            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection