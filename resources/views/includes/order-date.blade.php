<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="my-4">Order Details</h3>
            <table class="table table-bordered text-center">
                <thead class="bg-secondary text-white">
                    <tr>
                        <th>ID</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @if($products->isEmpty())
                    <tr>
                        <td colspan="6">No orders found.</td>
                    </tr>
                    @else
                    @php $totalSum = 0 @endphp
                    @foreach($products as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>
                            <img src="{{ asset('product/'.$order->product->image) }}" alt="" style="width: 50px;">
                        </td>
                        <td>{{ $order->order_qty }}</td>
                        <td>
                            @if($order->product->new_price != null)
                            {{ $order->product->new_price }}
                            @else
                            {{ $order->product->price }}
                            @endif
                        </td>
                        <td>
                            @php
                            $status = '';
                            switch ($order->status) {
                            case '0':
                            $status = 'Pending';
                            break;
                            case '1':
                            $status = 'Shipping';
                            break;
                            case '2':
                            $status = 'Canceled';
                            break;
                            default:
                            $status = '';
                            }
                            @endphp
                            <button type="button" class="btn btn-{{ $order->status == '0' ? 'info' : ($order->status == '1' ? 'success' : 'danger') }}">
                            {{ $status }}
                            </button>
                        </td>
                        <td>
                            @php
                            $itemTotal = $order->order_qty * ($order->product->new_price ?? $order->product->price);
                            $totalSum += $itemTotal;
                            echo $itemTotal;
                            @endphp
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            <div class="card border-secondary">
                <div class="card-header bg-secondary text-white">
                    <h4 class="font-weight-bold m-0">Order Summary for this date</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold">{{ $totalSum }}$</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>