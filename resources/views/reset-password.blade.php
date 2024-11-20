@extends('layout.app')
@section('title', 'Reset Password')
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
                            <a href="{{ route('password.request') }}" class="text-info ms-3 d-inline-flex align-items-center"
                                style="margin-top: 10px; gap: 5px;">
                                <i class="fa-solid fa-less-than"></i>
                                Back
                            </a>

                            <div class="form-container">
                                <h3 class="mb-4 text-center">Update your password</h3>
                                <p>Enter the email that you used when you signed up to recover your password. You will
                                    receive a password reset link.</p>

                                <form action="{{ route('password.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">

                                    <!-- Email Field -->
                                    <div class="mb-3">
                                        <label for="email">Email Address</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" placeholder="Username@gmail.com" name="email"
                                            value="{{ old('email') }}" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- New Password Field -->
                                    <div class="mb-3">
                                        <label for="password">New Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="password" placeholder="Enter your new password" name="password" required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Confirm Password Field -->
                                    <div class="mb-3">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                            id="password_confirmation" placeholder="Re-enter your new password"
                                            name="password_confirmation" required>
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-info w-100 mb-3 text-white">Set new Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
