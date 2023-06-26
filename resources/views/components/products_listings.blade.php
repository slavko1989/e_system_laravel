@props(['product'])
  <div class="container">
  <h2>Listing all products</h2>
              
  <table class="table" style="width: 50%;">
    <thead>
      <tr>
        <th>Title</th>
        <th>Text</th>
        <th>Image</th>
        <th>Category</th>
        <th>Brand</th>
        <th>Gender</th>
        <th>Price</th>
        <th>New price</th>
        <th>Quantity</th>

        <th>Actions</th>

      </tr>
    </thead>
    <tbody>
      @foreach($product as $product)
      <tr>
        <td>{{ $product->title }}</td>
        <td>{{ $product->text }}</td>
        <td><img src="{{ asset('product/'.$product->image) }}" style="width: 100px;height: 100px;"></td>
       
        <td>{{ $product->cat_name }}</td>
        <td>{{ $product->brand_name }}</td>
        <td>{{ $product->gender_name }}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->new_price }}</td>
        <td>{{ $product->quantity }}</td>
        <td>
          <a href="edit/{{ $product->id }}"><span class="glyphicon glyphicon-pencil"></span></a> | 
          <a href="create/{{ $product->id }}"><span class="glyphicon glyphicon-remove"></span></a>
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
</div>