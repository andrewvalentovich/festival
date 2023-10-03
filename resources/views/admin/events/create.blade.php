@extends('layouts.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Создание мероприятия</h1>
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
                    <form action="{{ route('admin.events.store') }}" method="post" enctype="multipart/form-data">
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
                            <input type="text" value="{{ old('title') }}" name="title" class="form-control" placeholder="Название">
                            @error('title')
                                <label class="text-danger font-weight-normal" for="title">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group date" id="event_create_date">
                                <input type="text" name="date" value="{{ old('date') }}" class="form-control" placeholder="Дата проведения"/>
                                <div class="input-group-addon input-group-append">
                                    <div class="input-group-text">
                                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            @error('date')
                                <label class="text-danger font-weight-normal" for="date">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" value="{{ old('location') }}" name="location" class="form-control" placeholder="Место проведения">
                            @error('location')
                                <label class="text-danger font-weight-normal" for="location">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <textarea
                                name="description"
                                id="admin_event_create_textarea"
                                class="form-control"
                                placeholder="Описание мероприятия"
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
@section('scripts')
    <script>
        (function($){
            $(function(){
                $('#event_create_date').datetimepicker({
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
