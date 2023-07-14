@extends('layouts.master_innerpage')

@section('content')
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <h2>Checkout</h2>
      <ol>
        <li><a href="index.html">Home</a></li>
        <li>Checkout</li>
      </ol>
    </div>
  </div>
</section>


<section id="checkout" class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title">Billing Details</h3>
            <form method="POST" action="{{route('user.orders.store')}}">
              @csrf
              <div class="row">
                <div class="col-md-12 mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Eg: Axel Blade" value="">
                  @error('name')
                  <div class="text text-danger">
                    Valid first name is required.
                  </div> 
                  @enderror
                  
                </div>
              </div>
              
              <div class="mb-3">
                <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                  </div>
                  <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">
                </div>
                @error('email')
                  <div class="text text-danger">
                  Please enter a valid email address.
                  </div>
                @enderror
              </div>
            
              
              <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St">
                @error('address')
                <div class="text text-danger">
                  Please enter your address.
                </div>
                @enderror
              </div>
              
              <div class="mb-3">
                <label for="contact" class="form-label">Contact Number</span></label>
                <input type="text" class="form-control" id="contact" name="contact" placeholder="+97798xxxxxxxx or +977xxxxxx">
                @error('contact')
                <div class="text text-danger">
                  Please select a valid Number.
                </div>
                @enderror
              </div>
              
              <div class="row">
                <div class="col-md-5 mb-3">
                  <label for="country" class="form-label">Country</label>
                  <input type="text" class="form-control" id="country" name="country" placeholder="Eg: Nepal">
                  @error('country')
                  <div class="text text-danger">
                    Please select a valid country.
                  </div>
                  @enderror
                </div>
                
                <div class="col-md-4 mb-3">
                  <label for="state" class="form-label">State</label>
                  <input type="text" class="form-control" id="state" name="state" placeholder="Eg: Gandaki">
                  @error('state')
                  <div class="text text-danger">
                    Please provide a valid state.
                  </div>
                  @enderror
                </div>
                
                <div class="col-md-3 mb-3">
                  <label for="zip" class="form-label">Zip</label>
                  <input type="text" class="form-control" id="zip" name="zip" placeholder="Eg: 33003">
                  @error('zip')
                  <div class="text text-danger">
                    Zip code required.
                  </div>  
                  @enderror
                </div>
              </div>
              
              
          </div>
        </div>
      </div>
      
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title">Order Summary</h3>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Product</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $totalPrice = 0;
                @endphp
               @foreach ($carts as $cart)
               <tr>
                <td>{{$cart->product->name}}</td>
                <td>Rs. {{$cart->product->price}}</td>
                <td>{{$cart->quantity}}</td>
                <td>{{$cart->product->price * $cart->quantity}}</td>
              </tr>   
              @php
                $totalPrice += $cart->product->price * $cart->quantity;
              @endphp

              <input type="hidden" name="cart_ids[]" value="{{ $cart->id }}">

               @endforeach

                <tr>
                  <td colspan="3" class="text-end">Total</td>
                  <td>Rs. {{$totalPrice}}</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="m-4">
            <span><b>Payment Options</b></span>
                <hr>
              <button class="btn-add" type="submit">Cash On Delivery</button>
            </form>
              <a class="btn-add">Khalti</a>
          </div>
        </div>

        </div>
      </div>
    </div>
  </section>
  
  <style>
      /* Custom CSS */
      .card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      }
    
      .card-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
      }
    
      .form-label {
        font-weight: bold;
      }
  </style>