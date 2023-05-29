
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
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
            </ul>
          </li>

          <li><a href="services.html">Services</a></li>
          <li><a href="{{route('user.products')}}">Products</a></li>
          <li><a href="blog.html">Sell</a></li>
          <li class="dropdown"><a href="#"><span>{{Auth::user()->name}}</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li class="d-inline-flex"><a href="{{route('profile.edit')}}"><img width="20px" src="{{Auth::user()->image}}" alt="..." class="rounded"><span class="p-1">Profile</span></a></li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
              <li><a href="" onclick="event.preventDefault();
                this.closest('form').submit();">Logout</a></li>
              </form>
            </ul>
          </li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
        {{-- Mobile Toggle --}}
        <i class="bi bi-list mobile-nav-toggle"></i>
        {{-- Cart Icon --}}
        <i class='bx bx-cart' id="cart-icon"></i>
      </nav><!-- .navbar -->

      {{-- Cart --}}
      <div class="cart">
        <h2 class="cart-title">YOUR CART</h2>
        {{-- Content --}}
        <div class="cart-content">
          <div class="cart-box">
            <img src="{{ asset('images/products/1685295847.jpg')}}" alt="" class="cart-img">
            <div class="detail-box">
              <div class="cart-product-title">Rayban Sunglass</div>
              <div class="cart-price">$25</div>
              <input type="number" value="1" class="cart-quantity">
            </div>
            {{-- Remove Cart --}}
            <i class='bx bxs-trash-alt cart-remove' ></i>
          </div>
          {{-- Total --}}
          <div class="total">
            <div class="total-title">Total</div>
            <div class="total-price">$00</div>
          </div>
        </div>
        {{-- Buy Button --}}
        <button class="btn-buy">Buy Now</button>

        {{-- Cart Close --}}
        <i class='bx bx-x' id="close-cart"></i>

      </div>
    </div>
  </header><!-- End Header -->
