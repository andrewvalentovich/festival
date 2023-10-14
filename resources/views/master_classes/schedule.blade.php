@extends('layouts.client')
@section('title')График и тайминг мастер-классов с 11 октября по 16 октября Начало ежедневно в 12.00 окончание в 15.00@endsection
@section('content')
    <div class="type__about-title type__title">
        График и тайминг мастер-классов
        с 11 октября по 16 октября
        Начало ежедневно в 12.00 окончание в 15.00
    </div>
    <div class="type__news-list">
        <style>
            table, td, th {
                border: 1px solid;
                padding: 7px 10px;
                box-sizing: border-box;
                color: #f8f8f8;
                font-family: Inter;
                font-size: 14px;
                font-style: normal;
                font-weight: 400;
                line-height: normal;
                letter-spacing: .24px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }
        </style>
        <table>
            <tr>
                <th>Дата</th>
                <th>
                    ФИО художника, время проведения,
                    кол-во людей на МК
                </th>
                <th>Название, категория</th>
                <th>Категория МК</th>
            </tr>
            <tr>
                <td>
                    11.10
                </td>
                <td>
                    <strong>Лейзгольд М.Б.</strong>
                    13:00&nbsp;-&nbsp;14:00 (10&nbsp;чел)
                </td>
                <td>
                    "Рапсодия на тему Рахманинова”
                </td>
                <td>
                    групповой
                </td>
            </tr>
            <tr>
                <td>
                    11.10
                </td>
                <td>
                    <strong>Жгивалёва М.Н.</strong>
                    13:00&nbsp;-&nbsp;14:00 (10&nbsp;чел)
                </td>
                <td>
                    «Музыка в душе»
                    под музыку Рахманинова
                </td>
                <td>
                    групповой
                </td>
            </tr>
            <tr>
                <td>
                    11.10
                </td>
                <td>
                    <strong>Ковалёва М.С.</strong>
                    14.00&nbsp;-&nbsp;15.00 (10&nbsp;чел)
                </td>
                <td>
                    «Сирень акварельными карандашами»
                </td>
                <td>
                    групповой
                </td>
            </tr>
            <tr>
                <td>
                    11.10
                </td>
                <td>
                    <strong>Семенцов А.Ю.</strong>
                    14:00&nbsp;-&nbsp;15:00 (10&nbsp;чел)
                </td>
                <td>
                    "Декоративная роспись русских ложек"
                </td>
                <td>
                    групповой
                </td>
            </tr>
            <tr>
                <td>
                    12.10
                </td>
                <td>
                    <strong>Шиханов М.А.</strong>
                    12:00&nbsp;-&nbsp;15:00 (неограниченно)
                </td>
                <td>
                    Живописный Мастер-класс по позолоченному холсту масляными красками.
                </td>
                <td>
                    открытый
                </td>
            </tr>
            <tr>
                <td>
                    12.10
                </td>
                <td>
                    <strong>Корзун А.Ю.</strong>
                    12.20&nbsp;-&nbsp;13.30 (10&nbsp;чел)
                </td>
                <td>
                    «Рисунок на стекле»
                </td>
                <td>
                    групповой
                </td>
            </tr>
            <tr>
                <td>
                    12.10
                </td>
                <td>
                    <strong>Назарова А.М.</strong>
                    13.30&nbsp;-14.40 (10&nbsp;чел)
                </td>
                <td>
                    "Осенняя мелодия"
                    Картины из шерсти
                </td>
                <td>
                    групповой
                </td>
            </tr>
            <tr>
                <td>
                    13.10
                </td>
                <td>
                    <strong>Шиханов П.А.</strong>
                    12.15&nbsp;-&nbsp;13.30 (10&nbsp;чел)
                </td>
                <td>
                    “Музыка», как мы ее видим!»
                </td>
                <td>
                    групповой
                </td>
            </tr>
            <tr>
                <td>
                    13.10
                </td>
                <td>
                    <strong>Ункель Н.П.</strong>
                    12.15&nbsp;-&nbsp;13.30 (10&nbsp;чел)
                </td>
                <td>
                    Авторский мастер-класс,
                    “Музыка воплощение в живописи”
                </td>
                <td>
                    групповой
                </td>
            </tr>
            <tr>
                <td>
                    13.10
                </td>
                <td>
                    <strong>Рахлина Н.А.</strong>
                    14.00&nbsp;-&nbsp;15.00 (10&nbsp;чел)
                </td>
                <td>
                    "Мелодия живописи"
                    создание абстрактной композиции
                </td>
                <td>
                    групповой
                </td>
            </tr>
            <tr>
                <td>
                    14.10
                </td>
                <td>
                    <strong>Бакицкая О.В.</strong>
                    12.30&nbsp;-13.40 (10&nbsp;чел)
                </td>
                <td>
                    «Звуки природы» (пастель)
                </td>
                <td>
                    групповой
                </td>
            </tr>
            <tr>
                <td>
                    14.10
                </td>
                <td>
                    <strong>Глебова Ю.<br/>Неврова Г.</strong>
                    12.00&nbsp;-&nbsp;14.00 (неограниченно)
                </td>
                <td>
                    Авторская художественная керамика
                </td>
                <td>
                    открытый<br/>открытый
                </td>
            </tr>
            <tr>
                <td>
                    14.10
                </td>
                <td>
                    <strong>Маркевич М.Б.</strong>
                    12.00&nbsp;-&nbsp;13.15 (10&nbsp;чел)<br/>
                    13.30&nbsp;-&nbsp;15.00 (10&nbsp;чел)
                </td>
                <td>
                    "Десница" (скульптурная рука из пластилин)
                </td>
                <td>
                    групповой
                </td>
            </tr>
            <tr>
                <td>
                    15.10
                </td>
                <td>
                    <strong>Казновская Л.Н.</strong>
                    12.15&nbsp;-&nbsp;13.30 (10&nbsp;чел)
                </td>
                <td>
                    «Игра света». Создадим живописную картину.
                </td>
                <td>
                    групповой
                </td>
            </tr>
            <tr>
                <td>
                    15.10
                </td>
                <td>
                    <strong>Сехпосян О. А.</strong>
                    12.15&nbsp;-&nbsp;13.30 (10&nbsp;чел)
                </td>
                <td>
                    Русский пейзаж “Осенняя осень” под музыку Рахманинова
                </td>
                <td>
                    групповой
                </td>
            </tr>
            <tr>
                <td>
                    15.10
                </td>
                <td>
                    <strong>Михеева С.А.<br/>Боромангнаева З.Д.</strong>
                    12.00&nbsp;-&nbsp;13.15 (10&nbsp;чел)<br/>
                    13.30&nbsp;-&nbsp;15.00 (10&nbsp;чел)
                </td>
                <td>
                    “Смешанная техника”
                    (коллаж+графика)
                </td>
                <td>
                    групповой<br/>групповой
                </td>
            </tr>
            <tr>
                <td>
                    16.10
                </td>
                <td>
                    <strong>Кочемасова Т.А</strong>
{{--                    12:15&nbsp;-&nbsp;13:15--}}
                    <p style="color:red;">(Мастер-класс отменен по объективным причинам! Приносим своим извинения!)</p>
                </td>
                <td>
                    Творческая мастерская вице-президента РАХ
                </td>
                <td>
                    открытый
                </td>
            </tr>
            <tr>
                <td>
                    16.10
                </td>
                <td>
                    <strong>Данильченко Е.С.</strong>
                    12.30&nbsp;-&nbsp;13.40<br/>(неограниченно)
                </td>
                <td>
                    Открытый мастер класс по скульптуре Рахманинов
                </td>
                <td>
                    открытый
                </td>
            </tr>
            <tr>
                <td>
                    16.10
                </td>
                <td>
                    <strong>Иванова Н.М.</strong>
                    12.00&nbsp;-&nbsp;13.15 (10&nbsp;чел)<br/>
                    13.30&nbsp;-&nbsp;15.00 (10&nbsp;чел)
                </td>
                <td>
                    "Птица Сирин, Алконост, Гамаюн" (Глиняный рельеф)
                </td>
                <td>
                    групповой
                </td>
            </tr>
        </table>
    </div>
@endsection
