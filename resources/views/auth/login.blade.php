@extends('layouts.master_login')
@section('content')

<section class="" style="background-color: #9A616D;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="{{ asset('images/img/login.jpg') }}"
                  alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height:100%;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
  
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="d-flex align-items-center mb-3 pb-1">
                      <a href="/"><span class="h1 fw-bold mb-0 text-dark">Evergreen</span></a>
                    </div>
  
                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
  
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example17">Email address</label>
                        <input type="email" id="form2Example17" name="email" class="form-control form-control-lg" />
                    </div>
                    @error('email')
                      <p class="text-danger">{{$message}}</p>
                    @enderror
  
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example27">Password</label>
                        <input type="password" id="form2Example27" name="password" required autocomplete="current-password" class="form-control form-control-lg" />
                    </div>
                    @error('password')
                      <p class="text-dangerr">{{$message}}</p>
                    @enderror

                    <div class="form-check">
                        <label class="form-check-label" for="form1Example3"> Remember me </label>
                        <input class="form-check-input" type="checkbox" name="remember" value="" id="form1Example3" checked />
                    </div>
  
                    <div class="pt-1 my-4">
                      <input class="btn btn-dark btn-lg btn-block" type="submit" value="Login"/>
                    </div>
  
                    @if (Route::has('password.request'))
                    <a class="small text-muted" href="{{ route('password.request') }}">Forgot password?</a>
                    @endif
                    <p class="mt-2 mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? 
                      <a href="/register" class="text-primary">Register here</a></p>
                </form>
  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    
@endsection