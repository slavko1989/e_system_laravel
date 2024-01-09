 <!-- Prikaz reply komentara -->
            <div class="mt-3">
                <h6>Text of replay</h6>
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">Tekst reply komentara.</p>
                        <a href="#" class="btn btn-primary" data-toggle="collapse" data-target="#replyToReply">Click open to replay box</a>
                        <!-- Forma za odgovor na reply - početak collapse sekcije -->
                        <div class="collapse mt-3" id="replyToReply">
                            <form action="/products/{product_id}/comments/{parent_comment_id}/reply" method="POST">
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