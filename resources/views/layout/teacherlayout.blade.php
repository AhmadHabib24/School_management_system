<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/svg" href="{{ asset('images/favicon.svg') }}" />
    <link rel="stylesheet" href="{{ asset('css/teachercss/styles.min.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core@5.10.1/main.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- FullCalendar JS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}


</head>

<body class="bg-light">
    @if (!isset($excludeHeader) || !$excludeHeader)
        @include('admin.teacher-header')
    @endif

    @yield('body')
    @yield('script')

    <!-- Other Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };

            @if (session('success'))
                toastr.success('{{ session('success') }}');
            @elseif (session('error'))
                toastr.error('{{ session('error') }}');
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    toastr.error('{{ $error }}');
                @endforeach
            @endif
        });
    </script>
    <script>
        // Get all the random-color-card elements
        const randomCards = document.querySelectorAll('.random-color-card');

        // Array of colors to choose from
        const colors = ['#FF5733', '#33FF57', '#3357FF', '#F333FF', '#FFC300'];

        // Assign random border colors to each card
        randomCards.forEach(card => {
            const randomColor = colors[Math.floor(Math.random() * colors.length)];
            card.style.borderLeftColor = randomColor;
        });
    </script>

    <!-- Additional Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@5.10.1/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@5.10.1/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@5.10.1/main.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/teacherjs/sidebarmenu.js') }}"></script>
    <script src="{{ asset('js/teacherjs/app.min.js') }}"></script>
    <script src="{{ asset('libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('js/teacherjs/dashboard.js') }}"></script>
    <script>
        const daysContainer = document.querySelector('.days');
        const monthDisplay = document.querySelector('.current-month');
        const prevButton = document.querySelector('.prev-month');
        const nextButton = document.querySelector('.next-month');

        let currentDate = new Date(); // Current date
        let selectedDate = new Date(); // Keeps track of the selected month/year

        function renderCalendar() {
            const month = selectedDate.getMonth();
            const year = selectedDate.getFullYear();
            const firstDay = new Date(year, month, 1).getDay(); // Get the day of the week for the 1st
            const lastDate = new Date(year, month + 1, 0).getDate(); // Last date of the month

            // Update the displayed month and year
            monthDisplay.textContent = `${year} ${selectedDate.toLocaleString('default', { month: 'long' })}`;

            // Clear previous calendar days
            daysContainer.innerHTML = '';

            // Add empty divs for days before the 1st day of the month
            for (let i = 0; i < (firstDay === 0 ? 6 : firstDay - 1); i++) {
                daysContainer.innerHTML += `<div></div>`;
            }

            // Add days to the calendar
            for (let day = 1; day <= lastDate; day++) {
                const dayElement = document.createElement('div');
                dayElement.textContent = day;

                // Highlight the current date
                if (
                    month === currentDate.getMonth() &&
                    year === currentDate.getFullYear() &&
                    day === currentDate.getDate()
                ) {
                    dayElement.classList.add('active');
                }

                daysContainer.appendChild(dayElement);
            }
        }

        // Event listeners for navigation
        prevButton.addEventListener('click', () => {
            selectedDate.setMonth(selectedDate.getMonth() - 1);
            renderCalendar();
        });

        nextButton.addEventListener('click', () => {
            selectedDate.setMonth(selectedDate.getMonth() + 1);
            renderCalendar();
        });

        // Initialize the calendar
        renderCalendar();
    </script>
</body>

</html>
