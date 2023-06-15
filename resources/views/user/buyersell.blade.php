@extends('layouts.master_innerpage')
@section('content')


 <!-- ======= Breadcrumbs ======= -->
 <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Seller Center</h2>
        <ol>
          <li><a href="{{route('user.sell.index')}}">Home</a></li>
          <li>Seller Center</li>
        </ol>
      </div>

    </div>
  </section>

  

@if (Auth::user()->role->permissions()->where("name","sell-products")->count() == 0)

@if (Auth::user()->panimage == Null)
<section id="services" class="services">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Why Choose Evergreen for Selling?</h2>
      <p>Experience the benefits of selling on our platform.</p>
    </div>
  
    <div class="row">
      <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" style="margin-bottom: 20px;" data-aos-delay="100">
        <div class="icon-box">
          <div class="icon"><i class="bx bx-group"></i></div>
          <h4><a href="">Wide Customer Base</a></h4>
          <p>Access a large and diverse customer base, increasing your sales potential.</p>
        </div>
      </div>
  
      <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200" style="margin-bottom: 20px;">
        <div class="icon-box">
          <div class="icon"><i class="bx bx-edit"></i></div>
          <h4><a href="">Easy Registration Process</a></h4>
          <p>Join our platform quickly and effortlessly with a simple registration process.</p>
        </div>
      </div>
  
      <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300" style="margin-bottom: 20px;">
        <div class="icon-box">
          <div class="icon"><i class="bx bx-cube-alt"></i></div>
          <h4><a href="">Product Variety</a></h4>
          <p>Showcase and sell a wide range of products, attracting diverse customer demands.</p>
        </div>
      </div>
  
      <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400" style="margin-bottom: 20px;">
        <div class="icon-box">
          <div class="icon"><i class="bx bx-credit-card"></i></div>
          <h4><a href="">Secure Payment Options</a></h4>
          <p>Provide customers with secure payment options, including card payments and cash on delivery.</p>
        </div>
      </div>
  
      <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="500" style="margin-bottom: 20px;">
        <div class="icon-box">
          <div class="icon"><i class="bx bx-headphone"></i></div>
          <h4><a href="">Seller Support</a></h4>
          <p>Receive assistance and support from our dedicated seller support team.</p>
        </div>
      </div>
  
      <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="600" style="margin-bottom: 20px;">
        <div class="icon-box">
          <div class="icon"><i class="bx bx-chart"></i></div>
          <h4><a href="">Growth Opportunities</a></h4>
          <p>Explore growth opportunities with promotional campaigns and marketing initiatives.</p>
        </div>
      </div>
  
      <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="700" style="margin-bottom: 20px;">
        <div class="icon-box">
          <div class="icon"><i class="bx bx-store"></i></div>
          <h4><a href="">C2C and B2C Marketplace</a></h4>
          <p>Sell as an individual or a business, benefiting from a diverse marketplace.</p>
        </div>
      </div>
  
      <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="800" style="margin-bottom: 20px;">
        <div class="icon-box">
          <div class="icon"><i class="bx bx-wallet"></i></div>
          <h4><a href="">Convenient Payment Options</a></h4>
          <p>Accept payments conveniently through card or cash on delivery.</p>
        </div>
      </div>
  
    </div>
  
  </div>

  </div>
</section>



<livewire:before-verification /> 

@endif


@if (Auth::user()->panimage != Null)
    
<section>
  <div class="row justify-content-center" id="submission-message">
    <div class="col-md-10">
      <div class="message-wrapper">
        <h3>Thank you for submitting your details!</h3>
        <p>Kindly wait for our response. We will review your information and get back to you shortly.</p>
      </div>
    </div>
  </div>
</div>

</section>

<section id="registration" class="registration section-bg">
  <div class="registration">
    <div class="section-title">
      <h2>Current Details</h2>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div id="register-business">
          <div class="form-wrapper">
            <div class="form-group">
              <label for="address">Address:</label>
              <div class="form-control" id="address">{{Auth::user()->address}}</div>
            </div>
            <div class="form-group">
              <label for="contact">Contact:</label>
              <div class="form-control" id="contact">{{Auth::user()->phone}}</div>
            </div>
            <div class="form-group">
              <label for="pan-no">PAN No:</label>
              <div class="form-control" id="pan-no">{{Auth::user()->pannumber}}</div>
            </div>
            <div class="form-group mb-4">
              <label for="pan-no">PAN Image:</label>
              <div class="product-image-preview">
              @if (Auth::user()->panimage)
              <img src="{{ asset('images/pan/'.Auth::user()->panimage) }}" alt="Product Image" class="img-fluid">
              @else
              <span>No image available</span>
              @endif
              </div>
          </div>
    
          </div>
        </div>
        
    </div>
  </div>
</section>

@endif

@endif



@endsection