 @extends('layouts.master_home')

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
  
  
      <!-- ======= Services Section ======= -->
      <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Services</h2>
            <p>We provide a platform for C2C and B2C businesses.</p>
          </div>
  
          <div class="row">
            <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon-box">
                <div class="icon"><i class="bx bxl-dribbble"></i></div>
                <h4><a href="">Buy Products</a></h4>
                <p>You can buy variety of product through our platform</p>
              </div>
            </div>
  
            <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-file"></i></div>
                <h4><a href="">Register Your Business</a></h4>
                <p>You can join with us with very ease. We take PAN details for verification</p>
              </div>
            </div>
  
            <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-tachometer"></i></div>
                <h4><a href="">Sell Products</a></h4>
                <p>You can list your own products either new or used</p>
              </div>
            </div>
  
            <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-layer"></i></div>
                <h4><a href="">Payment</a></h4>
                <p>Payment can done through Card or Cash on delivey</p>
              </div>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Services Section -->
  
  
      <!-- ======= Portfolio Section ======= -->
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
  
            @foreach ($topproducts as $topproduct)
      
            <div class="col-lg-4 col-md-6 portfolio-item filter-{{$topproduct->condition}}">
              <a href="{{route('user.productdetail',$topproduct->id)}}">
                <div class="portfolio-img"><img src="{{ asset('images/products/'.$topproduct->photopath) }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                </a>
                <h4>{{$topproduct->name}}</h4>
                <p>Rs. {{$topproduct->price}} (Available: {{$topproduct->stock}})</p>
                <div style="display:flex;">
                  <a href="{{ asset('images/products/'.$topproduct->photopath) }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="{{$topproduct->name}}" style="height: 45px"><i class='bx bx-zoom-in'></i></i></a>
                  <form action="{{route('user.orders.cart.store')}}" method="POST">
                    @csrf
                  <input type="hidden" name="product_id" value="{{$topproduct->id}}"> 
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
  
      <!-- ======= Team Section ======= -->
      <section id="team" class="team section-bg">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Team</h2>
            <p>The core team of the organization direct the quality and direction of the organization. We have the best people of the industry who asset the data and improves the quality of the oraganization</p>
          </div>
  
          <div class="row">
  
            <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
              <div class="member d-flex align-items-start">
                <div class="pic"><img src="{{asset('frontend/assets/img/team/team-1.jpg')}}" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4>Walter White</h4>
                  <span>Chief Executive Officer</span>
                  <p>Incharge of the management and administrative direction of organization</p>
                  <div class="social">
                    <a href=""><i class="ri-twitter-fill"></i></a>
                    <a href=""><i class="ri-facebook-fill"></i></a>
                    <a href=""><i class="ri-instagram-fill"></i></a>
                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                  </div>
                </div>
              </div>
            </div>
  
            <div class="col-lg-6 mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="200">
              <div class="member d-flex align-items-start">
                <div class="pic"><img src="{{asset('frontend/assets/img/team/team-2.jpg')}}" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4>Sarah Jhonson</h4>
                  <span>Product Manager</span>
                  <p>Responsible for monitoring products and assisting strategic direction</p>
                  <div class="social">
                    <a href=""><i class="ri-twitter-fill"></i></a>
                    <a href=""><i class="ri-facebook-fill"></i></a>
                    <a href=""><i class="ri-instagram-fill"></i></a>
                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                  </div>
                </div>
              </div>
            </div>
  
            <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="300">
              <div class="member d-flex align-items-start">
                <div class="pic"><img src="{{asset('frontend/assets/img/team/team-3.jpg')}}" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4>William Anderson</h4>
                  <span>CTO</span>
                  <p>Incharge of an organization's technological needs as well as its research and development (R&D).</p>
                  <div class="social">
                    <a href=""><i class="ri-twitter-fill"></i></a>
                    <a href=""><i class="ri-facebook-fill"></i></a>
                    <a href=""><i class="ri-instagram-fill"></i></a>
                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                  </div>
                </div>
              </div>
            </div>
  
            <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="400">
              <div class="member d-flex align-items-start">
                <div class="pic"><img src="{{asset('frontend/assets/img/team/team-4.jpg')}}" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4>Amanda Jepson</h4>
                  <span>Accountant</span>
                  <p>Oversees all financial and tax planning activities of the organization </p>
                  <div class="social">
                    <a href=""><i class="ri-twitter-fill"></i></a>
                    <a href=""><i class="ri-facebook-fill"></i></a>
                    <a href=""><i class="ri-instagram-fill"></i></a>
                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                  </div>
                </div>
              </div>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Team Section -->
  
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
  
      <!-- ======= Frequently Asked Questions Section ======= -->
      <section id="faq" class="faq section-bg">
        <div class="container" >
  
          <div class="section-title">
            <h2>Frequently Asked Questions</h2>
            <p>Here are the top questions that are frequently asked by customerer through different social media platforms.</p>
          </div>
  
          <div class="faq-list">
            <ul>
              <li data-aos="fade-up" data-aos-delay="100">
                <i class="bx bx-help-circle icon-help"></i> <a data-bs-target="#faq-list-1">Can anyone can sell products in this site? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-1"  data-bs-parent=".faq-list">
                  <p>
                    Yes, anyone who have been verified by our time can sell their products. Verification method is very simple. You have to share your PAN details and we will response to your request.
                  </p>
                </div>
              </li>
  
              <li data-aos="fade-up" data-aos-delay="200">
                <i class="bx bx-help-circle icon-help"></i> <a data-bs-target="#faq-list-2" >What are the payment methods? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-2"  data-bs-parent=".faq-list">
                  <p>
                    There are two ways you can do your payment; 1. Using your Debit/Credit Card 2.Cash on delivery
                  </p>
                </div>
              </li>
  
              <li data-aos="fade-up" data-aos-delay="300">
                <i class="bx bx-help-circle icon-help"></i> <a data-bs-target="#faq-list-3" >What type of products are available in your sites? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-3"  data-bs-parent=".faq-list">
                  <p>
                    In our platform user can sell brand new as well as used products.
                  </p>
                </div>
              </li>
  
              <li data-aos="fade-up" data-aos-delay="400">
                <i class="bx bx-help-circle icon-help"></i> <a  data-bs-target="#faq-list-4" >Is your platform follows user C2C model? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-4"  data-bs-parent=".faq-list">
                  <p>
                    Yes we follow C2C as well as B2C model.
                  </p>
                </div>
              </li>
  
              <li >
                <i class="bx bx-help-circle icon-help"></i> <a data-bs-target="#faq-list-5" >How your site verify business? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-5"  data-bs-parent=".faq-list">
                  <p>
                    Verification method is very simple. You have to share your PAN details and we will response to your request.
                  </p>
                </div>
              </li>
  
            </ul>
          </div>
  
        </div>
      </section><!-- End Frequently Asked Questions Section -->
 
      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Contact</h2>
            <p>You can contact our team if you have questions and suggestion for our site</p>
          </div>
  
          <div class="row">
  
            <div class="col-lg-5 d-flex align-items-stretch">
              <div class="info">
                <div class="address">
                  <i class="bi bi-geo-alt"></i>
                  <h4>Location:</h4>
                  <p>UT08 Uttam Chowk, Nawalparasi, NP 535022</p>
                </div>
  
                <div class="email">
                  <i class="bi bi-envelope"></i>
                  <h4>Email:</h4>
                  <p>evergreennp@google.com</p>
                </div>
  
                <div class="phone">
                  <i class="bi bi-phone"></i>
                  <h4>Call:</h4>
                  <p>+977 9845764109</p>
                </div>
  
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
              </div>
  
            </div>
  
            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
              <form action="{{route('send.email')}}" method="post" class="contact-form">
                @csrf
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="name">Your Name</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                      @error('name')
                      <span class="message-error">{{$message}}</span>
                      @enderror
                  </div> 
                  <div class="form-group col-md-6">
                    <label for="email">Your Email</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                    @error('email')
                      <span class="message-error">{{$message}}</span>
                  @enderror
                  </div>
                </div>
                <div class="form-group">
                  <label for="subject">Subject</label>
                  <input type="text" class="form-control" name="subject" id="subject" required>
                </div>
                  @error('subject')
                      <p class="message-error">{{$message}}</p>
                  @enderror
                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea class="form-control" name="message" id="message" rows="10" required ></textarea>
                </div>
                  @error('message')
                      <p class="message-error">{{$message}}</p>
                  @enderror
                  <div style="text-align: center;">
                    <button type="submit"  class="contact-button" >Send Message</button>
                  </div>
              </form>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Contact Section -->

@endsection