@extends('layouts.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование партнёра</h1>
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
                        <!-- .card-body -->
                        <div class="card-body table-responsive p-3">

                            <form action="{{ route('admin.partners.update', $partner->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')

                                <div class="form-group">
                                    @if(isset($partner->logo_image))
                                        <img style="max-width: 100%" class="mb-3" src="{{ asset($partner->logo_image_url) }}" alt="Логотип партнёра">
                                    @endif
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="logo_image" class="custom-file-input" id="logo_image">
                                            <label class="custom-file-label" for="logo_image">Выберите фотографию для замены</label>
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
                                    <input type="text" value="{{ $partner->title }}" name="title" class="form-control" placeholder="Название">
                                    @error('title')
                                        <label class="text-danger font-weight-normal" for="title">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="text" value="{{ $partner->link }}" name="link" class="form-control" placeholder="Ссылка на сайт">
                                    @error('link')
                                    <label class="text-danger font-weight-normal" for="link">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <textarea name="description" class="form-control" placeholder="Описание" cols="30" rows="10">{{ $partner->description }}</textarea>
                                    @error('description')
                                    <label class="text-danger font-weight-normal" for="description">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Обновить">
                                </div>
                            </form>
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
