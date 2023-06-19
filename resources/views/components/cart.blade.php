@props(['cart'])

       <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>ID</th>
                            <th>Products</th>
                            <th>Product id</th>
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
                            <td>{{ $cart->product_id }}</td>
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