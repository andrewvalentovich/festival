@extends('layouts.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавление партнёра</h1>
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
                    <form action="{{ route('partners.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="logo_image" class="custom-file-input" id="logo_image">
                                    <label class="custom-file-label" for="logo_image">Выберите фотографию логотипа</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузить</span>
                                </div>
                            </div>
                            @error('logo_image')
                                <label class="text-danger font-weight-normal" for="logo_image">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" value="{{ old('title') }}" name="title" class="form-control" placeholder="Название">
                            @error('title')
                                <label class="text-danger font-weight-normal" for="title">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" value="{{ old('link') }}" name="link" class="form-control" placeholder="Ссылка на сайт">
                            @error('link')
                                <label class="text-danger font-weight-normal" for="link">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <textarea
                                name="description"
                                id="admin_partner_create_textarea"
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
