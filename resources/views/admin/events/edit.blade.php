@extends('layouts.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование мероприятия</h1>
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

                            <form action="{{ route('admin.events.update', $event->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')

                                <div class="form-group">
                                    @if(isset($article->image))
                                        <img style="max-width: 100%" class="mb-3" src="{{ asset($event->image_url) }}" alt="Картинка новости">
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
                                    <label class="font-weight-normal" for="title">Название</label>
                                    <input type="text" value="{{ $event->title }}" name="title" class="form-control" placeholder="Название">
                                    @error('title')
                                    <label class="text-danger font-weight-normal" for="title">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-normal" for="slugф">Slug</label>
                                    <input type="text" value="{{ $event->slug }}" name="slug" class="form-control" placeholder="Slug">
                                    @error('slug')
                                    <label class="text-danger font-weight-normal" for="slug">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-normal" for="date">Дата проведения</label>
                                    <div class="input-group date" id="event_edit_date">
                                        <input type="text" name="date" value="{{ date('d-m-Y H:i:s', strtotime($event->date)) }}" class="form-control"/>
                                    </div>
                                    @error('date')
                                    <label class="text-danger font-weight-normal" for="date">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-normal" for="location">Место проведения</label>
                                    <input type="text" value="{{ $event->location }}" name="location" class="form-control" placeholder="Место проведения">
                                    @error('location')
                                    <label class="text-danger font-weight-normal" for="location">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="text" value="{{ $event->link }}" name="link" class="form-control" placeholder="Ссылка">
                                    @error('link')
                                    <label class="text-danger font-weight-normal" for="link">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-normal" for="description">Описание мероприятия</label>
                                    <textarea
                                        name="description"
                                        id="admin_event_show_textarea"
                                        class="form-control"
                                        placeholder="Описание мероприятия"
                                        cols="30" rows="10"
                                    >{{ $event->description }}</textarea>
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
@section('scripts')
    <script>
        (function($){
            $(function(){
                $('#event_edit_date').datetimepicker({
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
