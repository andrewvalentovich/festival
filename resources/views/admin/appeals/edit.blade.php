@extends('layouts.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование обращения</h1>
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

                            <form action="{{ route('admin.appeals.update', $appeal->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')

                                <div class="form-group">
                                    <img class="mb-3" src="{{ asset($appeal->imageUrl) }}" alt="">
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
                                    <input type="text" value="{{ $appeal->name }}" name="name" class="form-control" placeholder="Имя">
                                    @error('name')
                                        <label class="text-danger font-weight-normal" for="name">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="text" value="{{ $appeal->last_name }}" name="last_name" class="form-control" placeholder="Фамилия">
                                    @error('last_name')
                                    <label class="text-danger font-weight-normal" for="last_name">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="text" value="{{ $appeal->patronymic }}" name="patronymic" class="form-control" placeholder="Отчество">
                                    @error('patronymic')
                                    <label class="text-danger font-weight-normal" for="patronymic">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="category_id">Звание (категория)</label>
                                    <select id="category_id" name="category_id">
                                        <option value="0" {{ !isset($appeal->category) ? "selected" : "" }}>Не выбрано</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ (isset($appeal->category) && ($appeal->category->id === $category->id)) ? "selected" : "" }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <label class="text-danger font-weight-normal" for="category_id">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <textarea name="merits" class="form-control" placeholder="Заслуги/Награды/Достижения" cols="30" rows="5">{{ $appeal->merits }}</textarea>
                                    @error('merits')
                                    <label class="text-danger font-weight-normal" for="merits">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <textarea name="description" class="form-control" placeholder="Описание" cols="30" rows="5">{{ $appeal->description }}</textarea>
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
