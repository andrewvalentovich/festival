@extends('layouts.client')

@section('content')
    <div class="type__about-title type__title">
        О нашем фестивале
    </div>
    <div class="type__about-list">
        <div class="type__about-item border">
            <div class="type__about-item-body block">
                <div class="type__about-item-pic">
                    <img src="{{ asset('dist//img/pic/barinov.jpg') }}">
                </div>
                <div class="type__about-item-text">
                    <div class="type__about-item-info">
                        <p class="type__about-item-name type__subtitle">
                            Баринов Валерий Александрович
                            <span>
                                Народный артист России
                            </span>
                        </p>
                        <p class="type__about-item-lead type__lead">
                            Дорогие друзья! Наш первый фестиваль «Народный Рахманинов» приглашает вас на незабываемую встречу с русским гением. Литературные воспоминания о композиторе и незабываемая музыка приоткроют вам живой мир его духовной, сильной и благородной души.
                        </p>
                    </div>
                    <a class="type__about-item-more type__link" href="">
                        Далее...
                    </a>
                </div>
            </div>
        </div>
        <div class="type__about-item border">
            <div class="type__about-item-body block">
                <div class="type__about-item-pic">
                    <img src="{{ asset('dist/img/pic/volchkov.jpg') }}">
                </div>
                <div class="type__about-item-text">
                    <div class="type__about-item-info">
                        <p class="type__about-item-name type__subtitle">
                            Евгений Волчков
                            <span>
                                Доцент РАМ им Гнесиных, кандидат искусствоведения, дирижёр НАОНИР им. Осипова.
                            </span>
                        </p>
                        <p class="type__about-item-lead type__lead">
                        Дорогие друзья! Приветствую вас на первом фестивале "Народный Рахманинов"! Пусть этот праздник откроет вам новые краски в звучании души Русского гения! Рахманинов подарит вам искренние эмоции через прикосновение к исконным традициям, разлитым в его колокольности, песеннности и величии русского духа.
                        </p>
                    </div>
                    <a class="type__about-item-more type__link" href="">
                        Далее...
                    </a>
                </div>
            </div>
        </div>
        <div class="type__about-item border">
            <div class="type__about-item-body block">
                <div class="type__about-item-pic">
                    <img src="{{ asset('dist/img/pic/pospelov.jpg') }}">
                </div>
                <div class="type__about-item-text">
                    <div class="type__about-item-info">
                        <p class="type__about-item-name type__subtitle">
                            Сергей Поспелов
                            <span>
                                Cкрипач и дирижëр. Лауреат международных конкурсов. Педагог Московской государственной консерватории им. П. И. Чайковского.
                            </span>
                        </p>
                        <p class="type__about-item-lead type__lead">
                            Дорогие друзья, я очень рад, что в Москве пройдет большое культурное событие, фестиваль "Народный Рахманинов". Желаю русскому слушателю открыть для себя новые грани творчества нашего гениального Сергея Васильевича Рахманинова и новые имена исполнителей. Аналогов синтеза народного оркестра с симфоническим, касающихся творчества Рахманинова, в фестивалях в мире ещё не было. Уверен, фестиваль "Народный Рахманинов" обречен на успех! Желаю всем большой удачи и вдохновения!
                        </p>
                    </div>
                    <a class="type__about-item-more type__link" href="">
                        Далее...
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
