@include('admin/bootstrap_sections.head')
@include('admin/bootstrap_sections.top_container')
@include('admin/bootstrap_sections.sidebar')
@include('admin/bootstrap_sections.dashboard')
<div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-third">
         @if(session()->has('message'))
        <p style="color: red;font-weight: bolder;">{{ session()->get('message') }}</p>
  @endif
      </div>
      <div class="w3-twothird">
        <h5>Table for genders</h5>
        <div class="form-group">
        	<form method="post" action="{{ url('genders/create') }}">
        		@csrf
    		<label for="gender_name">Gender name:</label>
    		<input type="text" class="form-control" value="{{ old('gender_name') }}" placeholder="Enter gender" id="gender" name="gender_name">
    		<button type="submit" class="btn btn-primary">Add</button>
  		</div>
      </div>
    </div>
  </div>
  <hr>

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

  

  
@include('admin/bootstrap_sections.footer')