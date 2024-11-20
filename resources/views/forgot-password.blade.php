@extends('layout.app')
@section('title', 'Forgot Password')
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
                <a href="{{ route('loadLogin') }}" class=" text-info ms-3 d-inline-flex align-items-center" style="margin-top: 10px; gap: 5px;">
                    <i class="fa-solid fa-less-than"></i>
                    Back
                </a>
                
              <div class="form-container">
                <h3 class="mb-4 text-center">Recover your password</h3>
                <p>Enter the email that you used when you signed up to recover your password. You will receive s password reset link.</p>
  
  
                <form action="{{ route('password.email') }}" method="POST">
                  @csrf
                  <div class="mb-3">
                    
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Username@gmail.com" name="email" value="{{ old('email') }}" required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
  
  
                  <button type="submit" class="btn btn-info w-100 mb-3 text-white" >Send Password Reset Link</button>
                  </form>
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
