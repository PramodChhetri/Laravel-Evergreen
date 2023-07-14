@extends('layouts.master_innerpage')
@section('content')

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Orders</h2>
            <ol>
                <li><a href="{{route('user.index')}}">Home</a></li>
                <li>Orders</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->

{{-- Content Starts Here --}}

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar">
            <ul class="navbar-nav">
                <li >
                    <a class="nav-link" href="{{route('user.orders.index')}}">Current Orders</a>
                </li>
                <li >
                    <a class="nav-link" href="#">Order History</a>
                </li>
                <li >
                    <a class="nav-link" href="{{route('user.orders.cart')}}">Your Cart</a>
                </li>
            </ul>
        </div>
        <div class="col-md-10 content">
            <!-- Your page content goes here -->
            <div class="card" style="background: #f3f5fa">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h2 style="color: #283a5ae6;">Your Cart</h2>
                    </div>

                    <!-- Success Message -->
                    @if(session('success'))
                    <div class="alert alert-success mt-4">
                        {{ session('success') }}
                    </div>
                    @endif

                    @error('quantity')
                    <div class="alert alert-danger mt-4">
                        {{ $message }}
                    </div>
                    @enderror

                    <hr style="border: 1px solid #283a5ae6">
                    <!-- Rest of the content -->

                    <div class="table-responsive">
                        <table id="mytable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Product Image</th>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>Quantity</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $totalPrice = 0;
                                @endphp
                                @foreach ($carts as $cart)
                                <tr>
                                    <td><img height="50px"
                                            src="{{ asset('images/products/'.$cart->product->photopath) }}"
                                            alt=""></td>
                                    <td>{{$cart->product->name}}</td>
                                    <td>Rs. {{$cart->product->price}}</td>
                                    <td>
                                        <form action="{{route('user.orders.cart.updatestock',$cart->id)}}"
                                            method="POST">
                                            @csrf
                                            <input type="number" name="quantity" value="{{$cart->quantity}}"
                                                id="edit-cart-stock">
                                            <button type="submit" class="btn-cart-action" style="border-radius: 4px;">Update</button>
                                        </form>
                                    </td>
                                    <td><a id="btn-action-delete" class="btn btn-danger" data-product-id="{{ $cart->id }}">Delete</a></td>
                                </tr>
                                @php
                                $totalPrice += $cart->product->price * $cart->quantity;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-between mx-2 mt-5">
                             <a href="{{route('user.checkout')}}" class="btn-cart-action">Buy Now</a>
                            <h4>Total Price: Rs. {{$totalPrice}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="deleteModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content bg-white p-4 rounded-lg">
      <form action="{{ route('user.orders.cart.destroy') }}" method="POST">
        @csrf
        <p class="modal-title text-2xl">Are you sure you want to delete?</p>
        <input type="hidden" name="dataid" id="dataid" value="">
        <div class="modal-footer justify-center">
          <input type="submit" value="Yes" class="btn btn-primary mx-2">
          <a id="btn-cancel" class="btn btn-danger mx-2">No</a>
        </div>
      </form>
    </div>
  </div>
</div>



<script>
  $(document).ready(function() {
    // Event delegation for dynamically generated elements
    $('#mytable').on('click','#btn-action-delete', function() {
      var productId = $(this).data('product-id');
      $('#dataid').val(productId);
      $('#deleteModal').modal('show');
    });

    $('#btn-cancel').on('click', function() {
      $('#deleteModal').modal('hide');
    });

    $('#deleteModal').on('hidden.bs.modal', function() {
      $('#dataid').val('');
    });
  });
</script>



<script>
  let table = new DataTable('#mytable');
</script>


@endsection
