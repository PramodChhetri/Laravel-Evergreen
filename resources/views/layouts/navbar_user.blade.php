
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
          <li><a href="{{route('user.buyersell')}}">Sell</a></li>
          <li><a href="{{route('user.orders.index')}}">Orders</a></li>
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
        </ul>
        {{-- Mobile Toggle --}}
        <i class="bi bi-list mobile-nav-toggle"></i>
        {{-- Cart Icon --}}
        <i class='bx bx-cart' id="cart-icon"></i>
      </nav><!-- .navbar -->

      {{-- Cart --}}
      <div class="cart">
        <h2 class="cart-title">YOUR CART</h2>
        @php
            $sum = 0
        @endphp
        {{-- Content --}}
        @foreach ($carts as $cart)
        <div class="cart-content">
          <div class="cart-box">
            <img src="{{ asset('images/products/'.$cart->product->photopath)}}" alt="" class="cart-img">
            <div class="detail-box">
              <div class="cart-product-title">{{$cart->product->name}}</div>
              <div class="cart-price">Rs. {{$cart->product->price}}</div>
              <input type="number" value="{{$cart->quantity}}" class="cart-quantity">
              @php
              $sum = $sum + ($cart->quantity * $cart->product->price) 
              @endphp
            </div>
            {{-- Remove Cart --}}
            <i class='bx bxs-trash-alt cart-remove' ></i>
          </div>
            
        @endforeach
          {{-- Total --}}
          <div class="total">
            <div class="total-title">Total</div>
            <div class="total-price">Rs. {{$sum}}</div>
          </div>
        </div>
        {{-- Buy Button --}}
        <button class="btn-buy">Buy Now</button>

        {{-- Cart Close --}}
        <i class='bx bx-x' id="close-cart"></i>

      </div>
    </div>
  </header><!-- End Header -->
