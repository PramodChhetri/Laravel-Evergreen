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
  <div class="row">
    <div class="col-md-2 sidebar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('user.sell.index') }}">Seller Center</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('user.sell.managestocks') }}">Manage Stocks</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.sell.manageproducts') }}">Manage Products</a>
        </li>
        </ul>
    </div>
    <div class="col-md-10 content">
        <div class="card" id="product-form" style="background: #f7f7f7;">
            <div class="card-header">
              <h2>Add Product</h2> 
            </div>
            <div class="card-body">
              <div class="form-wrapper">
                <form action="{{ route('user.sell.manageproducts.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <!-- Category Field -->
                  <div class="form-group mb-4">
                    <select name="category_id" class="form-control" id="">
                      <option value="" disabled selected hidden>Select Category</option>
                      @foreach($categories as $category)
                        <option 
                        @if ($product->category_id == $category->id)
                            {{"selected"}}
                        @endif
                        value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                      <p class="text-danger mx-2 mb-0">{{ $message }}</p>
                    @enderror
                  </div>
          
                  <!-- Product Name Field -->
                  <div class="form-group mb-4">
                    <input type="text" class="form-control" name="name" placeholder="Product Name" value="{{$product->name}}">
                    @error('name')
                      <p class="text-danger mx-2 mb-0">{{ $message }}</p>
                    @enderror
                  </div>
          
                  <!-- Price Field -->
                  <div class="form-group mb-4">
                    <input type="number" class="form-control" name="price" placeholder="Price" value="{{$product->price}}">
                    @error('price')
                      <p class="text-danger mx-2 mb-0">{{ $message }}</p>
                    @enderror
                  </div>
          
                  <!-- Stock Field -->
                  <div class="form-group mb-4">
                    <input type="number" class="form-control" name="stock" placeholder="Stock" value="{{$product->stock}}">
                    @error('stock')
                      <p class="text-danger mx-2 mb-0">{{ $message }}</p>
                    @enderror
                  </div>
          
                  <!-- Condition Field -->
                  <div class="form-group mb-4">
                    <select name="condition" class="form-control" id="">
                        <option value="" disabled selected hidden  >Select Condition</option>
                        <option value="New" @if ($product->condition == "New")
                        {{"selected"}}
                        @endif>New</option>
                        <option value="FairlyNew" @if ($product->condition == "FairlyNew")
                         {{"selected"}}
                        @endif >Fairly New</option>
                        <option value="Old" @if ($product->condition == "Old")
                         {{"selected"}}
                        @endif >Old</option>
                    </select>
                    @error('condition')
                      <p class="text-danger mx-2 mb-0">{{ $message }}</p>
                    @enderror
                  </div>
          
                  <!-- Brand Field -->
                  <div class="form-group mb-4">
                    <input type="text" class="form-control" name="brand" placeholder="Brand" value="{{$product->brand}}">
                    @error('brand')
                      <p class="text-danger mx-2 mb-0">{{ $message }}</p>
                    @enderror
                  </div>
          
                  <!-- Description Field -->
                  <div class="form-group mb-4">
                    <textarea class="form-control" name="description" placeholder="Description" rows="8">{{$product->description}}</textarea>
                    @error('description')
                      <p class="text-danger mx-2 mb-0">{{ $message }}</p>
                    @enderror
                  </div>          
          
                  <!-- Photopath Field -->
                <div class="form-group mb-4">
                    <div class="product-image-preview">
                    @if ($product->photopath)
                    <img src="{{ asset('images/products/'.$product->photopath) }}" alt="Product Image" class="img-fluid">
                    @else
                    <span>No image available</span>
                    @endif
                    </div>
                    <input type="file" class="form-control-file" name="photopath" id="product-image">
                    @error('photopath')
                     <p class="text-danger mx-2 mb-0">{{ $message }}</p>
                     @enderror
                </div>
          
                  <!-- Submit and Exit Buttons -->
                  <div class="flex">
                    <input type="submit" class="btn-add" value="Update">
                    <a href="{{ route('user.sell.manageproducts') }}" class="btn-add">Exit</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
          

    </div>
  </div>
</div>


@endsection