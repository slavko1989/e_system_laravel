@extends('bootstrap_sections.head')
@section('title','Eshoper')
@section('links')
<link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../css/style.css" rel="stylesheet">

    @endsection

<!-- Section: Design Block -->
<section class="text-center">
  <!-- Background image -->
  <div class="p-5 bg-image" style="
        background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
        height: 300px;
        "></div>
  <!-- Background image -->

  <div class="card mx-4 mx-md-5 shadow-5-strong" style="
        margin-top: -100px;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
    <div class="card-body py-5 px-md-5">

      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-5">Sign up now</h2>
                 @if(session()->has('message'))
                    <p style="color: red;font-weight: bolder;">{{ session()->get('message') }}</p>
                  @endif
          <form action="{{ url('users/register') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row">
              <div class="col-md-6 mb-4">
                <div class="form-outline">
                  
                  <input type="text" id="form3Example1" class="form-control" name="name" value="{{ old('name') }}">
                  <label class="form-label" for="form3Example1">Name</label>
                  @error('name')
                    <p style="color: black;">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 mb-4">
                <div class="form-outline">
                  <input type="text" id="form3Example2" class="form-control" name="email" value="{{ old('email') }}">
                  <label class="form-label" for="form3Example2">Email</label>
                  @error('email')
                    <p style="color: black;">{{ $message }}</p>
                  @enderror
                </div>
              </div>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="text" id="form3Example3" class="form-control" name="password" value="{{ old('password') }}">
              <label class="form-label" for="form3Example3">Password</label>
              @error('password')
                    <p style="color: black;">{{ $message }}</p>
                  @enderror
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="text" id="form3Example4" class="form-control" name="confirm_pass" value="{{ old('confirm_pass') }}">
              <label class="form-label" for="form3Example4">Confirm password</label>
              @error('confirm_pass')
                    <p style="color: black;">{{ $message }}</p>
                  @enderror
            </div>

            <div class="form-outline mb-4">
              <input type="text" id="form3Example4" class="form-control" name="address" value="{{ old('address') }}">
              <label class="form-label" for="form3Example4">Address</label>
              @error('address')
                    <p style="color: black;">{{ $message }}</p>
                  @enderror
            </div>

            <div class="form-outline mb-4">
              <input type="text" id="form3Example4" class="form-control" name="phone" value="{{ old('phone') }}">
              <label class="form-label" for="form3Example4">Phone</label>
              @error('phone')
                    <p style="color: black;">{{ $message }}</p>
                  @enderror
            </div>

            <div class="form-outline mb-4">
              <input type="file" id="form3Example4" class="form-control" name="profile" value="{{ old('profile') }}">
              <label class="form-label" for="form3Example4">Profile</label>
              @error('profile')
                    <p style="color: black;">{{ $message }}</p>
                  @enderror
            </div>

           

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4" name="submit">
              Sign up
            </button>
         </form>
            <!-- Register buttons -->
            <div class="text-center">
              <p></p>
              <button type="button" class="btn btn-link btn-floating mx-1">
                <a href="{{ url('users/login') }}">Or sign in</a>
              </button>

              <button type="button" class="btn btn-link btn-floating mx-1">
                <a href="{{ url('/') }}">Home</a>
              </button>

             
            </div>
          
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->