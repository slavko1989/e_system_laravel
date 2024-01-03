@props(['order'])
<table class="table table-bordered text-center mb-0" style="width: 300px;">
    <thead class="bg-secondary text-dark">
        <tr>
            <th>Name</th>
            <th>Country</th>
            <th>City</th>
            <th>Street</th>
            <th>Product</th>
            <th>Delivery</th>
            <th>Payment</th>
            <th>Status</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="align-middle">
        @foreach($order as $orders)
        <tr>
            
            <td>{{ $orders->user->name }}</td>
            <td>{{ $orders->country }}</td>
            <td>{{ $orders->city }}</td>
            <td>{{ $orders->street }}</td>
            <td><img class="img-fluid w-100" src="{{ asset('product/'.$orders->product->image) }}" alt="" style="width: 40px;"></td>
            <td>{{ $orders->delivery_status }}</td>
            <td>{{ $orders->payment_status }}</td>
            <td>
                <form method="POST"
                    action="{{ url('orders/all_orders/'. $orders->id) }}">
                    @csrf
                    
                    <input type="hidden" name="id">
                    <select name="status">
                        <option value="0">Pending</option>
                        <option value="2">Cancel</option>
                        <option value="1">Shifted</option>
                    </select>
                    <input type="submit" name="submit" value="Choose!?">
                </form>
                @if($orders->status=="0")
                <p style="color: brown;">Pending</p>
                @elseif($orders->status=="1")
                <p style="color: green;">Shiffted</p>
                @elseif($orders->status=="2")
                <p style="color: red;">Canceled</p>
                @endif
            </td>
            <td>
                @if($orders->product->new_price!=null)
                {{ $orders->product->new_price * $orders->order_qty  }}$
                @else
                {{ $orders->product->price * $orders->order_qty  }}$
                @endif
            </td>
            <td>
                <a href="edit/{{ $orders->id }}"><span class="glyphicon glyphicon-pencil"></span></a> |
                <a href="create/{{ $orders->id }}"><span class="glyphicon glyphicon-remove"></span></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>