require('./bootstrap');
import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';
import timeGridPlugin from '@fullcalendar/timegrid';

// Import FullCalendar styles
import '@fullcalendar/core/main.css';
import '@fullcalendar/daygrid/main.css';
import '@fullcalendar/timegrid/main.css';


document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new Calendar(calendarEl, {
        plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin],
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        events: '/calendar-events',  // Fetch events from your backend
        selectable: true,
        select: function(info) {
            // Add your logic for selecting a date/time
            const title = prompt('Enter event title');
            if (title) {
                const eventData = {
                    title: title,
                    start: info.startStr,
                    end: info.endStr
                };
                calendar.addEvent(eventData);
            }
        }
    });

    calendar.render();
});

