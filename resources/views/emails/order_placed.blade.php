<!DOCTYPE html>
<html>
<head>
    <title>BullPower ItHouse</title>
</head>
<body>
   
    <h1 style="text-align: center;font-weight: bolder;font-display: fallback;font-style: oblique;">New order</h1>
    <p>Product: 
        <img class="card-img-top" src="{{ asset('product/'.$order->product->image) }}" alt=""  style="width: 200px;height: 200px;"></p>
    <p>User: {{ $order->user->name }} </p>
    
    <p style="font-family: monospace; font-weight: bolder; color: forestgreen;">
       <a href="{{ url('orders/all_orders') }}"> Please go to your admin panel and check new order</a>
    </p>


</body>
</html>