
<!-- ======= Header ======= -->
<header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="/">Evergreen</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="/" class="logo me-auto"><img src="{{ asset('frontend/assets/img/logo.png') }}" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href="{{route('user.index')}}">Home</a></li>

          <li class="dropdown"><a href="#"><span>About</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="about.html">About Us</a></li>
              <li><a href="team.html">Team</a></li>
              <li><a href="testimonials.html">Testimonials</a></li>
            </ul>
          </li>
          <li><a href="{{route('user.products')}}">Products</a></li>
          <li><a href="{{route('user.sell.index')}}">Sell</a></li>
          <li><a href="{{route('user.orders.index')}}">Orders</a></li>
          <li class="dropdown"><a href="#"><span>{{Auth::user()->name}}</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li class="d-inline-flex"><a href="{{route('profile.edit')}}">
               <span class="p-1">Profile</span></a></li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
              <li><a href="" onclick="event.preventDefault();
                this.closest('form').submit();">Logout</a></li>
              </form>
            </ul>
          </li>
        </ul>
        {{-- Mobile Toggle --}}
        <i class="bi bi-list mobile-nav-toggle"></i>
        {{-- Cart Icon --}}
        <i class='bx bx-cart' id="cart-icon"></i>
      </nav><!-- .navbar -->



    <livewire:cart-content />
    
  </header><!-- End Header -->

  