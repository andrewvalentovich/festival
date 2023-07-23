import './bootstrap';

//календарь на старнице calendar.blade
if(document.querySelectorAll('#datepicker').length) {
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
    
    $(function(){
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
  
      //когда переключаем месяц обновляем события в новом месяце в календаре
      $("#datepicker").on("click", function(e) {
        addEvenetsDataToCalendar(eventsData)
      });
  
      //добавляем даты из бд в календарь в отображаемый месяц
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
  
      //функция для добавления в отображаемый месяц событый 
      function getEventsOnCurrentDate(item) {
        const day = item.getDate().toString().padStart(2, '0'); // Добавляем ведущий нуль при необходимости
        const month = (item.getMonth() + 1).toString().padStart(2, '0'); // Добавляем ведущий нуль при необходимости
        const year = item.getFullYear();
        const currentDate = `${day}.${month}.${year}` 
        const eventsOnCurrentDate = eventsData.filter((event) => event.data === currentDate);
        createEventsList(eventsOnCurrentDate)
      }

      //функция создаем список мероприятий в html
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
      
      // функия которая создаем список ближайший мероприятитй к текущей дате пользователя
      function getClosestEvents(events) {
        const typeEventsList = document.querySelector('.type__events-list');
        typeEventsList.classList.remove('dates')
        const listItem = document.createElement('div');
        listItem.classList.add('type__events-list-title');
        listItem.innerHTML += 'Ближайшие мероприятия'
        typeEventsList.appendChild(listItem);
  
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
  
      //форматируем дату календаря в dd.mm.yyyy 
      function formatDate(dateString) {
        const [day, monthNum, year] = dateString.split('.');
        const monthName = new Intl.DateTimeFormat('ru', { month: 'long' }).format(new Date(`${year}-${monthNum}-${day}`));
        return `${parseInt(day, 10)} ${monthName} ${year}`;
      }
      getClosestEvents(eventsData)
    });
  
    //тестовые данные 
    const eventsData = [
      {
        title: "Всероссийский фестиваль народный Рахманинов 1",
        slug: "vserossiyskiy-festival-narodnyy-rahmaninov-1",
        data: "20.07.2023"
      },
      {
        title: "Всероссийский фестиваль народный Рахманинов 1",
        slug: "vserossiyskiy-festival-narodnyy-rahmaninov-1",
        data: "22.07.2023"
      },
      {
        title: "Всероссийский фестиваль народный Рахманинов 2",
        slug: "vserossiyskiy-festival-narodnyy-rahmaninov-2",
        data: "23.07.2023"
      },
      {
        title: "Всероссийский фестиваль народный Рахманинов 3",
        slug: "vserossiyskiy-festival-narodnyy-rahmaninov-3",
        data: "24.07.2023"
      },
      {
        title: "Всероссийский фестиваль народный Рахманинов 4",
        slug: "vserossiyskiy-festival-narodnyy-rahmaninov-4",
        data: "25.07.2023"
      },
      {
        title: "Всероссийский фестиваль народный Рахманинов 5",
        slug: "vserossiyskiy-festival-narodnyy-rahmaninov-5",
        data: "25.07.2023"
      },
      {
        title: "Всероссийский фестиваль народный Рахманинов 6",
        slug: "vserossiyskiy-festival-narodnyy-rahmaninov-6",
        data: "27.07.2023"
      },
      {
        title: "Всероссийский фестиваль народный Рахманинов 7",
        slug: "vserossiyskiy-festival-narodnyy-rahmaninov-7",
        data: "28.07.2023"
      },
      {
        title: "Всероссийский фестиваль народный Рахманинов 8",
        slug: "vserossiyskiy-festival-narodnyy-rahmaninov-8",
        data: "30.07.2023"
      },
      {
        title: "Всероссийский фестиваль народный Рахманинов 8",
        slug: "vserossiyskiy-festival-narodnyy-rahmaninov-8",
        data: "30.08.2023"
      },
    ]
  }