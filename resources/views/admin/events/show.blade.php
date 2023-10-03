@extends('layouts.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Просмотр мероприятия</h1>
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
                                <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-primary">Редактировать</a>
                            </div>
                            <form action="{{ route('admin.events.destroy', $event->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger" value="Удалить">
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-3">
                            @if(isset($event->image))
                                <div class="form-group">
                                    <img style="max-width: 100%" src="{{ asset($event->image_url) }}" alt="">
                                </div>
                            @endif
                            <div class="form-group">
                                <label class="font-weight-normal" for="title">Название</label>
                                <input type="text" value="{{ $event->title }}" name="title" class="form-control" placeholder="Название" readonly>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-normal" for="date">Дата проведения</label>
                                <div class="input-group date" id="event_show_date">
                                    <input type="text" name="date" value="{{ date('d-m-Y H:i:s', strtotime($event->date)) }}" class="form-control" readonly/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-normal" for="location">Место проведения</label>
                                <input type="text" value="{{ $event->location }}" name="location" class="form-control" placeholder="Место проведения" readonly>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-normal" for="description">Описание мероприятия</label>
                                <textarea
                                    name="description"
                                    id="admin_event_show_textarea"
                                    class="form-control"
                                    placeholder="Описание мероприятия"
                                    cols="30" rows="10" readonly
                                >{{ $event->description }}</textarea>
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
