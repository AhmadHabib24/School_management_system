@extends('layout.teacherlayout')
@section('title', 'Teacher Dashboard')
@section('body')
    <!--  Body Wrapper -->
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
                                            <span class="mx-3">Peter Kim</span>
                                            <button class="custom-lightgrey border-0 px-1 text-light"
                                                style="border-radius: 2px;">Edit</button>
                                        </div>

                                        <br>
                                        <div>
                                            <span class="custom-lightgrey-text">Country</span>
                                            <span class="mx-3">Phillippines</span>
                                        </div>

                                        <br>
                                        <span class="custom-lightgrey-text">Teaching Style</span>
                                        <button class="bg-dark border-0 px-1 text-light me-3"
                                            style="border-radius: 2px;">Lively</button>
                                        <button class="bg-dark border-0 px-1 text-light me-3"
                                            style="border-radius: 2px;">Talkactive</button>
                                        <button class="bg-dark border-0 px-1 text-light "
                                            style="border-radius: 2px;">Patience</button>
                                    </div>
                                    <div class="col-lg-3">
                                        <center>
                                            <img src="{{asset('images/profileimg.png')}}" alt="">
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
                                            Today Class
                                        </h3>

                                        <h1 class="text-light mt-3"><b>3</b></h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card w-100">
                                    <div class="card-body custom-blue py-2 px-4">
                                        <h3 class="text-light">
                                            All Student
                                        </h3>

                                        <h1 class="text-light mt-3"><b>11</b></h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card w-100">
                                    <div class="card-body custom-blue py-2 px-4">
                                        <h3 class="text-light">
                                            New Student
                                        </h3>

                                        <h1 class="text-light mt-3"><b>2</b></h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card w-100">
                                    <div class="card-body custom-blue py-2 px-4">
                                        <h3 class="text-light">
                                            Review
                                        </h3>
                                        <div class="stars mb-2">
                                            <span class="star">&#9733;</span> <!-- Star 1 -->
                                            <span class="star">&#9733;</span> <!-- Star 2 -->
                                            <span class="star">&#9733;</span> <!-- Star 3 -->
                                            <span class="star">&#9733;</span> <!-- Star 4 -->
                                            <span class="star">&#9733;</span> <!-- Star 5 -->
                                        </div>
                                        <h1 class="text-light "><b>4.8</b></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- count cards -->

                        <!-- chart -->
                        <div class="row">
                            <div class=" d-flex align-items-strech">
                                <div class="card w-100">
                                    <div class="card-body">
                                        <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                                            <div class="mb-3 mb-sm-0">
                                                <h5 class="card-title fw-semibold">Activity</h5>
                                            </div>
                                            <div>
                                                <select class="form-select">
                                                    <option value="1">Month</option>
                                                    <option value="2">April 2023</option>
                                                    <option value="3">May 2023</option>
                                                    <option value="4">June 2023</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="chart"></div>
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
                                        <h5 class="card-title mb-9 fw-semibold">Schedule</h5>
                                        <div class="row align-items-center">
                                            <div class="random-color-cards-container">
                                                <div class="random-color-card">
                                                    <div class="random-card-header">
                                                        <img src="{{asset('images/user1.png')}}" alt="User Image">
                                                        <span class="random-card-title me-3">Mike</span>
                                                        <span class="ms-5 random-learn-more">Learn more</span>
                                                    </div>
                                                    <div class="random-card-body">
                                                        <img src="../assets/images/ms_skype.png" alt="Small Icon"
                                                            class="small-icon">
                                                        <span class="random-time">1:00 PM - 2:00 PM</span>

                                                    </div>
                                                </div>

                                                <div class="random-color-card">
                                                    <div class="random-card-header">
                                                        <img src="{{asset('images/user1.png')}}" alt="User Image">
                                                        <span class="random-card-title me-3">Mike</span>
                                                        <span class="ms-5 random-learn-more">Learn more</span>
                                                    </div>
                                                    <div class="random-card-body">
                                                        <img src="../assets/images/ms_skype.png" alt="Small Icon"
                                                            class="small-icon">
                                                        <span class="random-time">1:00 PM - 2:00 PM</span>

                                                    </div>
                                                </div>

                                                <div class="random-color-card">
                                                    <div class="random-card-header">
                                                        <img src="{{asset('images/user1.png')}}" alt="User Image">
                                                        <span class="random-card-title me-3">Mike</span>
                                                        <span class="ms-5 random-learn-more">Learn more</span>
                                                    </div>
                                                    <div class="random-card-body">
                                                        <img src="../assets/images/ms_skype.png" alt="Small Icon"
                                                            class="small-icon">
                                                        <span class="random-time">1:00 PM - 2:00 PM</span>

                                                    </div>
                                                </div>


                                                <!-- Repeat the card as needed -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="calendar"></div>

            </div>
        </div>
    </div>







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
    <a href="/logout">Logout</a>

@endsection
{{-- 
@section('space-work')

    

@endsection --}}
