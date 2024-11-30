<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>XD English</title>
    <link rel="shortcut icon" type="image/svg" href="{{ asset('images/favicon.svg') }}" />
    <link rel="stylesheet" href="{{ asset('css/teachercss/styles.min.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- FullCalendar CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.0.3/fullcalendar.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- FullCalendar JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.0.3/fullcalendar.min.js"></script>

</head>

<body>

    <!-- Top Bar -->
    <nav class="navbar navbar-expand-lg gradient-background ">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="{{ asset('images/logoblack.png') }}" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}"><b class="fs-5">Signup</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('loadLogin') }}"><b class="fs-5">Login</b></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Video Banner -->
    <div class="video-banner">
        <video autoplay muted loop>
            <source src="{{ asset('images/Video.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="overlay">
            <div class="container-fluid">
                <h1 class="display-4 text-light">Level up your Skills Get one-on-one coaching or join a dynamic study
                    group your sucess starts now! <br> <a href="{{route('trail-form')}}" style="text-decoration: none;">
                        <span class="bg-danger text-light" style="font-size: 40px;">Start your trial class now
                            !!!</span>
                    </a>
                </h1>
            </div>


        </div>




    </div>
