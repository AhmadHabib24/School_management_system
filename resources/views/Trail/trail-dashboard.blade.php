@extends('layout.teacherlayout')
@section('title', 'Trail Dashboard')
@php
    $excludeHeader = false;
    $showcontent = true; // This will prevent the header from being included.
@endphp
<style>

</style>
@section('body')
    <!--  Main wrapper -->
    <div class="">
        <!--  Header Start -->
        <!--  Header End -->
        <div class="container-fluid bg-light">
            <!--  Row 1 -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="card w-100">
                        <div class="card-body">
                            <!-- profile card -->
                            <div class="row">
                                <div class="col-lg-9">
                                    <h3>
                                        Hello Peter!
                                    </h3>
                                    <div class="mt-2">
                                        <span class="custom-lightgrey-text">Name</span>
                                        <span class="mx-3"><b>Mira Park</b></span>
                                        <button class="custom-lightgrey border-0 px-1 text-light"
                                            style="border-radius: 2px;">Edit</button>
                                    </div>

                                    <br>
                                    <div>
                                        <span class="custom-lightgrey-text">Hobby</span>
                                        <span class="mx-3"><b>Read a book, music, watching movies</b></span>
                                    </div>
                                    <br>
                                    <div>
                                        <span class="custom-lightgrey-text">Goal</span>
                                        <span class="mx-3"><b>To be fluent in speaking English</b></span>
                                    </div>
                                    <br>
                                    <div>
                                        <span class="custom-lightgrey-text">Enrollment Contract</span>
                                        <span class="mx-3"><b>1 month</b></span>
                                    </div>

                                </div>
                                <div class="col-lg-3">
                                    <center>
                                        <img src="{{asset('images/trial.png')}}" alt="">
                                    </center>
                                </div>
                            </div>


                            <!-- count cards ends -->
                        </div>
                    </div>
                    <!-- profile card ends -->
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card w-100">
                                <div class="card-body custom-pink py-2 px-4">
                                    <h3 class="text-light">
                                        Regular Class
                                    </h3>

                                    <h1 class="text-light mt-3"><b>25</b></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card w-100">
                                <div class="card-body custom-blue py-2 px-4">
                                    <h3 class="text-light">
                                        Taken Class
                                    </h3>

                                    <h1 class="text-light mt-3"><b>5</b></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card w-100">
                                <div class="card-body custom-blue py-2 px-4">
                                    <h3 class="text-light">
                                        Booking Class
                                    </h3>

                                    <h1 class="text-light mt-3"><b>1</b></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card w-100">
                                <div class="card-body custom-blue py-2 px-4">
                                    <h3 class="text-light">
                                        Earned Point
                                    </h3>

                                    <h1 class="text-light mt-3"><b>33</b></h1>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- count cards -->

                    <!-- chart -->
                    <div class="row">
                        <div class="col-8">
                            <div class="card overflow-hidden">
                                <div class="card-body p-4">
                                    <div class="row">
                                        <div class="col-5">
                                            <h5 class="card-title mb-9 fw-semibold">Feedback</h5>
                                        </div>
                                        <div class="col-4"></div>
                                        <div class="col-3 custom-lightgrey-text">2024. 11.24</div>
                                    </div>
                                    <p class="custom-lightgrey-text">You did a great job in the last class. However, you
                                        have to
                                        memorize the words. Prepare for pages 6-8 of the textbook!</p>
                                    <button class="form-control rounded-1 text-light btn btn-dark">View more</button>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="card overflow-hidden">
                                        <div class="card-body p-4">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h5 class="card-title mb-9 fw-semibold">Customer Service</h5>
                                                </div>
                                                <div class="col-4"><i class="fas fa-headset text-dark"
                                                        style="font-size:24px"></i></div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="card overflow-hidden">
                                        <div class="card-body p-4">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h5 class="card-title mb-9 fw-semibold">Purchase history</h5>
                                                </div>
                                                <div class="col-4"><i class="fas fa-history text-dark"
                                                        style="font-size:24px"></i></div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card overflow-hidden">
                                <div class="card-body p-4">
                                    <h5 class="card-title mb-9 fw-semibold">Today Word</h5>
                                    <p class="custom-lightgrey-text">Word <span class="text-dark mx-2">Serene</span>
                                    </p>
                                    <p class="custom-lightgrey-text mt-2">Meaning</p>
                                    <p><b>Calm, peaceful, and untroubled.</b></p>
                                    <p class="custom-lightgrey-text mt-2">Example Sentence</p>
                                    <p><b>After a busy day, Mira enjoys sitting in her garden, appreciating the serene
                                            beauty of the
                                            sunset.</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- chart end  -->
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Yearly Breakup -->
                            <div class="card overflow-hidden">
                                <div class="card-body p-4">
                                    <h5 class="card-title mb-9 fw-semibold">Calender</h5>
                                    <div class="row align-items-center">
                                        <div class="calendar-container">
                                            <div class="calendar-header">
                                                <button class="prev-month">&lt;</button>
                                                <h5 class="current-month mt-2">2024 January</h5>
                                                <button class="next-month">&gt;</button>
                                            </div>
                                            <div class="calendar">
                                                <div class="days-of-week">
                                                    <div>MON</div>
                                                    <div>TUE</div>
                                                    <div>WED</div>
                                                    <div>THU</div>
                                                    <div>FRI</div>
                                                    <div>SAT</div>
                                                    <div>SUN</div>
                                                </div>
                                                <div class="days"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="card-title mb-9 fw-semibold">Today class</h5>
                                    <div class="row align-items-center">
                                        <div class="random-color-cards-container">
                                            <div class="random-color-card">
                                                <div class="random-card-header">
                                                    <img src="{{asset('images/user1.png')}}" alt="User Image">
                                                    <span class="random-card-title me-3">Mike</span>
                                                    <span class="ms-5 random-learn-more">Learn more</span>
                                                </div>
                                                <div class="random-card-body">
                                                    <img src="{{asset('images/ms_skype.png')}}" alt="Small Icon"
                                                        class="small-icon">
                                                    <span class="random-time">1:00 PM - 2:00 PM</span>

                                                </div>
                                                <div class="random-card-body">
                                                    <img src="{{asset('images/editor.png')}}" alt="Small Icon"
                                                        class="small-icon">
                                                    <span class="random-time">Alphabet book 6 - 30 page</span>

                                                </div>
                                                <button class="form-control mt-3 rounded-1 text-light btn btn-dark">Access
                                                    classes</button>
                                            </div>
                                            <div class="random-color-cardyellow bg-custom-yellow">
                                                <div class="row">
                                                    <div class="col-9 d-flex align-items-center">
                                                        <img src="{{asset('images/message.png')}}" alt="Small Icon">
                                                        <span class="fs-5 mx-2 text-dark"><b>@xdeng</b></span>
                                                    </div>
                                                    <div class="col-3 d-flex justify-content-end align-items-center">
                                                        <img src="{{asset('images/Icons.png')}}" alt="Small Icon"
                                                            class="small-icon">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
