@if(session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif
@if(session('error'))
<div class="alert alert-success">
    {{ session('error') }}
</div>
@endif
@if(session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
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
        
        
        @if($userCart->isNotEmpty())
        @foreach($userCart as $cartItem)
        
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
            
            echo @$i."$";
            ?>
            </h5>
        </div>
        <hr>
        @include('includes.cart-order')