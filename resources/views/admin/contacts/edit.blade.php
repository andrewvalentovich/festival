@extends('layouts.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование Жюри</h1>
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

                            <form action="{{ route('admin.contacts.update', $contact->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')

                                <div class="form-group">
                                    <img class="mb-3" src="{{ asset($contact->imageUrl) }}" style="max-width: 400px;" alt="">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="image">
                                            <label class="custom-file-label" for="image">Выберите фотографию для замены</label>
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
                                    <input type="text" value="{{ $contact->name }}" name="name" class="form-control" placeholder="Имя">
                                    @error('name')
                                        <label class="text-danger font-weight-normal" for="name">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="text" value="{{ $contact->last_name }}" name="last_name" class="form-control" placeholder="Фамилия">
                                    @error('last_name')
                                    <label class="text-danger font-weight-normal" for="last_name">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="text" value="{{ $contact->patronymic }}" name="patronymic" class="form-control" placeholder="Отчество">
                                    @error('patronymic')
                                    <label class="text-danger font-weight-normal" for="patronymic">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="text" value="{{ $contact->position }}" name="position" class="form-control" placeholder="Должность">
                                    @error('position')
                                    <label class="text-danger font-weight-normal" for="position">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="text" value="{{ $contact->phone }}" name="phone" class="form-control" placeholder="Номер телефона">
                                    @error('phone')
                                    <label class="text-danger font-weight-normal" for="phone">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="text" value="{{ $contact->email }}" name="email" class="form-control" placeholder="Email">
                                    @error('email')
                                    <label class="text-danger font-weight-normal" for="email">{{ $message }}</label>
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
