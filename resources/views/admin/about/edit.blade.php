@extends('layouts.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование страницы "О фестивале"</h1>
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

                            <form action="{{ route('admin.about.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')

                                <div class="form-group">
                                    @if(isset($page['about_image']))
                                        <img style="max-width: 100%" class="mb-3" src="{{ asset('storage/'.$page['about_image']) }}" alt="Картинка">
                                    @endif
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="about_image" class="custom-file-input" id="image">
                                            <label class="custom-file-label" for="image">Выберите картинку</label>
                                        </div>
                                    </div>
                                    @error('image')
                                        <label class="text-danger font-weight-normal" for="image">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="text" value="{{ isset($page['about_title']) ? $page['about_title'] : '' }}" name="about_title" class="form-control" placeholder="Заголовок">
                                    @error('title')
                                        <label class="text-danger font-weight-normal" for="title">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <textarea name="about_content" id="content" class="form-control" placeholder="Контент" cols="30" rows="10">{{ isset($page['about_content']) ? $page['about_content'] : '' }}</textarea>
                                    @error('content')
                                        <label class="text-danger font-weight-normal" for="content">{{ $message }}</label>
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
