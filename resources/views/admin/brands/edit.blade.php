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
        <h5>Table for updates brand</h5>
        <div class="form-group">
        	<form method="post" action="{{ url('brands/update/'.$brand->id) }}">
        		@csrf
    		<label for="brand_name">brand name:</label>
    		<input type="text" class="form-control" placeholder="Enter brand" id="brand" name="brand_name" value="{{ $brand->brand_name }}">
    		<button type="submit" class="btn btn-primary">Update</button>
  		</div>
      </div>
    </div>
  </div>
  <hr>
@include('admin.bootstrap_sections.footer')