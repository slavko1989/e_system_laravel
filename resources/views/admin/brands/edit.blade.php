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
        <h5>Table for updates brand</h5>
        <div class="form-group">
        	<form method="post" action="{{ url('brands/update/'.$brand->id) }}">
        		@csrf
    		<label for="brand_name">brand name:</label>
    		<input type="text" class="form-control" placeholder="Enter brand" id="brand" name="brand_name" value="{{ $brand->brand_name }}">
    		<button type="submit" class="btn btn-primary">Update</button>
  		</div>
      </div>
    </div>
  </div>
  <hr>
@include('admin/bootstrap_sections.footer')