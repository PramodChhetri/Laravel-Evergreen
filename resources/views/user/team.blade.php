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

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
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
  
   

@endsection
