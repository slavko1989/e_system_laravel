@extends('admin.bootstrap_sections.head')
@section('title','Admin Dashboard')
@section('links')

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>

@endsection

@include('admin.bootstrap_sections.top_container')
@include('admin.bootstrap_sections.sidebar')
@include('admin.bootstrap_sections.dashboard')

<div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-third">
         @if(session()->has('message'))
        <p style="color: red;font-weight: bolder;">{{ session()->get('message') }}</p>
  @endif
      </div>
      <div class="w3-twothird">
        <h5>Table for products</h5>
        <div class="form-group">
          <form method="post" action="{{ url('products/update/'.$edit_product->id) }}" enctype="multipart/form-data">
            @csrf
        <label for="cat_name">Title:</label>
        <input type="text" class="form-control" placeholder="Enter title" id="category" name="title" value="{{ $edit_product->title }}">
        @error('title')
            <p style="color: black;">{{ $message }}</p>
        @enderror
        <label for="cat_name">Text:</label>
        <input type="text" class="form-control" placeholder="Enter text" id="category" name="text" value="{{ $edit_product->text }}">
        @error('text')
            <p style="color: black;">{{ $message }}</p>
        @enderror
        <label for="cat_name">Price:</label>
        <input type="text" class="form-control" placeholder="Enter price" id="category" name="price" value="{{ $edit_product->price }}">
        @error('title')
            <p style="color: black;">{{ $message }}</p>
        @enderror
        <label for="cat_name">New price:</label>
        <input type="text" class="form-control" placeholder="Enter new price" id="category" name="new_price" value="{{ $edit_product->new_price }}">
        @error('new_price')
            <p style="color: black;">{{ $message }}</p>
        @enderror
        <label for="cat_name">Image:</label>
        <input type="file" class="form-control" placeholder="Enter image" id="category" name="image" value="{{ $edit_product->image }}">
        <img src="{{asset('product/' . $edit_product->image) }}" alt="" style="width:70px;"><br>
        @error('image')
            <p style="color: black;">{{ $message }}</p>
        @enderror
        <select name="cat_id" class="form-control">
          @foreach($cat as $cat)
          <option value="{{ $cat->id }}">{{ $cat->cat_name  }}</option>
          @endforeach()
        </select><br>
        <select name="brand_id" class="form-control">
          @foreach($brand as $brand)
          <option value="{{ $brand->id }}">{{ $brand->brand_name  }}</option>
          @endforeach()
        </select><br>
        <select name="gender_id" class="form-control">
          @foreach($gender as $gender)
          <option value="{{ $gender->id }}">{{ $gender->gender_name  }}</option>
          @endforeach()        
        </select><br>
         <label for="cat_name">Quantity:</label>
        <input type="text" class="form-control" placeholder="Enter quantity" id="category" name="quantity" value="{{ $edit_product->quantity }}">
        @error('quantity')
            <p style="color: black;">{{ $message }}</p>
        @enderror
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
      </div>
    </div>
  </div>
  <hr>
  
@include('admin.bootstrap_sections.footer')