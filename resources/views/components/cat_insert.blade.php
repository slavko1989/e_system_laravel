@props(['cat_insert'])
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