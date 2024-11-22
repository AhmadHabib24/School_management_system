@extends('layout.app')
@section('title', 'Register')
@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card login-card">
                    <div class="row g-0">
                        <!-- Left side with image -->
                        <div class="col-md-6 register-image p-3"
                            style="background-image: url('{{ asset('images/login.png') }}');">
                            <img src="images/loginlogo.png" alt="Login Logo">
                            <h1 class="text-white">
                                Learn English Your Way<br> Video Lessons Anytime, Anywhere!
                            </h1>
                        </div>

                        <!-- Right side with form -->
                        <div class="col-md-6">
                            <div class="form-container">
                                <h3 class="mb-2 text-center">Create Account</h3>
                                <form action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" placeholder="Enter Name" name="name"
                                            value="{{ old('name') }}" required>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" placeholder="example@example.com" name="email"
                                            value="{{ old('email') }}" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="password" placeholder="Enter Password" name="password" required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" id="password_confirmation"
                                            placeholder="Confirm Password" name="password_confirmation" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="role" class="form-label">Sign Up as</label>
                                        <select class="form-control @error('role') is-invalid @enderror" id="role" name="role" required>
                                            <option value="" disabled selected>Please Select at least one value</option>
                                            <option value="teacher">Teacher</option>
                                            <option value="student">Student</option>
                                        </select>
                                        @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    

                                    <button type="submit" class="btn btn-info w-100 mb-3 text-white">Sign Up</button>
                                    <a href="{{ route('google.login') }}" type="button" class="btn btn-dark w-100 mb-3"><img src="images/google.png"
                                            class="mx-3" alt="">Sign up with Google</a>
                                    <button type="button" class="btn btn-warning w-100"><img src="images/vector.png"
                                            class="mx-3" alt="">Sign up with Kakao</button>
                                </form>
                                </form>

                                <p class="mt-3 text-center">Already a member? <a href="{{ route('login') }}"
                                        class="text-decoration-none">Login</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
