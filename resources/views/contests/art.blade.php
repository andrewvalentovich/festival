@extends('layouts.client')

@section('title')Конкурс художников@endsection
@section('content')
    <div class="type__about-title type__title">
        Подать заявку на конкурс художников
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

            <input type="hidden" name="contest_type" value="Конкурс Художников">
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
                <label for="nomination">Номинация «Изобразительное искусство»</label>
                <select name="nomination" class="form-control">
                    <option {{ old("nomination") ? "":"selected" }} disabled>Выберите раздел</option>
                    <option value="Художники" {{ old("nomination") == "Художники" ? "selected":"" }}>1. Художники</option>
                    <option value="ДПИ (декоративно-прикладное искусство, народные ремёсла)" {{ old("nomination") == "ДПИ (декоративно-прикладное искусство, народные ремёсла)" ? "selected":"" }}>2. ДПИ (декоративно-прикладное искусство, народные ремёсла)</option>
                </select>
                @error('nomination')
                    <label class="text-danger font-weight-normal" for="nomination">{{ $message }}</label>
                @enderror
            </div>

            <div class="form-group">
                <input type="submit" value="Отправить заявку">
            </div>
        </form>
    </div>
@endsection
