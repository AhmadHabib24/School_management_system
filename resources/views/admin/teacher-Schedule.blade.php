@extends('layout.teacherlayout')
@section('title', 'Schedule')

@section('body')
    <div class="container-fluid bg-light">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Event Calendar</h4>
                        <!-- Calendar -->
                        <div id="calendar">
                            <div class="calendar-header">
                                <button id="prevMonth" class="btn btn-primary">Prev</button>
                                <span id="monthYear"></span>
                                <button id="nextMonth" class="btn btn-primary">Next</button>
                            </div>
                            <div class="calendar-grid">
                                <div class="day-name">Sun</div>
                                <div class="day-name">Mon</div>
                                <div class="day-name">Tue</div>
                                <div class="day-name">Wed</div>
                                <div class="day-name">Thu</div>
                                <div class="day-name">Fri</div>
                                <div class="day-name">Sat</div>
                            </div>
                            <div id="calendar-days" class="calendar-days"></div>
                        </div>

                        <!-- Time Slots for the selected day -->
                        <div id="timeSlots" class="time-slots">
                            <h5>24-hour Time Slot for: <span id="selectedDate"></span></h5>
                            <div id="timeSlotList"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Yearly Breakup -->
                        <div class="card overflow-hidden bg-dark">
                            <div class="card-body">
                                <h5 class="card-title fw-semibold text-white">
                                    <i class="fas fa-solid fa-plus" style="margin-right: 8px;"></i>
                                    <button class="btn text-white p-0" data-bs-toggle="modal"
                                        data-bs-target="#createEventModal">
                                        Create Event
                                    </button>
                                </h5>

                            </div>
                        </div>
                        <div class="row">
                            @foreach ($event as $event)
                                <div class="card my-2 shadow-sm">
                                    <div class="card-body d-flex align-items-center">
                                        <!-- Color Indicator -->
                                        <div class="me-3">
                                            <div
                                                style="width: 20px; height: 20px; background-color: {{ $event->event_color }}; border-radius: 50%;">
                                            </div>
                                        </div>
                                        <!-- Event Details -->
                                        <div>
                                            <p class="mb-1">
                                                <strong>Event Name:</strong>
                                                <span class="text-primary">{{ $event->event_name }}</span>
                                            </p>
                                            <p class="mb-1">
                                                <strong>Event Color:</strong>
                                                <span class="badge"
                                                    style="background-color: {{ $event->event_color }}; color: #fff;">
                                                    {{ ucfirst($event->event_color) }}
                                                </span>
                                            </p>
                                            <p class="mb-0">
                                                <strong>Created At:</strong>
                                                <span
                                                    class="text-muted">{{ $event->created_at->format('d M Y, H:i A') }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="row">


            <div class="col-lg-4">

            </div>


        </div>



        <!-- Create Event Modal -->
        <div class="modal fade" id="createEventModal" tabindex="-1" aria-labelledby="createEventModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createEventModalLabel">Create Event</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="createEventForm" method="POST" action="{{ route('store-event') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="eventName" class="form-label">Event Name</label>
                                <input type="text" class="form-control" id="eventName" name="event_name"
                                    placeholder="Enter event name" required>
                            </div>
                            <div class="mb-3">
                                <label for="eventColor" class="form-label">Select Color</label>
                                <select class="form-select" id="eventColor" name="event_color" required>
                                    <option value="red">Red</option>
                                    <option value="blue">Blue</option>
                                    <option value="green">Green</option>
                                    <option value="yellow">Yellow</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Event</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        @endsection
        @section('script')
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                // Array of events
                const events = [{
                        title: 'Meeting',
                        date: '2024-11-10',
                        color: '#ffbc75'
                    },
                    {
                        title: 'Lunch time',
                        date: '2024-11-12',
                        color: '#78c0e2'
                    },
                    {
                        title: 'Event 1',
                        date: '2024-11-15',
                        color: '#6cc8f7'
                    },
                    {
                        title: 'Event 2',
                        date: '2024-11-20',
                        color: '#ff75c1'
                    }
                ];

                let currentMonth = new Date().getMonth();
                let currentYear = new Date().getFullYear();

                // Format the date to YYYY-MM-DD
                const formatDate = (day, month, year) =>
                    `${year}-${(month + 1).toString().padStart(2, '0')}-${day.toString().padStart(2, '0')}`;

                // Function to generate the calendar days
                function generateCalendar(month, year) {
                    const firstDay = new Date(year, month, 1).getDay();
                    const lastDate = new Date(year, month + 1, 0).getDate();
                    const calendarDays = document.getElementById('calendar-days');
                    const monthYear = document.getElementById('monthYear');

                    // Set the month and year in the header
                    monthYear.textContent = new Date(year, month).toLocaleString('default', {
                        month: 'long',
                        year: 'numeric'
                    });

                    // Clear previous days
                    calendarDays.innerHTML = '';

                    // Empty slots before the 1st day of the month
                    for (let i = 0; i < firstDay; i++) {
                        const emptyDiv = document.createElement('div');
                        emptyDiv.classList.add('calendar-day');
                        calendarDays.appendChild(emptyDiv);
                    }

                    // Generate days of the month
                    for (let day = 1; day <= lastDate; day++) {
                        const dayDiv = document.createElement('div');
                        dayDiv.classList.add('calendar-day');
                        const currentDate = formatDate(day, month, year);

                        // Check if the day has an event
                        const event = events.find(event => event.date === currentDate);
                        if (event) {
                            dayDiv.classList.add('event');
                            dayDiv.style.backgroundColor = event.color;
                            dayDiv.title = event.title;
                        }

                        // Add day number
                        dayDiv.innerHTML = `<span>${day}</span>`;
                        calendarDays.appendChild(dayDiv);
                    }
                }

                // Function to navigate to the previous month
                document.getElementById('prevMonth').addEventListener('click', function() {
                    currentMonth--;
                    if (currentMonth < 0) {
                        currentMonth = 11;
                        currentYear--;
                    }
                    generateCalendar(currentMonth, currentYear);
                });

                // Function to navigate to the next month
                document.getElementById('nextMonth').addEventListener('click', function() {
                    currentMonth++;
                    if (currentMonth > 11) {
                        currentMonth = 0;
                        currentYear++;
                    }
                    generateCalendar(currentMonth, currentYear);
                });

                // Initial render
                generateCalendar(currentMonth, currentYear);
            </script>
            <script>
                const events = [
                    { title: 'Meeting', date: '2024-11-10', color: '#ffbc75' },
                    { title: 'Lunch time', date: '2024-11-12', color: '#78c0e2' },
                    { title: 'Event 1', date: '2024-11-15', color: '#6cc8f7' },
                    { title: 'Event 2', date: '2024-11-20', color: '#ff75c1' }
                ];
            
                let currentMonth = new Date().getMonth();
                let currentYear = new Date().getFullYear();
            
                const formatDate = (day, month, year) => `${year}-${(month + 1).toString().padStart(2, '0')}-${day.toString().padStart(2, '0')}`;
            
                // Function to generate the calendar days
                function generateCalendar(month, year) {
                    const firstDay = new Date(year, month, 1).getDay();
                    const lastDate = new Date(year, month + 1, 0).getDate();
                    const calendarDays = document.getElementById('calendar-days');
                    const monthYear = document.getElementById('monthYear');
                    
                    // Set the month and year in the header
                    monthYear.textContent = new Date(year, month).toLocaleString('default', { month: 'long', year: 'numeric' });
                    
                    // Clear previous days
                    calendarDays.innerHTML = '';
            
                    // Empty slots before the 1st day of the month
                    for (let i = 0; i < firstDay; i++) {
                        const emptyDiv = document.createElement('div');
                        emptyDiv.classList.add('calendar-day');
                        calendarDays.appendChild(emptyDiv);
                    }
            
                    // Generate days of the month
                    for (let day = 1; day <= lastDate; day++) {
                        const dayDiv = document.createElement('div');
                        dayDiv.classList.add('calendar-day');
                        const currentDate = formatDate(day, month, year);
                        
                        // Check if the day has an event
                        const event = events.find(event => event.date === currentDate);
                        if (event) {
                            dayDiv.classList.add('event');
                            dayDiv.style.backgroundColor = event.color;
                            dayDiv.title = event.title;
                        }
            
                        // Add day number
                        dayDiv.innerHTML = `<span>${day}</span>`;
                        dayDiv.onclick = () => showTimeSlots(currentDate);
                        calendarDays.appendChild(dayDiv);
                    }
                }
            
                // Show 24-hour time slots for the selected day
                function showTimeSlots(date) {
                    const timeSlotList = document.getElementById('timeSlotList');
                    const selectedDate = document.getElementById('selectedDate');
                    selectedDate.textContent = date;
            
                    // Clear existing time slots
                    timeSlotList.innerHTML = '';
            
                    // Create 24-hour time slots (00:00 to 23:00)
                    for (let hour = 0; hour < 24; hour++) {
                        const timeSlotDiv = document.createElement('div');
                        const formattedHour = `${hour.toString().padStart(2, '0')}:00`;
                        timeSlotDiv.classList.add('time-slot');
                        timeSlotDiv.textContent = formattedHour;
            
                        // Handle click on time slot
                        timeSlotDiv.onclick = () => timeSlotDiv.classList.toggle('active');
                        timeSlotList.appendChild(timeSlotDiv);
                    }
            
                    // Display the time slots section
                    document.getElementById('timeSlots').style.display = 'block';
                }
            
                // Function to navigate to the previous month
                document.getElementById('prevMonth').addEventListener('click', function() {
                    currentMonth--;
                    if (currentMonth < 0) {
                        currentMonth = 11;
                        currentYear--;
                    }
                    generateCalendar(currentMonth, currentYear);
                });
            
                // Function to navigate to the next month
                document.getElementById('nextMonth').addEventListener('click', function() {
                    currentMonth++;
                    if (currentMonth > 11) {
                        currentMonth = 0;
                        currentYear++;
                    }
                    generateCalendar(currentMonth, currentYear);
                });
            
                // Initial render
                generateCalendar(currentMonth, currentYear);
            </script>
            




        @endsection
