<div class="container">
    <h2>Listing all products</h2>
    <table class="table table-responsive" style="width: 100%;">
        <caption>List of all available products</caption>
        <thead>
            <tr>
                <!-- Ostali zaglavlji -->


                <th class="text-end">Image</th>

                <th class="text-end">Price</th>
                <th class="text-end">New price</th>
                <th class="text-end">Quantity</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($product as $prod)
            <tr>
                <!-- Ostala polja -->

                
                <td class="text-end">
                    <div style="max-width: 120px; max-height: 120px; overflow: hidden;">
                        <img src="{{ asset('product/'.$prod->image) }}" class="img-fluid" alt="{{ $prod->title }}">
                    </div>
                </td>

                <td class="text-end text-truncate">{{ $prod->price }}</td>
                <td class="text-end text-truncate">{{ $prod->new_price }}</td>
                <td class="text-end text-truncate">{{ $prod->quantity }}</td>
                <td class="text-end">
                    <a href="edit/{{ $prod->id }}" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
                    <a href="create/{{ $prod->id }}" title="Delete"><span class="glyphicon glyphicon-minus"></span></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
