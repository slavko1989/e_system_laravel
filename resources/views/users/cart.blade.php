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
                <p class="m-0"><a href="/">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
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
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach($cart as $cart)

                        <tr>
                            <td>{{ $cart->id }}</td>
                            <td class="align-middle"><img src="{{ asset('product/'.$cart->image) }}" alt="" style="width: 50px;"></td>
                            <td class="align-middle">
                                @if($cart->new_price!=null)
                                    {{ $cart->new_price  }}
                                @else 
                                    {{ $cart->price  }}
                                @endif
                                </td>
                            <td class="align-middle">
                                {{ $cart->quantity }}
                            </td>
                            <td class="align-middle">
                                @if($cart->new_price!=null)
                                    {{ $cart->new_price * $cart->quantity  }}
                                @else 
                                    {{ $cart->price * $cart->quantity  }}
                                @endif</td>
                            <td class="align-middle"><a href="{{ url('users/cart/'. $cart->id) }}" class="btn btn-sm btn-primary">X</a></td>
                        </tr>

                          <?php     
                                if($cart->new_price!=null){
                                    $sum = array($cart->quantity * $cart->new_price);
                                $total = array_sum($sum);
                                @$i += $total;
                                }else{
                                    $sum = array($cart->quantity * $cart->price);
                                $total = array_sum($sum);
                                @$i += $total;
                                }  
                             ?>   

                        @endforeach
                    </tbody>
                </table>

            </div>
            <div class="col-lg-4">
                
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">
                                
                                <?php
                               
                                echo @$i;
                                 ?>

                            </h5>
                        </div>
                        <form method="post" action="{{ url('users/order',$cart->product_id) }}">
                            @csrf
                        <input type="hidden" name="id">
                        <input type="hidden" name="user_id"> 
                        <input type="hidden" name="product_id">
                        <input type="hidden" name="cart_id">
                        <input type="hidden" name="payment_status" value="0">
                        <input type="hidden" name="delivery_status" value="0">  
                        <input type="submit" name="submit" value="Cash on delivery" class="btn btn-block btn-primary my-3 py-3">
                        </form>
                        <a href="{{ url('users/order') }}" class=
                        "btn btn-block btn-primary my-3 py-3">Paypall</a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->





    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>