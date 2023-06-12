@props(['gender'])


  <div class="container">
  <h2>Listing all genders</h2>
              
  <table class="table">
    <thead>
      <tr>
        <th>Gender name</th>
        <th>Actions</th>

      </tr>
    </thead>
    <tbody>
    	@foreach($gender as $gender)
      <tr>
      	<td>{{ $gender->gender_name }}</td>
      	<td>
      		<a href="edit/{{ $gender->id }}"><span class="glyphicon glyphicon-pencil"></span></a> | 
      		<a href="create/{{ $gender->id }}"><span class="glyphicon glyphicon-remove"></span></a>
      	</td>

      </tr>
      @endforeach
    </tbody>
  </table>
</div>