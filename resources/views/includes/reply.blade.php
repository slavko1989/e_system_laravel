@if($comments->replies->isNotEmpty())
<div class="mt-3">
    <h6>Text of replay</h6>
    @foreach($comments->replies as $reply)
    <div class="card">
        <div class="card-body">
            <p class="card-text">Text of reply
                @if(Auth::check())
                @if(Auth::user()->profile_photo_url)
                <img src="{{ Auth::user()->profile_photo_url }}" alt="Profile Photo" class="img-fluid" style="width: 60px; height: 60px;">
                {{ auth::user()->name }} {{ $reply->created_at }}
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
<a href="#" class="btn btn-primary" data-toggle="collapse" data-target="#replyToReply{{ $comments->id }}">Click open to replay box</a>

<div class="collapse mt-3" id="replyToReply{{ $comments->id }}">
    <form action="{{ url('home/details/' . $details->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="replyToReplyText">Replay on replay:</label>
            <textarea class="form-control" id="replyToReplyText" name="comment" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send text</button>
    </form>
</div>
<!-- Kraj collapse sekcije -->
</div>
</div>
</div>
<!-- Kraj prikaza reply komentara -->