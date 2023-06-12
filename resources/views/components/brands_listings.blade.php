 @props(['brand'])
 <div class="container">
  <h2>Listing all brands</h2>
              
  <table class="table">
    <thead>
      <tr>
        <th>Brand name</th>
        <th>Actions</th>

      </tr>
    </thead>
    <tbody>
    	@foreach($brand as $brand)
      <tr>
      	<td>{{ $brand->brand_name }}</td>
      	<td>
      		<a href="edit/{{ $brand->id }}"><span class="glyphicon glyphicon-pencil"></span></a> | 
      		<a href="create/{{ $brand->id }}"><span class="glyphicon glyphicon-remove"></span></a>
      	</td>

      </tr>
      @endforeach
    </tbody>
  </table>
</div>
