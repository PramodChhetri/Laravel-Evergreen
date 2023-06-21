@extends('layouts.master_innerpage')
@section('content')

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <h2>Seller Center</h2>
      <ol>
        <li><a href="{{ route('user.sell.index') }}">Home</a></li>
        <li>Seller Center</li>
      </ol>
    </div>
  </div>
</section>

<div class="container-fluid">
 
  @include('layouts.sidebarseller')
  
    <div class="col-md-10 content" >
      <!-- Product Manage Content -->
      <div class="card" style="background: #f3f5fa">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h2 style="color: #283a5ae6;">Manage Products</h2>
            <div class="mb-3" style="margin-top: 10px; margin-right:20px;">
              <a href="{{route('user.sell.manageproducts.create')}}" class="btn-add">Add New Product</a>
            </div>
            </div>

            <!-- Success Message -->
        @if(session('success'))
        <div class="alert alert-success mt-4">
          {{ session('success') }}
        </div>
        @endif


            <hr style="border: 1px solid #283a5ae6">
            <!-- Rest of the content -->
            
          <div class="table-responsive">
            <table id="mytable" class="table table-hover">
              <thead>
                <tr>
                  <th>Product Image</th>
                  <th>Product Name</th>
                  <th>Category</th>
                  <th>Price</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
               @foreach ($products as $product)
               <tr>
                <td><img height="50px" src="{{ asset('images/products/'.$product->photopath) }}" alt=""></td>
                <td>{{$product->name}}</td>
                <td>{{$product->category->name}}</td>
                <td>Rs. {{$product->price}}</td>
                <td>
                  <a href="{{route('user.sell.manageproducts.edit',$product->id)}}" class="btn-action">Edit</a>
                  <a class="btn-action delete" data-product-id="{{ $product->id }}">Delete</a>

                </td>
              </tr>
               @endforeach
 
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div id="deleteModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content bg-white p-4 rounded-lg">
      <form action="{{ route('user.sell.manageproducts.destroy') }}" method="POST">
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
    $('#mytable').on('click', '.btn-action.delete', function() {
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
