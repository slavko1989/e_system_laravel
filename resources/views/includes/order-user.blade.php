<table class="table table-bordered text-center mb-0">
    <thead class="bg-secondary text-dark">
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Delivery</th>
            <th>Payment</th>
            <th>Country</th>
            <th>City</th>
            <th>Street</th>
            
            <th>View by date</th>
        </tr>
    </thead>
    
    <tbody class="align-middle">
        @if($orders->isEmpty())
        <p>No orders found.</p>
        @else
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->user->name }}</td>
            <td>{{ $order->delivery_status }}</td>
            <td>{{ $order->payment_status }}</td>
            <td>{{ $order->country }}</td>
            <td>{{ $order->city }}</td>
            <td>{{ $order->street }}</td>
           
            
            <td>

               <?php 
               $encodedDate = urlencode(date('Y-m-d H:i:s', strtotime($order->created_at)));
               ?>
   
        <a href="{{ url('users/orders_by_date/'. $encodedDate) }}">{{ $order->created_at }}</a><br>





                </td>
            @endforeach
            @endif
        </tbody>
        
    </table>