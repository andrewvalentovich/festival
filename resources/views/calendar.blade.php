@extends('layouts.client')
@section('title')Календарный план@endsection
@section('styles')
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('content')
    <div class="type__about-title type__title">
        Календарный план
    </div>
    <div class="datepicker-w">
        <div id="datepicker"></div>
        <input type="hidden" id="datepicker_value" value="">
    </div>
    <div class="type__events-list">
    </div>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $.ajax({
            type: 'GET',
            url: '/api/events', // Обработчик
            data: '',
            success: function (data) {
                console.log('Успех!');
                console.log(data);
                createEventsCalendar(data)
            },
            error: function (data) {
                console.log('Ошибка!');
                console.log(data);
            }
            });
            function createEventsCalendar(dataEvents) {
            const eventsData = [...JSON.parse(dataEvents)]
            getClosestEvents(eventsData)
            //русифицируем календарь
            $.datepicker.regional['ru'] = {
                closeText: 'Закрыть',
                prevText: 'Предыдущий',
                nextText: 'Следующий',
                currentText: 'Сегодня',
                monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
                monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек'],
                dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
                dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
                dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
                weekHeader: 'Не',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''
            };
            $.datepicker.setDefaults($.datepicker.regional['ru']);
            
                //создаем календарь
                $("#datepicker").datepicker({
                dateFormat: "dd.mm.yy", // Устанавливаем формат даты "день.месяц.год"
                highlightCurrentDay: false,
                onSelect: function(date){
                    $('#datepicker_value').val(date)
                    const currentDatePicked = $("#datepicker").datepicker( "getDate" )
                    getEventsOnCurrentDate(currentDatePicked)
                    setTimeout(() => {
                    addEvenetsDataToCalendar(eventsData)

                    },0)
                },
                });
                //делаем календарь развернутым сразу 
                $("#datepicker").datepicker("setDate", $('#datepicker_value').val());

                // Создаем переменную, в которой будет храниться ссылка на слушатель события
                let clickHandler = function(event) {
                event.preventDefault(); // Предотвращаем стандартное поведение (перезагрузку страницы и переход по ссылке)
                console.log('test')
                };

                // Добавляем обработчик клика к элементам с классом "event"
                $("#datepicker a").on("click", clickHandler);
                // Позже, когда нужно остановить обработку кликов, используем метод off() с сохраненной ссылкой на слушатель
                $("#datepicker a").off("click", clickHandler);

                $("#datepicker").on("click", function(e) {
                addEvenetsDataToCalendar(eventsData)
                });

                //добавляем даты из бд в календарь
                addEvenetsDataToCalendar(eventsData)
                function addEvenetsDataToCalendar(data) {
                const calendar = document.querySelector('#datepicker');
                const calendarActiveDates = calendar.querySelectorAll('[data-handler="selectDay"]');
                
                calendarActiveDates.forEach(element => {
                    let dateElement = '';
                    const year = element.getAttribute('data-year');
                    const month = parseInt(element.getAttribute('data-month'), 10) + 1;
                    const day = element.querySelector('a').innerHTML;
                
                    const formattedMonth = String(month).padStart(2, '0');
                    const formattedDay = String(day).padStart(2, '0');
                
                    dateElement = `${formattedDay}.${formattedMonth}.${year}`;
                
                    const eventDataDate = data.map(obj => obj.data);
                    const isDatePresent = eventDataDate.includes(dateElement);
                    //если на дату есть меропрятие даем ему класс event
                    if (isDatePresent) {
                    element.classList.add('event')
                    }
                });
                }

                //получаем список мероприятий на выбранную дату
                function getEventsOnCurrentDate(item) {
                const day = item.getDate().toString().padStart(2, '0'); // Добавляем ведущий нуль при необходимости
                const month = (item.getMonth() + 1).toString().padStart(2, '0'); // Добавляем ведущий нуль при необходимости
                const year = item.getFullYear();
                const currentDate = `${day}.${month}.${year}` 
                const eventsOnCurrentDate = eventsData.filter((event) => event.data === currentDate);
                createEventsList(eventsOnCurrentDate)
                }

                //функция получает массив событий и отображает их на странице
                function createEventsList(events) {
                const typeEventsList = document.querySelector('.type__events-list');
                typeEventsList.innerHTML = ''

                const listItem = document.createElement('div');
                listItem.classList.add('type__events-list-title');
                if(!events.length) {
                    listItem.innerHTML += 'Мероприятий на выбранную дату нет'
                    typeEventsList.appendChild(listItem);
                    return
                }
                listItem.innerHTML += 'Список мероприятий на выбранную дату'
                typeEventsList.appendChild(listItem);

                events.forEach((event) => {
                    const listItem = document.createElement('div');
                    listItem.classList.add('type__events-list-item');
                
                    const link = document.createElement('a');
                    link.href = event.slug;
                    link.textContent = event.title;
                
                    listItem.appendChild(link);
                
                    typeEventsList.appendChild(listItem);
                });
                }
                
                //функция для отображения ближайших мероприятий
                function getClosestEvents(events) {
                const typeEventsList = document.querySelector('.type__events-list');
                const listItem = document.createElement('div');
                listItem.classList.add('type__events-list-title');
                listItem.innerHTML += 'Ближайшие мероприятия'
                typeEventsList.appendChild(listItem);
                if(!events.length) {
                    listItem.innerHTML = 'Мероприятий нет'
                    return
                }
                const currentDate = new Date(); // Текущая дата
                const sortedEvents = events.filter(event => {
                    const eventDateParts = event.data.split(".");
                    const eventDate = new Date(`${eventDateParts[2]}-${eventDateParts[1]}-${eventDateParts[0]}`);
                    return eventDate >= currentDate;
                }).sort((a, b) => {
                    const dateA = new Date(a.data.split(".").reverse().join("-"));
                    const dateB = new Date(b.data.split(".").reverse().join("-"));
                    return dateA - dateB;
                });
                sortedEvents.slice(0, 5).forEach((event) => {
                    const listItem = document.createElement('div');
                    listItem.classList.add('type__events-list-item');
                
                    const link = document.createElement('a');
                    link.href = event.slug;
                    link.textContent = event.title;

                    const date = document.createElement('p');
                    date.classList.add('type__date')
                    date.innerHTML += formatDate(event.data);

                    listItem.appendChild(link);
                    listItem.appendChild(date);
                
                    typeEventsList.appendChild(listItem);
                });

                }

                function formatDate(dateString) {
                const [day, monthNum, year] = dateString.split('.');
                const monthName = new Intl.DateTimeFormat('ru', { month: 'long' }).format(new Date(`${year}-${monthNum}-${day}`));
                return `${parseInt(day, 10)} ${monthName} ${year}`;
                }
            }
    </script>
@endsection
