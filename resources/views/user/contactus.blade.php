@extends('layouts.master_innerpage')

@section('content')


<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <h2>Contact Us</h2>
      <ol>
        <li><a href="{{route('user.index')}}">Home</a></li>
        <li>Contact Us</li>
      </ol>
    </div>
  </div>
</section>

 
      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Contact Us</h2>
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
 

@endsection
