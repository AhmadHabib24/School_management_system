@extends('layout.teacherlayout')
@section('title', 'Free Trail Form')
@php
    $excludeHeader = true; // This will prevent the header from being included.
@endphp
<style>
    body {
        background-color: #f8f9fa;
    }

    .form-container {
        margin: 2rem auto;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .form-card {
        width: 100%;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 2rem;
    }

    .form-title {
        text-align: center;
        margin-bottom: 1.5rem;
        font-size: 1.5rem;
        font-weight: bold;
    }

    .terms {
        margin-top: 1rem;
        padding: 1rem;
        font-size: 0.9rem;
        color: #555;
    }

    .terms ul {
        list-style: disc;
        padding-left: 1.5rem;
    }

    .terms a {
        color: #007bff;
        text-decoration: none;
    }

    .terms a:hover {
        text-decoration: underline;
    }
</style>
@section('body')
    <div class="container form-container">
        <div class="form-card col-lg-8">
            <h2 class="form-title">Free Class Application Form</h2>

            <form action="{{ route('free_trial.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="custom-form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>
                        </div>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <div class="custom-form-group">
                            <label for="english-name">English Name</label>
                            <input type="text" class="form-control" id="english-name" name="english_name" required>
                        </div>
                        @error('english_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <div class="custom-form-group">
                            <label for="age">Age</label>
                            <input type="number" class="form-control" id="age" name="age" required>
                        </div>
                        @error('age')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="custom-form-group">
                            <label for="phone">Cell Phone Number</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="custom-form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="custom-form-group">
                            <label>Gender</label>
                            <br>
                            <div class="form-check form-check-inline mt-2">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="custom-form-group">
                        <label for="introduction">Student Introduction</label>
                        <textarea class="form-control"
                            placeholder="Example: I have been learning English for 10 months. I can do phonics, but I have difficulty reading and listening."
                            id="introduction" rows="4" name="introduction" required></textarea>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="custom-form-group">
                            <label for="class-date">Desired Date for Experience Class</label>
                            <input type="date" class="form-control" id="class-date" name="class_date" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="custom-form-group">
                            <label for="time">Available Time</label>
                            <input type="time" class="form-control" id="time" name="time" required>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="custom-form-group">
                        <label for="requests">Class Requests</label>
                        <textarea class="form-control"
                            placeholder="Example: I have difficulty speaking English. Please teach with interesting topics." id="requests"
                            rows="4" name="requests" required></textarea>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="custom-form-group">
                            <label for="signup-path">Sign Up Path</label>
                            <input type="text" class="form-control" id="signup-path" name="signup_path" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="custom-form-group">
                            <label for="coupon">Coupon Number</label>
                            <input type="text" placeholder="0000-0000-0000" class="form-control" id="coupon"
                                maxlength="14" required oninput="formatCoupon(this)" name="coupon">
                            <small id="error" style="color: red; display: none;">Coupon must be in the format
                                0000-0000-0000.</small>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100 mt-4">
                    Sign Up for a Free Class
                </button>
            </form>
        </div>
    </div>
    {{-- <a href="{{route('trail-dashboard')}}">Trail Dashboard</a> --}}

    <div class="container terms col-lg-8">
        <ul>
            <li>
                <b>Since teachers don't know any information about the student, it would be of great help if you wrote it
                    down as accurately as possible.</b>
            </li>
            <li>
                <b>The experience class consists of two sessions of 10 minutes each, and an additional 2 minutes of 10
                    minutes each is available upon request. <a
                        href="https://xdenglish.net/customer/notice/?mod=document&pageid=1&uid=232">[How to apply]</a></b>
            </li>
            <li>
                <b>Free classes are conducted using each teacher's own textbooks and online materials, and during regular
                    classes, the classes are tailored to the student's needs. <a
                        href="https://xdenglish.net/company/curricul/">Textbooks and other classes</a> It proceeds with</b>
            </li>
        </ul>
    </div>





    <script>
        const phoneInput = document.getElementById('phone');

        phoneInput.addEventListener('input', function(e) {
            // Remove all non-numeric characters
            let value = e.target.value.replace(/\D/g, '');

            // Format the number according to Korean phone format
            if (value.length > 3 && value.length <= 7) {
                // Format: 010-XXXX
                value = `${value.slice(0, 3)}-${value.slice(3)}`;
            } else if (value.length > 7) {
                // Format: 010-XXXX-XXXX
                value = `${value.slice(0, 3)}-${value.slice(3, 7)}-${value.slice(7, 11)}`;
            }

            // Update the input value
            e.target.value = value;
        });

        function formatCoupon(input) {
            // Remove all non-numeric characters
            let value = input.value.replace(/\D/g, '');

            // Format the value into groups of 4 separated by dashes
            value = value.match(/.{1,4}/g)?.join('-') || '';

            // Update the input field
            input.value = value;
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.querySelector('form');
            const inputs = form.querySelectorAll('input, textarea');

            // Function to validate only required inputs
            function validateInput(input) {
                const errorMessage = input.nextElementSibling; // Select the small element for error messages
                if (input.hasAttribute('required') && input.value.trim() === '') {
                    input.style.border = '1px solid red';
                    if (errorMessage) {
                        errorMessage.textContent = '* Required';
                        errorMessage.style.color = 'red';
                        errorMessage.style.display = 'block';
                    }
                    return false;
                } else {
                    input.style.border = '';
                    if (errorMessage) {
                        errorMessage.textContent = '';
                        errorMessage.style.display = 'none';
                    }
                    return true;
                }
            }

            // Add event listeners to inputs for real-time validation
            inputs.forEach((input) => {
                const small = document.createElement('small'); // Create error message element
                small.style.display = 'none';
                input.insertAdjacentElement('afterend', small);

                input.addEventListener('blur', () => validateInput(input));
                input.addEventListener('input', () => validateInput(input));
            });

            // Validate all inputs on form submission
            form.addEventListener('submit', (e) => {
                let isValid = true;
                inputs.forEach((input) => {
                    if (input.hasAttribute('required') && !validateInput(input)) {
                        isValid = false;
                    }
                });
                if (!isValid) {
                    e.preventDefault();
                    alert('Please fill in all required fields.');
                }
            });
        });
    </script>
@endsection
