@extends('layouts.client')

@section('title')Подать заявку на конкурс музыкантов@endsection
@section('content')
    <div class="type__about-title type__title">
        Подать заявку на конкурс музыкантов
    </div>
    <style>
        .form-group input{
            color: #111;
        }
        .form-group {
            padding: 10px;
            display: flex;
            flex-direction: column;
        }
        .text-danger {
            color: red;
        }
    </style>
    <div class="type__gallery-list">
        <form action="{{ route('contests.send') }}" method="post" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="contest_type" value="Музыка">
            <div class="form-group">
                <label for="initials">Ф.И.О. конкурсанта</label>
                <input type="text" value="{{ old("initials") }}" name="initials" class="form-control">
                @error('initials')
                    <label class="text-danger font-weight-normal" for="initials">{{ $message }}</label>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Место проживания (указать город)</label>
                <input type="text" value="{{ old("address") }}" name="address" class="form-control">
                @error('address')
                    <label class="text-danger font-weight-normal" for="address">{{ $message }}</label>
                @enderror
            </div>
            <div class="form-group">
                <label for="contacts">Телефон, email</label>
                <input type="text" value="{{ old("contacts") }}" name="contacts" class="form-control">
                @error('contacts')
                    <label class="text-danger font-weight-normal" for="contacts">{{ $message }}</label>
                @enderror
            </div>
            <div class="form-group">
                <label for="section">Раздел (выбрать)</label>
                <select name="section" class="form-control">
                    <option {{ old("section") ? "":"selected" }} disabled>Выберите раздел</option>
                    <option value="Профессионал" {{ old("section") == "Профессионал" ? "selected":"" }}>1. Профессионал</option>
                    <option value="Любитель «Народный эксклюзив»" {{ old("section") == "Любитель «Народный эксклюзив»" ? "selected":"" }}>2. Любитель «Народный эксклюзив»</option>
                </select>
                @error('section')
                    <label class="text-danger font-weight-normal" for="section">{{ $message }}</label>
                @enderror
            </div>
            <div class="form-group">
                <label for="age_category">Возрастная категория (выбрать)</label>
                <select name="age_category" class="form-control">
                    <option {{ old("age_category") ? "":"selected" }} disabled>Выберите возрастную категорию</option>
                    <option value="A" {{ old("age_category") == "A" ? "selected":"" }}>1. A</option>
                    <option value="B" {{ old("age_category") == "B" ? "selected":"" }}>2. B</option>
                    <option value="C" {{ old("age_category") == "C" ? "selected":"" }}>3. C</option>
                </select>
                @error('age_category')
                    <label class="text-danger font-weight-normal" for="age_category">{{ $message }}</label>
                @enderror
            </div>
            <div class="form-group">
                <label for="nomination">Номинация «Музыка»</label>
                <select name="nomination" class="form-control">
                    <option {{ old("nomination") ? "":"selected" }} disabled>Выберите раздел</option>
                    <option value="Инструментальное искусство" {{ old("nomination") == "Инструментальное искусство" ? "selected":"" }}>1. Инструментальное искусство</option>
                    <option value="Вокальное искусство" {{ old("nomination") == "Вокальное искусство" ? "selected":"" }}>2. Вокальное искусство</option>
                </select>
                @error('nomination')
                    <label class="text-danger font-weight-normal" for="nomination">{{ $message }}</label>
                @enderror
            </div>
            <div class="form-group">
                <label for="video_link">Ссылка на видео</label>
                <input type="text" value="{{ old("video_link") }}" name="video_link" class="form-control">
                @error('video_link')
                <label class="text-danger font-weight-normal" for="video_link">{{ $message }}</label>
                @enderror
            </div>

            <style>
                .input-file {
                    position: relative;
                    display: flex;
                }
                .input-file-text {
                    height: 34px;
                    display: block;
                    box-sizing: border-box;
                    max-width: 100%;
                    border: 1px solid #2C2154;
                }
                .input-file input[type=file] {
                    position: absolute;
                    z-index: -1;
                    opacity: 0;
                    display: block;
                    width: 0;
                    height: 0;
                }

                /* Focus */
                .input-file input[type=file]:focus + .input-file-btn {
                    box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
                }

                /* Hover/active */
                .input-file:hover .input-file-btn {
                    background-color: #7d9da;
                }
                .input-file:active .input-file-btn {
                    background-color: #a7d9da;
                }

                /* Disabled */
                .input-file input[type=file]:disabled + .input-file-btn {
                    background-color: #eee;
                }
            </style>

            <div class="form-group">
                <div class="form-main__label" for="files">Прикрепить фотографии (до 5 Мб)</div>
                <label class="input-file">
                    <span id="files_text" class="input-file-text form-control" type="text"></span>
                    <input id="files" type="file" name="files[]" multiple />
                </label>
                @error('files')
                <label class="text-danger font-weight-normal" for="files">{{ $message }}</label>
                @enderror
                @error('files.*')
                <label class="text-danger font-weight-normal" for="files">{{ $message }}</label>
                @enderror
            </div>

            <div class="form-group">
                <div class="form-main__label" for="files">Прикрепить фотографии (до 5 Мб)</div>
                <label class="input-file">
                    <span id="files_text" class="input-file-text form-control" type="text"></span>
                    <input id="files" type="file" name="files[]" multiple />
                </label>
                @error('files')
                <label class="text-danger font-weight-normal" for="files">{{ $message }}</label>
                @enderror
                @error('files.*')
                <label class="text-danger font-weight-normal" for="files">{{ $message }}</label>
                @enderror
            </div>

            <div class="form-group">
                <div class="form-main__label" for="files">Прикрепить фотографии (до 5 Мб)</div>
                <label class="input-file">
                    <span id="files_text" class="input-file-text form-control" type="text"></span>
                    <input id="files" type="file" name="files[]" multiple />
                </label>
                @error('files')
                <label class="text-danger font-weight-normal" for="files">{{ $message }}</label>
                @enderror
                @error('files.*')
                <label class="text-danger font-weight-normal" for="files">{{ $message }}</label>
                @enderror
            </div>

            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" name="check" type="checkbox" value="true" id="check">
                    <label class="form-check-label" for="check">
                        Я ознакомился с <a target="_blank" style="text-decoration: underline" href="{{ asset('storage/docs/fHdnPchIAEAmjY1nUzBXDvdbiVpVtp8vRxKxhFhW.pdf') }}">Положением о конкурсе Музыки</a>
                    </label>
                </div>
                @error('check')
                <label class="text-danger font-weight-normal" for="check">{{ $message }}</label>
                @enderror
            </div>

            <div class="form-group">
                <input class="contests_button" type="submit" value="Отправить заявку">
            </div>
        </form>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.input-file input[type=file]').on('change', function(){
                let files = this.files;
                $(this).closest('.input-file').find('#files_text').html("Файлов прикреплено: "+files.length);
            });
        });
    </script>
@endsection
