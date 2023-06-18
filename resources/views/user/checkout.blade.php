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

@if(session('success'))
<div class="alert alert-success mt-4">
  {{ session('success') }}
</div>
@endif

<section id="checkout" class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title">Billing Details</h3>
            <form class="needs-validation" novalidate method="POST" action="">
              @csrf
              <div class="row">
                <div class="col-md-12 mb-3">
                  <label for="Name" class="form-label">First name</label>
                  <input type="text" class="form-control" id="Name" name="name" placeholder="" value="" required>
                  <div class="invalid-feedback">
                    Valid first name is required.
                  </div>
                </div>
              </div>
              
              <div class="mb-3">
                <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                  </div>
                  <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">
                <div class="invalid-feedback">
                  Please enter a valid email address for shipping updates.
                </div>
                </div>
              </div>
            
              
              <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required>
                <div class="invalid-feedback">
                  Please enter your address.
                </div>
              </div>
              
              <div class="mb-3">
                <label for="contact" class="form-label">Contact Number</span></label>
                <input type="text" class="form-control" id="contact" name="contact" placeholder="+97798xxxxxxxx or +977xxxxxx">
              </div>
              
              <div class="row">
                <div class="col-md-5 mb-3">
                  <label for="country" class="form-label">Country</label>
                  <select class="form-control" id="country" name="country" required>
                    <option value="">Choose...</option>
                    <option>Nepal</option>
                  </select>
                  <div class="invalid-feedback">
                    Please select a valid country.
                  </div>
                </div>
                
                <div class="col-md-4 mb-3">
                  <label for="state" class="form-label">State</label>
                  <select class="form-control" id="state" name="state" required>
                    <option value="">Choose...</option>
                    <option>Lumbini</option>
                  </select>
                  <div class="invalid-feedback">
                    Please provide a valid state.
                  </div>
                </div>
                
                <div class="col-md-3 mb-3">
                  <label for="zip" class="form-label">Zip</label>
                  <input type="text" class="form-control" id="zip" name="zip" placeholder="" required>
                  <div class="invalid-feedback">
                    Zip code required.
                  </div>
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
              <button class="btn-add" type="submit">Khalti</button>
            </form>
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
        border-radius: 10px;
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
    
      .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
      }
    
      .btn-primary:hover {
        background-color: #0069d9;
        border-color: #0062cc;
      }
  </style>