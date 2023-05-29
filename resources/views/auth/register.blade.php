@extends('layouts.master_login')
@section('content')

    
<!-- Section: Design Block -->
<section class="text-center text-lg-start" style="background-color: #9A616D;">
  <style>
    .cascading-right {
      margin-right: -50px;
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
            background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);
            ">
          <div class="card-body p-5 shadow-5 text-center">
            <h2 class="fw-bold mb-5">Sign up now</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf

              <!-- Name Input  -->
              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example2">Full Name</label>
                <input type="text" id="form3Example2" class="form-control" name="name" value="{{old('name')}}" required autofocus autocomplete="name"/>
              </div>
              @error('name')
                <p class="text-danger">{{$message}}</p>
              @enderror

              <!-- Email input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example3">Email address</label>
                <input type="email" id="form3Example3" class="form-control" name="email" value="{{old('email')}}" required autocomplete="username" />
              </div>
              @error('email')
                <p class="text-danger">{{$message}}</p>
              @enderror

              <!-- Password input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example4">Password</label>
                <input type="password" id="form3Example4" class="form-control" name="password" required autocomplete="new-password"/>
              </div>
              @error('password')
                <p class="text-danger">{{$message}}</p>
              @enderror

              <!-- RePassword input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example5">Confirm Password</label>
                <input type="password" id="form3Example5" class="form-control" name="password_confirmation" required autocomplete="new-password" />
              </div>
              @error('password_confirmation')
                <p class="text-danger">{{$message}}</p>
              @enderror

              <!-- Submit button -->
              <button type="submit" class="btn btn-primary btn-block mb-4">
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
        <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" class="w-100 rounded-4 shadow-4"
          alt="" />
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->

    
@endsection