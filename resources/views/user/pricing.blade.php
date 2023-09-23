@extends('layouts.master_innerpage')

@section('content')


<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2>Team</h2>
        <ol>
          <li><a href="{{route('user.index')}}">Home</a></li>
          <li>Team</li>
        </ol>
      </div>
    </div>
  </section>
  

    
      <!-- ======= Pricing Section ======= -->
      <section id="pricing" class="pricing">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Pricing</h2>
            {{-- <p></p> --}}
          </div>
  
          <div class="row">
  
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
              <div class="box">
                <h3>Free Plan</h3>
                <h4><sup>$</sup>0<span>per month</span></h4>
                <ul>
                  <li><i class="bx bx-check"></i> Register Account</li>
                  <li><i class="bx bx-check"></i> Buy Products</li>
                  <li><i class="bx bx-check"></i> Online Payment</li>
                  <li class="na"><i class="bx bx-x"></i> <span>Register You Business</span></li>
                  <li class="na"><i class="bx bx-x"></i> <span>List Upto 25 products</span></li>
                </ul>
              </div>
            </div>
  
            <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
              <div class="box featured">
                <h3>Business Plan</h3>
                <h4><sup>$</sup>29<span>per month</span></h4>
                <ul>
                  <li><i class="bx bx-check"></i> Register account</li>
                  <li><i class="bx bx-check"></i> Buy products</li>
                  <li><i class="bx bx-check"></i> Online payment</li>
                  <li><i class="bx bx-check"></i> Register You Business</li>
                  <li><i class="bx bx-check"></i> List Upto 25 products</li>
                </ul>
              </div>
            </div>
  
            <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
              <div class="box">
                <h3>Premium Plan</h3>
                <h4><sup>$</sup>49<span>per month</span></h4>
                <ul>
                  <li><i class="bx bx-check"></i> Register account</li>
                  <li><i class="bx bx-check"></i> Buy products</li>
                  <li><i class="bx bx-check"></i> Online payment</li>
                  <li><i class="bx bx-check"></i> Register You Business</li>
                  <li><i class="bx bx-check"></i> List Unlimited products</li>
                </ul>
              </div>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Pricing Section -->
   

@endsection
