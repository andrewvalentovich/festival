@extends('layouts.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование новости</h1>
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

                            <form action="{{ route('admin.articles.update', $article->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')

                                <div class="form-group">
                                    @if(isset($article->image))
                                        <img style="max-width: 100%" class="mb-3" src="{{ asset($article->image_url) }}" alt="Картинка новости">
                                    @endif
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="image">
                                            <label class="custom-file-label" for="image">Выберите картинку для замены</label>
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
                                    <input type="text" value="{{ $article->title }}" name="title" class="form-control" placeholder="Заголовок">
                                    @error('title')
                                        <label class="text-danger font-weight-normal" for="title">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <textarea name="content" class="form-control" placeholder="Контент" cols="30" rows="10">{{ $article->content }}</textarea>
                                    @error('content')
                                        <label class="text-danger font-weight-normal" for="content">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="created_at">Дата создания</label>
                                    <div class="input-group date" id="article_edit_created_at">
                                        <input type="text" name="created_at" value="{{ date('d-m-Y H:i:s', strtotime($article->created_at)) }}" class="form-control"/>
                                        <div class="input-group-addon input-group-append">
                                            <div class="input-group-text">
                                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                    @error('created_at')
                                        <label class="text-danger font-weight-normal" for="created_at">{{ $message }}</label>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <textarea
                                        name="video"
                                        id="admin_article_create_video_textarea"
                                        class="form-control"
                                        placeholder="Видео"
                                        cols="30" rows="10"
                                    >{{ $article->video }}</textarea>
                                    @error('video')
                                    <label class="text-danger font-weight-normal" for="video">{{ $message }}</label>
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
@section('scripts')
    <script>
        (function($){
            $(function(){
                $('#article_edit_created_at').datetimepicker({
                    "useCurrent": true,
                    "allowInputToggle": true,
                    "showClose": true,
                    "showClear": true,
                    "showTodayButton": true,
                    "format": "DD/MM/YYYY HH:mm:ss",
                });
            });
        })(jQuery);
    </script>
@endsection
