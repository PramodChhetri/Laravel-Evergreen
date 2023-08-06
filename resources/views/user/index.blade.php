@extends('layouts.master_user')

@section('home_content')
        
    
    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
        <div class="container">
  
          <div class="row" data-aos="zoom-in">
  
            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="{{ asset('frontend/assets/img/clients/client-1.png') }}" class="img-fluid" alt="">
            </div>
  
            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="{{ asset('frontend/assets/img/clients/client-2.png') }}" class="img-fluid" alt="">
            </div>
  
            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="{{ asset('frontend/assets/img/clients/client-3.png') }}" class="img-fluid" alt="">
            </div>
  
            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="{{ asset('frontend/assets/img/clients/client-4.png') }}" class="img-fluid" alt="">
            </div>
  
            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="{{ asset('frontend/assets/img/clients/client-5.png') }}" class="img-fluid" alt="">
            </div>
  
            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="{{ asset('frontend/assets/img/clients/client-6.png') }}" class="img-fluid" alt="">
            </div>
  
          </div>
  
        </div>
      </section><!-- End Cliens Section -->

      <!-- ======= Portfolio Section ======= -->
      <section id="portfolio" class="portfolio">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Top Products</h2>
          </div>
  
          <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-New">New</li>
            <li data-filter=".filter-FairlyNew">Fairly New</li>
            <li data-filter=".filter-Old">Old</li>
          </ul>
  
          <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
  
            @foreach ($products as $product)
      
            <div class="col-lg-4 col-md-6 portfolio-item filter-{{$product->condition}}">
              <a href="{{route('user.productdetail',$product->id)}}">
                <div class="portfolio-img"><img src="{{ asset('images/products/'.$product->photopath) }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                </a>
                <h4>{{$product->name}}</h4>
                <p>Rs. {{$product->price}} (Available: {{$product->stock}})</p>
                <div style="display:flex;">
                  <a href="{{ asset('images/products/'.$product->photopath) }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="{{$product->name}}" style="height: 45px"><i class='bx bx-zoom-in'></i></i></a>
                  <form action="{{route('user.orders.cart.store')}}" method="POST">
                    @csrf
                  <input type="hidden" name="product_id" value="{{$product->id}}"> 
                  <input type="number" name="quantity" value="1" id="products-quantity">
                  <button type="submit" id="add-to-cart">+</button>
                  </form>
                </div>
        
              </div>
            </div>   
      
            @endforeach
  
          </div>
  
        </div>
      </section><!-- End Portfolio Section -->

      <!-- ======= About Us Section ======= -->
      <section id="about" class="about">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>About Us</h2>
          </div>
  
          <div class="row content">
            <div class="col-lg-6">
              <p>
                
              </p>
              <ul>
                <li><i class="ri-check-double-line"></i> We offer a wide range of carefully curated, high-quality products</li>
                <li><i class="ri-check-double-line"></i> You can join with to start your ecommerce journey</li>
                <li><i class="ri-check-double-line"></i> You can list your own products with ease</li>
              </ul>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0">
              <p>
                Founded in 2020 by Pramod Chhetri, Evergreen is a trusted online destination.Our mission is to provide a seamless and enjoyable shopping experience. Exceptional customer service is our top priority. Explore our online store for a diverse selection that reflects the latest trends.Join our community of discerning shoppers and stay updated on our newsletter and social media.
              </p>
              <a href="/about" class="btn-learn-more">Learn More</a>
            </div>
          </div>
  
        </div>
      </section><!-- End About Us Section -->
  
  
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