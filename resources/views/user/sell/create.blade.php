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
                <form action="{{ route('user.sell.manageproducts.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <!-- Category Field -->
                  <div class="form-group mb-4">
                    <select name="category_id" class="form-control" id="">
                      <option value="" disabled selected hidden>Select Category</option>
                      @foreach($categories as $category)
                      <option @if (old('category_id') == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                    @error('category_id')
                      <p class="text-danger mx-2 mb-0">{{ $message }}</p>
                    @enderror
                  </div>
          
                  <!-- Product Name Field -->
                  <div class="form-group mb-4">
                    <input type="text" class="form-control" name="name" placeholder="Product Name" value="{{ old('name') }}">
                    @error('name')
                      <p class="text-danger mx-2 mb-0">{{ $message }}</p>
                    @enderror
                  </div>
          
                  <!-- Price Field -->
                  <div class="form-group mb-4">
                    <input type="number" class="form-control" name="price" placeholder="Price" value="{{ old('price') }}">
                    @error('price')
                      <p class="text-danger mx-2 mb-0">{{ $message }}</p>
                    @enderror
                  </div>
          
                  <!-- Stock Field -->
                  <div class="form-group mb-4">
                    <input type="number" class="form-control" name="stock" placeholder="Stock" value="{{ old('stock') }}">
                    @error('stock')
                      <p class="text-danger mx-2 mb-0">{{ $message }}</p>
                    @enderror
                  </div>
          
                  <!-- Condition Field -->
                  <div class="form-group mb-4">
                    <select name="condition" class="form-control" id="">
                      <option value="" disabled selected hidden>Select Condition</option>
                      <option @if (old('condition') == "New") selected @endif value="New">New</option>
                      <option @if (old('condition') == "FairlyNew") selected @endif value="FairlyNew">Fairly New</option>
                      <option @if (old('condition') == "Old") selected @endif value="Old">Old</option>
                    </select>
                    @error('condition')
                      <p class="text-danger mx-2 mb-0">{{ $message }}</p>
                    @enderror
                  </div>
          
                  <!-- Brand Field -->
                  <div class="form-group mb-4">
                    <input type="text" class="form-control" name="brand" placeholder="Brand" value="{{ old('brand') }}">
                    @error('brand')
                      <p class="text-danger mx-2 mb-0">{{ $message }}</p>
                    @enderror
                  </div>
          
                  <!-- Description Field -->
                  <div class="form-group mb-4">
                    <textarea class="form-control" name="description" placeholder="Description" rows="8">{{ old('description') }}</textarea>
                    @error('description')
                      <p class="text-danger mx-2 mb-0">{{ $message }}</p>
                    @enderror
                  </div>          
          
                  <!-- Photopath Field -->
                  <div class="form-group mb-4">
                    <input type="file" class="form-control-file" name="photopath">
                    @error('photopath')
                    <p class="text-danger mx-2 mb-0">{{ $message }}</p>
                    @enderror
                  </div>
          
                  <!-- Submit and Exit Buttons -->
                  <div class="flex">
                    <input type="submit" class="btn-add" value="Add Product">
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