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
            <th>Status</th>
            <th>Created at</th>
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
                @if($order->status=="0")
                <button type="button" class="btn btn-info">
                Pending
                </button>
                @elseif($order->status=="1")
                <button type="button" class="btn btn-success">
                Shipping
                </button>
                @elseif($order->status=="2")
                <button type="button" class="btn btn-danger">
                Canceled
                </button>
                @endif
            </td>
            
            <td><a href="">{{ $order->created_at }} View all orders for this day</a></td>
            @endforeach
            @endif
        </tbody>
        
    </table>