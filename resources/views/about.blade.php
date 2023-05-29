@extends('layouts.master_innerpage')
@section('content')

       <!-- ======= Breadcrumbs ======= -->
       <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>About</h2>
            <ol>
              <li><a href="index.html">Home</a></li>
              <li>About</li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs -->
  
      <!-- ======= About Us Section ======= -->
      <section id="about-us" class="about-us">
        <div class="container" data-aos="fade-up">
  
          <div class="row content">
            <div class="col-lg-6" data-aos="fade-right">
              <h2>Evergreen Nepal</h2>
              <h3>Evergreen is the most trusted platform for starting business journey. We provide secure and attractive platform to buy and sell your own products</h3>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
              <p>
                Founded in 2020 by Pramod Chhetri, Evergreen is a trusted online destination.Our mission is to provide a seamless and enjoyable shopping experience. Exceptional customer service is our top priority. Explore our online store for a diverse selection that reflects the latest trends.
              </p>
              <ul>
                <li><i class="ri-check-double-line"></i> We offer a wide range of carefully curated, high-quality products</li>
                <li><i class="ri-check-double-line"></i> You can join with to start your ecommerce journey</li>
                <li><i class="ri-check-double-line"></i> You can list your own products with ease</li>
              </ul>
              <p class="fst-italic">
                Join our community of discerning shoppers and stay updated on our newsletter and social media.
              </p>
            </div>
          </div>
  
        </div>
      </section><!-- End About Us Section -->
  
      <!-- ======= Our Team Section ======= -->
      <section id="team" class="team section-bg">
        <div class="container">
  
          <div class="section-title" data-aos="fade-up">
            <h2>Our <strong>Team</strong></h2>
            <p>The core team of the organization direct the quality and direction of the organization. We have the best people of the industry who asset the data and improves the quality of the oraganization</p>
          </div>
  
          <div class="row">
  
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
              <div class="member" data-aos="fade-up">
                <div class="member-img">
                  <img src="{{asset('frontend/assets/img/team/team-1.jpg')}}" class="img-fluid" alt="">
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4>Walter White</h4>
                  <span>Chief Executive Officer</span>
                </div>
              </div>
            </div>
  
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
              <div class="member" data-aos="fade-up" data-aos-delay="100">
                <div class="member-img">
                  <img src="{{asset('frontend/assets/img/team/team-2.jpg')}}" class="img-fluid" alt="">
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4>Sarah Jhonson</h4>
                  <span>Product Manager</span>
                </div>
              </div>
            </div>
  
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
              <div class="member" data-aos="fade-up" data-aos-delay="200">
                <div class="member-img">
                  <img src="{{asset('frontend/assets/img/team/team-3.jpg')}}" class="img-fluid" alt="">
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4>William Anderson</h4>
                  <span>CTO</span>
                </div>
              </div>
            </div>
  
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
              <div class="member" data-aos="fade-up" data-aos-delay="300">
                <div class="member-img">
                  <img src="{{asset('frontend/assets/img/team/team-4.jpg')}}" class="img-fluid" alt="">
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4>Amanda Jepson</h4>
                  <span>Accountant</span>
                </div>
              </div>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Our Team Section -->
  
  
      <!-- ======= Our Clients Section ======= -->
      <section id="clients" class="clients">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Clients</h2>
          </div>
  
          <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">
  
            <div class="col-lg-3 col-md-4 col-6">
              <div class="client-logo">
                <img src="{{asset('frontend/assets/img/clients/client-1.png')}}" class="img-fluid" alt="">
              </div>
            </div>
  
            <div class="col-lg-3 col-md-4 col-6">
              <div class="client-logo">
                <img src="{{asset('frontend/assets/img/clients/client-2.png')}}" class="img-fluid" alt="">
              </div>
            </div>
  
            <div class="col-lg-3 col-md-4 col-6">
              <div class="client-logo">
                <img src="{{asset('frontend/assets/img/clients/client-3.png')}}" class="img-fluid" alt="">
              </div>
            </div>
  
            <div class="col-lg-3 col-md-4 col-6">
              <div class="client-logo">
                <img src="{{asset('frontend/assets/img/clients/client-4.png')}}" class="img-fluid" alt="">
              </div>
            </div>
  
            <div class="col-lg-3 col-md-4 col-6">
              <div class="client-logo">
                <img src="{{asset('frontend/assets/img/clients/client-5.png')}}" class="img-fluid" alt="">
              </div>
            </div>
  
            <div class="col-lg-3 col-md-4 col-6">
              <div class="client-logo">
                <img src="{{asset('frontend/assets/img/clients/client-6.png')}}" class="img-fluid" alt="">
              </div>
            </div>
  
            <div class="col-lg-3 col-md-4 col-6">
              <div class="client-logo">
                <img src="{{asset('frontend/assets/img/clients/client-7.png')}}" class="img-fluid" alt="">
              </div>
            </div>
  
            <div class="col-lg-3 col-md-4 col-6">
              <div class="client-logo">
                <img src="{{asset('frontend/assets/img/clients/client-8.png')}}" class="img-fluid" alt="">
              </div>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Our Clients Section -->

@endsection