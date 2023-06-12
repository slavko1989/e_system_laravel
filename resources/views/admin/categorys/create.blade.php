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
        <h5>Table for categorys</h5>
        <div class="form-group">
        	<form method="post" action="{{ url('categorys/create') }}">
        		@csrf
    		<label for="cat_name">Category name:</label>
    		<input type="text" class="form-control" placeholder="Enter category" id="category" name="cat_name" value="{{ old('cat_name') }}">
    		<button type="submit" class="btn btn-primary">Add</button>
  		</div>
      </div>
    </div>
  </div>
  <hr>

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

  

  
@include('admin/bootstrap_sections.footer')