<article class="post-comments">
    <h3><i class="fa fa-comments"></i> {{ count($post->comments) }} Comments</h3>

    <div class="comment-body padding-10">
        <ul class="comments-list">

            @foreach ($post->comments as $comment)
                <li class="comment-item">
                    <div class="comment-heading clearfix">
                        <div class="comment-author-meta">
                            <h4>{{ $comment->user->name }} <small>{{ $comment->created_at->diffForHumans() }}</small></h4>
                        </div>
                    </div>
                    <div class="comment-content">
                        <p>{{ $comment->content }}</p>

                    </div>
                </li>
            @endforeach

        </ul>

    </div>

    <div class="comment-footer padding-10">
        <h3>Leave a comment</h3>
        <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            <div class="form-group required">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="website">Website</label>
                <input type="text" name="website_url" id="website" class="form-control">
            </div>
            <div class="form-group required">
                <label for="content">Comment</label>
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <textarea name="content" id="content" rows="6" class="form-control @error('content') is-invalid @enderror"></textarea>
                @error('content')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="clearfix">
                <div class="pull-left">
                    <button type="submit" class="btn btn-lg btn-success">Submit</button>
                </div>
                <div class="pull-right">
                    <p class="text-muted">
                        <span class="required">*</span>
                        <em>Indicates required fields</em>
                    </p>
                </div>
            </div>
        </form>
    </div>

</article>
