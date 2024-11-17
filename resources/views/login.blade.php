@extends('layout.app')
@section('title','Login')
@section('body')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card login-card">
        <div class="row g-0">
          <!-- Left side with image -->
          <div class="col-md-6 login-image p-3" style="background-image: url('{{ asset('images/login.png') }}');">
            <img src="{{ asset('images/loginlogo.png') }}" alt="Login Logo">
            <h1 class="text-white">
              Learn English Your Way<br> Video Lessons Anytime, Anywhere!
            </h1>
          </div>

          <!-- Right side with form -->
          <div class="col-md-6">
            <div class="form-container">
              <h3 class="mb-4 text-center">Nice to see you again</h3>


              <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="email" class="form-label">Email Address</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter Email" name="email" value="{{ old('email') }}" required>
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" required>
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rememberMe" name="remember">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                  </div>
                  <a href="#" class="text-decoration-none">Forgot your password?</a>
                </div>

                <button type="submit" class="btn btn-info w-100 mb-3 text-white" value="Login">Login</button>
                <a href="{{ route('google.login') }}" class="btn btn-dark w-100 mb-3"><img src="{{ asset('images/google.png') }}" class="mx-3" alt="">Login with Google</a>
                <button type="button" class="btn btn-warning w-100"><img src="{{ asset('images/vector.png') }}" class="mx-3" alt="">Login with Kakao</button>
              </form>
              <p class="mt-3 text-center">Not a member? <a href="{{ route('register') }}" class="text-decoration-none">Sign Up</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
