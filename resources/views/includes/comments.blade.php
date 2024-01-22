<h5 class="card-title">Comments</h5>
@if(session()->has('error'))
<p style="color: red; font-weight: bolder;">{{ session()->get('error') }}</p>
@endif
@if($details->comments->isNotEmpty())
@foreach($details->comments as $comment)
<div class="card mt-3">
    <div class="card-body">
        <p class="card-text">
            @if(Auth::check())
            @if($comment->user->profile_photo_url)
            <img src="{{ $comment->user->profile_photo_url }}" alt="Profile Photo" class="img-fluid" style="width: 60px; height: 60px;">
            {{ $comment->user->name }} {{ $comment->created_at }}
            @else
            <img src="{{ asset('img/smile.jpg') }}" alt="Smiley Icon" class="img-fluid">
            @endif
            @endif
        </p>
        <p style="color: black; font-weight: bolder;">{{ $comment->comment }}</p>
        <!-- Display reply comments -->
        @if($comment->replies->isNotEmpty())
        <div class="mt-3">
            <h6>Replies</h6>
            @foreach($comment->replies as $reply)
            <div class="card mt-3">
                <div class="card-body">
                    <p class="card-text">
                        @if(Auth::check())
                        @if($reply->user->profile_photo_url)
                        <img src="{{ $reply->user->profile_photo_url }}" alt="Profile Photo" class="img-fluid" style="width: 60px; height: 60px;">
                        {{ $reply->user->name }} {{ $reply->created_at }}
                        @else
                        <img src="{{ asset('img/smile.jpg') }}" alt="Smiley Icon" class="img-fluid">
                        @endif
                        @endif
                    </p>
                    <p style="color: black;">{{ $reply->comment }}</p>
                </div>
            </div>
            @endforeach
        </div>
        @endif
        <!-- Reply form for each comment -->
        <a href="#" class="btn btn-primary" data-toggle="collapse" data-target="#replyToComment{{ $comment->id }}">Reply to Comment</a>
        <div class="collapse mt-3" id="replyToComment{{ $comment->id }}">
            <form action="{{ url('home/details/' . $details->id ) }}" method="POST">
                @csrf
                <input type="hidden" name="parent_comment_id" value="{{ $comment->id }}">
                <div class="form-group">
                    <label for="replyToCommentText">Your reply:</label>
                    <textarea class="form-control" id="replyToCommentText" name="comment" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Reply</button>
            </form>
        </div>
        <!-- End of reply form -->
    </div>
</div>
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
            <textarea class="form-control" id="replyText" name="comment" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send your text</button>
    </form>
</div>
<!-- End of collapse section -->