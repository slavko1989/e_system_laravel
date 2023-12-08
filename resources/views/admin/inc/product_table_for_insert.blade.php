<div class="container">
    <h5 class="mb-4">Table for products</h5>
    <div class="row">
        <div class="col-md-6">
            @if(session()->has('message'))
            <p class="alert alert-danger">{{ session()->get('message') }}</p>
            @endif
            <form method="post" action="{{ url('products/create') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{ old('title') }}">
                    @error('title')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Text:</label>
                    <input type="text" class="form-control" id="text" placeholder="Enter text" name="text" value="{{ old('text') }}">
                    @error('text')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Price:</label>
                    <input type="text" class="form-control" id="price" placeholder="Enter price" name="price" value="{{ old('price') }}">
                    @error('price')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">New Price:</label>
                    <input type="text" class="form-control" id="new_proce" placeholder="Enter new price" name="new_price" value="{{ old('new_price') }}">
                    @error('new_price')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Quantity:</label>
                    <input type="text" class="form-control" id="quantity" placeholder="Enter quantity" name="quantity" value="{{ old('quantity') }}">
                    @error('quantity')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="image" class="form-label">Image:</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @error('image')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="cat_id" class="form-label">Category:</label>
                    <select class="form-select" name="cat_id">
                        @error('cat_id')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        
                        <option selected>Choose category</option>
                        @foreach($cats as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="cat_id" class="form-label">Brand:</label>
                    <select class="form-select" name="brand_id">
                        @error('brand_id')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <option selected>Choose Brand</option>
                        @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="cat_id" class="form-label">Gender:</label>
                    <select class="form-select" name="gender_id">
                        @error('gender_id')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <option selected>Choose gender</option>
                        @foreach($genders as $gender)
                        <option value="{{ $gender->id }}">{{ $gender->gender_name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div>