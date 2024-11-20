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
                <a href="{{ route('login') }}" class=" text-info ms-3 d-inline-flex align-items-center" style="margin-top: 10px; gap: 5px;">
                    <i class="fa-solid fa-less-than"></i>
                    Back
                </a>
                
              <div class="form-container">
                <h3 class="mb-4 text-center">We have sent you a password reset link via email</h3>
                <p>If you don’t see the email in your inbox, check your spam and advertising folders.</p>
  
  
                
                  <div class="mb-3">
                    
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
  
  
                  <a href="{{route('password.request')}}" class="btn btn-info w-100 mb-3 text-white" value="">Didn’t receive the email?</a>
                  
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
