@if(session()->has('success'))
<p style="color: red;font-weight: bolder;">{{ session()->get('success') }}</p>
@endif
<h5 class="font-weight-bold text-dark mb-4">Newsletter</h5>
<form action="{{ route('news') }}" method="post">
    @csrf
    <div class="form-group">
        <input type="text" class="form-control border-0 py-4" placeholder="Your Name"  name="name" value="{{ old('name') }}"/>
        @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <input type="text" class="form-control border-0 py-4" placeholder="Your Email"
        name="email" value="{{ old('email') }}"/>
        @error('email')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <button class="btn btn-primary btn-block border-0 py-3" type="submit">Subscribe Now</button>
    </div>
</form>