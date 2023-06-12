@props(['cat'])

 <div class="container">
  <h2>Listing all categies</h2>
              
  <table class="table">
    <thead>
      <tr>
        <th>Category name</th>
        <th>Actions</th>

      </tr>
    </thead>
    <tbody>
    	@foreach($cat as $cat)
      <tr>
      	<td>{{ $cat->cat_name }}</td>
      	<td>
      		<a href="edit/{{ $cat->id }}"><span class="glyphicon glyphicon-pencil"></span></a> | 
      		<a href="create/{{ $cat->id }}"><span class="glyphicon glyphicon-remove"></span></a>
      	</td>

      </tr>
      @endforeach
    </tbody>
  </table>
</div>