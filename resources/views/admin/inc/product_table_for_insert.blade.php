
<div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-third">
         @if(session()->has('message'))
        <p style="color: red;font-weight: bolder;">{{ session()->get('message') }}</p>
  @endif
      </div>
      <div class="w3-twothird">
        <h5>Table for products</h5>
        <div class="form-group">
        	<form method="post" action="{{ url('products/create') }}" enctype="multipart/form-data">
        		@csrf
    		<label for="cat_name">Title:</label>
    		<input type="text" class="form-control" placeholder="Enter title" id="category" name="title" value="{{ old('title') }}">
        @error('title')
            <p style="color: black;">{{ $message }}</p>
        @enderror
        <label for="cat_name">Text:</label>
        <input type="text" class="form-control" placeholder="Enter text" id="category" name="text" value="{{ old('text') }}">
        @error('text')
            <p style="color: black;">{{ $message }}</p>
        @enderror
        <label for="cat_name">Price:</label>
        <input type="text" class="form-control" placeholder="Enter price" id="category" name="price" value="{{ old('price') }}">
        @error('title')
            <p style="color: black;">{{ $message }}</p>
        @enderror
        <label for="cat_name">New price:</label>
        <input type="text" class="form-control" placeholder="Enter new price" id="category" name="new_price" value="{{ old('new_price') }}">
        @error('new_price')
            <p style="color: black;">{{ $message }}</p>
        @enderror
        <label for="cat_name">Image:</label>
        <input type="file" class="form-control" placeholder="Enter image" id="category" name="image" value="{{ old('image') }}">
        @error('image')
            <p style="color: black;">{{ $message }}</p>
        @enderror
        <select name="cat_id">
          <option>Choose category</option>
          @foreach($cats as $cat)
          <option value="{{ $cat->id }}">{{ $cat->cat_name  }}</option>
          @endforeach()
        </select><br>
        <select name="brand_id">
          <option>Choose brand</option>
          @foreach($brands as $brand)
          <option value="{{ $brand->id }}">{{ $brand->brand_name  }}</option>
          @endforeach()
        </select><br>
        <select name="gender_id">
          <option>Choose gender</option>
          @foreach($genders as $gender)
          <option value="{{ $gender->id }}">{{ $gender->gender_name  }}</option>
          @endforeach()        
        </select><br>
    		<button type="submit" class="btn btn-primary">Add</button>
  		</div>
      </div>
    </div>
  </div>