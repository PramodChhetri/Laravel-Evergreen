<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Evergreen-Nepal</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  @livewireStyles

<script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>


  <!-- Favicons -->
  <link href="{{asset('frontend/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('frontend/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  {{-- {{asset('')}} --}}
  <!-- Vendor CSS Files -->
  <link href="{{asset('frontend/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  {{-- Toast Cdn  --}}
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

{{-- Toast Cdn  --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<!-- Template Main CSS File -->
<link href="{{asset('frontend/assets/css/style.css')}}" rel="stylesheet">

<!-- JQuery Table Script -->
<script src="{{asset('datatable/jquery-3.6.0.js')}}"></script>
<link rel="stylesheet" href="{{asset('datatable/datatables.css')}}">
<script src="{{asset('datatable/datatables.js')}}"></script>

<!-- Pusher App Name - evergreennepal -->
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

<script>

  var userId = {{ Auth::user()->id }};

  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;
  
  var pusher = new Pusher('e8d7a1b0813126efbdb5', {
    cluster: 'ap2'
  });
  
  var channel = pusher.subscribe('adminnotification-channel');
  
  // Function to play a notification sound
  function playNotificationSound() {
    var audio = new Audio('{{asset('sound/notification1.mp3')}}'); // Replace with the actual path to your audio file
    audio.play();
  }
  
  channel.bind('orderapproved-event', function(data) {
    console.log(data.notification.user_id); // Debugging line
    if (userId === data.notification.user_id) {
    // Play notification sound
    playNotificationSound();
    
    toastr.options = {
      "closeButton": true,
      "progressBar": true
    };
    toastr.success(JSON.stringify(data.notification.content), 'Approved!', { timeOut: 10000 });
    }
    });

    channel.bind('sellrequestapproved-event', function(data) {
      console.log(data.notification.user_id); // Debugging line
    if (userId === data.notification.user_id) {
    // Play notification sound
    playNotificationSound();
    
    toastr.options = {
      "closeButton": true,
      "progressBar": true
    };
    toastr.success(JSON.stringify(data.notification.content), 'Sell Request Approved!', { timeOut: 10000 });
  }
  });

  channel.bind('sellrequestdeclined-event', function(data) {
    console.log(data.notification.user_id); // Debugging line
    if (userId === data.notification.user_id) {
      // Play notification sound
      playNotificationSound();
      
      toastr.options = {
        "closeButton": true,
        "progressBar": true
      };
      toastr.success(JSON.stringify(data.notification.content), 'Sell Request Declined!', { timeOut: 10000 });
    }
    });

    channel.bind('neworder-event', function(data) {
      console.log(data.notification.user_id); // Debugging line
    if (userId === data.notification.user_id) {
        // Play notification sound
        playNotificationSound();

        toastr.options = {
            "closeButton": true,
            "progressBar": true
        };
        toastr.success(JSON.stringify(data.notification.content), 'New Order!', { timeOut: 10000 });
    }
});


  channel.bind('ordercancelled-event', function(data) {
    console.log(data.notification.user_id); // Debugging line
    if (userId === data.notification.user_id) {
    // Play notification sound
    playNotificationSound();
    
    toastr.options = {
      "closeButton": true,
      "progressBar": true
    };
    toastr.error(JSON.stringify(data.notification.content), 'Order Cancelled!', { timeOut: 10000 });
  }
  });
</script>
</head>

<body>

@include('layouts.navbar_user')

  <main id="main">
     
    @yield('content')

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">

  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-3 col-md-6 footer-contact">
          <h3>Evergreen-Nepal</h3>
          <p>
            G1378 Uttam Chowk <br>
            Gaindakot-13 , NP<br>
            Nepal <br><br>
            <strong>Phone:</strong> +977-9845764219<br>
            <strong>Email:</strong> evergreennp@gmail.com<br>
          </p>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="/">Home</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i>Buy Products</li>
            <li><i class="bx bx-chevron-right"></i>Sell Products</li>
            <li><i class="bx bx-chevron-right"></i>Register Company</li>
            <li><i class="bx bx-chevron-right"></i>Online Payment</li>
            <li><i class="bx bx-chevron-right"></i> on Delivery</li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Our Social Networks</h4>
          <p>You can connect with our team for more information</p>
          <div class="social-links mt-3">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="container footer-bottom clearfix">
    <div class="copyright">
      &copy; Copyright <strong><span>Evergreen-Nepal</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Founded by Pramod Chhetri</a>
    </div>
  </div>
</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

{{-- TinyMCE --}}
<script src="{{asset('tinymce/tinymce.min.js')}}"></script>

<!-- Vendor JS Files -->
<script src="{{asset('frontend/assets/vendor/aos/aos.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('frontend/assets/js/main.js')}}"></script>

@include('layouts.usertoastr')

@livewireScripts

</body>

</html>