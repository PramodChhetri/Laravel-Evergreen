@extends('layouts.master_login')
@section('content')

    
<!-- Section: Design Block -->
<section class="text-center text-lg-start" style="background-color: #9A616D;">
  <style>
    .cascading-right {
      margin-right: -50px;
    }

    .form-control {
      background-color: #e8f0fe;
    }

    @media (max-width: 991.98px) {
      .cascading-right {
        margin-right: 0;
      }
    }
  </style>

  <!-- Jumbotron -->
  <div class="container py-4 ">
    <div class="row g-0 align-items-center">
      <div class="col-lg-6 mb-5 mb-lg-0">
        <div class="card cascading-right" style="
            background-color:#fff;
            ">
          <div class="card-body p-5 shadow-5">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="d-flex align-items-center mb-3 pb-1">
                  <a href="/"><span class="h1 fw-bold mb-0 text-dark">Evergreen</span></a>
                </div>

                <h5 class="fw-normal mb-3 pb-3 text-dark" style="letter-spacing: 1px; ">Signup for new account</h5>


              <!-- Name Input  -->
              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example2">Full Name</label>
                <input type="text" id="form3Example2" class="form-control" name="name" value="{{old('name')}}" required autofocus autocomplete="name"/>
              </div>
              @error('name')
                <p class="message-error">{{$message}}</p>
              @enderror

              <!-- Email input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example3">Email address</label>
                <input type="email" id="form3Example3" class="form-control" name="email" value="{{old('email')}}" required autocomplete="username" />
              </div>
              @error('email')
                <p class="message-error">{{$message}}</p>
              @enderror

              <!-- Password input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example4">Password</label>
                <input type="password" id="form3Example4" class="form-control" name="password" required autocomplete="new-password"/>
              </div>
              @error('password')
                <p class="message-error">{{$message}}</p>
              @enderror

              <!-- RePassword input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example5">Confirm Password</label>
                <input type="password" id="form3Example5" class="form-control" name="password_confirmation" required autocomplete="new-password" />
              </div>
              @error('password_confirmation')
                <p class="message-error">{{$message}}</p>
              @enderror

              <!-- Submit button -->
              <button type="submit" class="btn btn-dark btn-block mb-4">
                Sign up
              </button>

              <!-- Register buttons -->
              <div class="text-center">
                <p>Already have account? <a class="text-primary" href="/login">Login here</a></p>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0">
        <img src="{{ asset('images/img/signup.jpg') }}" class="w-100 rounded-4 shadow-4"
          alt="" />
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->

    
@endsection