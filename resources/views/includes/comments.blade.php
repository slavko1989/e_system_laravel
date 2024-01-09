<h5 class="card-title">Comments</h5>
@if(session()->has('error'))
<p style="color: red;font-weight: bolder;">{{ session()->get('error') }}</p>
@endif

@if($details->comments->isNotEmpty())
@foreach($details->comments as $comments)
<p class="card-text">

@if(Auth::check())
    @if(Auth::user()->profile_photo_url)
        <img src="{{ Auth::user()->profile_photo_url }}" alt="Profile Photo" class="img-fluid" style="width: 60px;height: 60px;"> {{ auth::user()->name }} {{ $comments->created_at }}
    @else
        <img src="{{ asset('img/smile.jpg') }}" alt="Smiley Icon" class="img-fluid">
    @endif
@endif  
</p>
<p style="color: black;font-weight: bolder;">{{ $comments->comment }}</p>
@endforeach

@else
<p>No comments for this product</p>
@endif
<a href="#" class="btn btn-primary" data-toggle="collapse" data-target="#replyComment">Open to text</a>

<div class="collapse mt-3" id="replyComment">
    <form action="{{ url('home/details/' . $details->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="replyText">Your text:</label>
            <textarea class="form-control" id="replyText" name="comment" rows="3" ></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send your text</button>
    </form>
</div>
<!-- Kraj collapse sekcije -->