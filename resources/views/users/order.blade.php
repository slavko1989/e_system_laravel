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
 

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Order Cart</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>ID</th>
                            
                            <th>Delivery</th>
                            <th>Product name</th>
                        </tr>
                    </thead>

                    @if(Auth::check())

                    

                    <tbody class="align-middle">
                        @if($orders->isEmpty())
                        <p>No orders found.</p>
                    @else
                        @foreach($orders as $order)

                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->delivery_status }}</td>
                            <td><img src="{{ asset('product/'.$order->product->image) }}" class="img-fluid" style="width: 60px;height: 60px;"></td>
                            @endforeach
                            @endif
                    </tbody>
                    @endif
                </table>
            </div>
          
        </div>
    </div>
    <!-- Cart End -->

@include('bootstrap_sections.footer')
