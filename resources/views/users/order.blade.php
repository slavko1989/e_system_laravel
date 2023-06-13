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
                            <th>Name</th>
                            <th>Products</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Price</th>
                            <th>Payment</th>
                            <th>Delivery</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach($order as $order)

                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->name }}</td>
                            <td class="align-middle"><img src="{{ asset('product/'.$order->image) }}" alt="" style="width: 50px;"></td>
                            <td class="align-middle">
                            	{{ $order->address }}
                      		</td>
                      		<td class="align-middle">
                            	{{ $order->phone }}
                      		</td>
                            <td class="align-middle">
                                 @if($order->new_price!=null)
                                    {{ $order->new_price * $order->quantity  }}
                                @else 
                                    {{ $order->price * $order->quantity  }}
                                @endif
                            </td>
                            <td class="align-middle">
                            	{{ $order->payment_status }}
                      		</td>
                        	<td class="align-middle">
                            	{{ $order->delivery_status }}
                      		</td>
                  </tr>
                            <?php     
                                if($order->new_price!=null){
                                    $sum = array($order->quantity * $order->new_price);
                                $total = array_sum($sum);
                                @$i += $total;
                                }else{
                                    $sum = array($order->quantity * $order->price);
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
                        <h4 class="font-weight-semi-bold m-0">Order Summary</h4>
                    </div>
                    
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold"><?php echo @$i; ?></h5>
                            <h5 class="font-weight-bold">
                                
                                

                            </h5>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

@include('bootstrap_sections.footer')
