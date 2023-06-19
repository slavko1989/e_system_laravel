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

@include('bootstrap_sections.nav')
@include('bootstrap_sections.featured')

    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Products By Brands</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
           
           <x-brands :brandDetails="$brandDetails"></x-brands>
        </div>
    </div>
    <!-- Products End -->
    @include('bootstrap_sections.footer')