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
        <h5>Table for brands</h5>
        <div class="form-group">
        	<form method="post" action="{{ url('brands/create') }}">
        		@csrf
    		<label for="brand_name">Brand name:</label>
    		<input type="text" class="form-control" value="{{ old('brand_name') }}" placeholder="Enter brand" id="brand" name="brand_name">
    		<button type="submit" class="btn btn-primary">Add</button>
  		</div>
      </div>
    </div>
  </div>
  <hr>

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

  

  
@include('admin/bootstrap_sections.footer')