@props(['gender_insert'])
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