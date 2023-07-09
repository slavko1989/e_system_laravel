@props(['order'])


<table class="table table-bordered text-center mb-0" style="width: 300px;">
 <thead class="bg-secondary text-dark">
    <tr>
        <th>Name</th>
        <th>Users</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Price</th>
        <th>Image</th>
        <th>Delivery</th>
        <th>Status</th>
    </tr>
        </thead>
        <tbody class="align-middle">
            @foreach($order as $orders)
            <tr>
            <td>{{ $orders->title }}</td>
            <td>{{ $orders->name }}</td>
            <td>{{ $orders->address }}</td>
            <td>{{ $orders->phone }}</td>
            <td>
                @if($orders->new_price!=null)
                {{ $orders->new_price * $orders->qty  }}
                @else 
                {{ $orders->price * $orders->qty  }}
                @endif
            </td>
            <td><img class="img-fluid w-100" src="{{ asset('product/'.$orders->image) }}" alt="" style="width: 40px;"></td>
            <td>
            @if($orders->delivery_status == 0)

                <button type="button" class="btn btn-info">
                    In progress
                </button>

                @elseif($orders->delivery_status == 1)
                <button type="button" class="btn btn-danger">
                    Cancel
                </button>

                @elseif($orders->delivery_status == 2)
                <button type="button" class="btn btn-primary">
                    Shiffted
                </button>

                @endif
                </td>
                <td>

                <form method="POST" 
                action="{{ url('orders/all_orders/'. $orders->id) }}">
                @csrf
                
                <input type="hidden" name="id">
                    <select name="delivery_status">
                    <option value="0">Proccessing</option>
                    <option value="1">Cancel</option>
                    <option value="2">Shifted</option>
                </select>
                <input type="submit" name="submit" value="Choose!?">
                </form>
                </td>          
            </tr>
            @endforeach
            </tbody>
        </table>
             