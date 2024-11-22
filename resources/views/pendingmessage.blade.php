@extends('layout.app')
@section('title', 'Request Approval')
@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card login-card">
                    <div class="row g-0">
                        <!-- Left side with image -->
                        <div class="col-md-6 login-image p-3"
                            style="background-image: url('{{ asset('images/login.png') }}');">
                            <img src="{{ asset('images/loginlogo.png') }}" alt="Login Logo">
                            <h1 class="text-white">
                                Learn English Your Way<br> Video Lessons Anytime, Anywhere!
                            </h1>
                        </div>

                        <!-- Right side with form -->
                        <div class="col-md-6">
                            <a href="\logout" class=" text-info ms-3 d-inline-flex align-items-center"
                                style="margin-top: 10px; gap: 5px;">
                                <i class="fa-solid fa-less-than"></i>
                                Back
                            </a>

                            <div class="form-container mt-5">
                                <h3 class="mb-4 text-center">Your request has been received</h3>
                                <p class="text-center">
                                    We value your time. As soon as your request is approved, you will receive an email.
                                    Thank you for waiting!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
