@extends('layouts.master_innerpage')
@section('content')

 <!-- ======= Breadcrumbs ======= -->
 <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Portfolio Details</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li><a href="portfolio.html">Portfolio</a></li>
          <li>Portfolio Details</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Portfolio Details Section ======= -->
  <section id="portfolio-details" class="portfolio-details">
    <div class="container" data-aos="fade-up">

      <div class="row gy-4">

        <div class="col-lg-8">
          <div class="portfolio-details-slider swiper">
            <div class="swiper-wrapper align-items-center">

              <div class="swiper-slide">
                <img src="{{ asset('images/products/'.$product->photopath) }}" alt="">
              </div>

              <div class="swiper-slide">
                <img src="{{ asset('images/products/'.$product->photopath) }}" alt="">
              </div>

              <div class="swiper-slide">
                <img src="{{ asset('images/products/'.$product->photopath) }}" alt="">
              </div>

            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="portfolio-info">
            <h3>{{$product->name}}</h3>
            <ul>
              <li><strong>Seller</strong>: {{$product->user->name}}</li>
              <li><strong>Category</strong>: {{$product->category->name}}</li>
              <li><strong>Condition</strong>: {{$product->condition}}</li>
              <li><strong>Price</strong>: Rs. {{$product->price}}</li>
              <li><strong>Available</strong>: {{$product->stock}} Piece</li>
              <li><strong>Brand</strong>: {{$product->brand}}</li>
              <li><strong>Detail</strong>: {{$product->description}}</li>
            </ul>
            <p class="fs-5 text-danger">
              <input type="number" value="1" class="cart-quantity">
              <a href="#" class="text-success" ><i class="bx bx-plus"></i> Add to Card</a>
            </p>
          </div>
          
      </div>

    </div>
  </section><!-- End Portfolio Details Section -->

  @endsection