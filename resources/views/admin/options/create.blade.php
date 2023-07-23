@extends('layouts.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавление опции</h1>
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
                    <form action="{{ route('admin.options.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <input type="text" value="{{ old('title') }}" name="title" class="form-control" placeholder="Название">
                            @error('title')
                                <label class="text-danger font-weight-normal" for="title">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" value="{{ old('key') }}" name="key" class="form-control" placeholder="Ключ опции">
                            @error('key')
                                <label class="text-danger font-weight-normal" for="key">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <textarea
                                name="value"
                                id="admin_option_value_create_textarea"
                                class="form-control"
                                placeholder="Или введите символьное значение поля"
                                cols="30" rows="10"
                            >{{ old('value') }}</textarea>
                            @error('value')
                            <label class="text-danger font-weight-normal" for="value">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" value="{{ old('type') }}" name="type" class="form-control" placeholder="Тип опции">
                            @error('type')
                                <label class="text-danger font-weight-normal" for="type">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <textarea
                                name="description"
                                id="admin_option_description_create_textarea"
                                class="form-control"
                                placeholder="Описание"
                                cols="30" rows="10"
                            >{{ old('description') }}</textarea>
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
