@extends('bootstrap_sections.head')
@section('title','Eshoper')
@section('links')
<link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    

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
            
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Remove</th>
        </tr>
    </thead>
    <tbody class="align-middle">
        @if($cart->isNotEmpty())
            @foreach($cart as $cartItem)
               

            <tr>
                
                <td>{{ $cartItem->id }}</td>
                <td class="align-middle"><img src="{{ asset('product/'.$cartItem->product->image) }}" alt="" style="width: 50px;"></td>
                
                <td class="align-middle">
                    @if($cartItem->product->new_price!=null)
                        {{ $cartItem->product->new_price  }}
                    @else 
                        {{ $cartItem->product->price  }}
                    @endif
                </td>
                <td class="align-middle">
                    {{ $cartItem->qty }}
                </td>
                <td class="align-middle">
                    @if($cartItem->product->new_price!=null)
                        {{ $cartItem->product->new_price * $cartItem->qty  }}
                    @else 
                        {{ $cartItem->product->price * $cartItem->qty  }}
                    @endif
                </td>
                <td class="align-middle"><a href="{{ url('users/cart/'. $cartItem->id) }}" class="btn btn-sm btn-primary">X</a></td>
            </tr>

            <?php     
                if($cartItem->product->new_price!=null){
                    $sum = array($cartItem->qty * $cartItem->product->new_price);
                    $total = array_sum($sum);
                    @$i += $total;
                } else {
                    $sum = array($cartItem->qty * $cartItem->product->price);
                    $total = array_sum($sum);
                    @$i += $total;
                }  
            ?>   

            @endforeach
        @else
            <tr>
                <td colspan="7">Korpa je prazna</td>
            </tr>
        @endif
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
                        
                        <a href="{{ url('users/order') }}" class=
                        "btn btn-block btn-primary my-3 py-3">Pay on delivery</a>
                        <a href="" class=
                        "btn btn-block btn-primary my-3 py-3">Master card</a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->





    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    
</body>

</html>