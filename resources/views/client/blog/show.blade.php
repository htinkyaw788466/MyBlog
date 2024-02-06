@extends('client.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <article class="post-item post-detail">
                <div class="post-item-image">
                    <a href="#">
                        <img src="{{$post->image ? Storage::disk('public')->url('postImg/'.$post->image)  : asset('files/img/blog.jpg')}}" alt="">
                    </a>
                </div>

                <div class="post-item-body">
                    <div class="padding-10">
                        <h1>{{ $post->title }}</h1>

                        <div class="post-meta no-border">
                            <ul class="post-meta-group">
                                <li><i class="fa fa-user"></i><a href="{{ route('author',$post->user->slug) }}"> {{ $post->user->name }}</a></li>
                                <li><i class="fa fa-clock-o"></i><time>{{ $post->created_at->diffForHumans() }}</time></li>
                                <li><i class="fa fa-tags"></i><a href="{{ route('category.display',$post->category->slug) }}">{{ $post->category->name }}</a></li>
                                <li><i class="fa fa-comments"></i><a href="#">{{ count($post->comments) }} Comments</a></li>
                            </ul>
                        </div>

                        <p>{{ $post->body }}</p>
                    </div>
                </div>
            </article>

            <article class="post-author padding-10">
                <div class="media">
                  <div class="media-left">
                    <?php $author=$post->user; ?>
                    <a href="{{ route('author',$author->slug) }}">
                      <img alt="{{ $author->name }}" src="{{$author->image ? Storage::disk('public')->url('userImg/'.$author->image)  : asset('profile/kyaw.jpg')}}" class="media-object">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="{{ route('author',$author->slug) }}">{{ $author->name }}</a></h4>
                    <div class="post-author-count">
                      <a href="{{ route('author',$author->slug) }}">
                          <i class="fa fa-clone"></i>
                          {{ $author->posts->count() }}
                      </a>
                    </div>
                    <p>{{ $author->content }}</p>
                  </div>
                </div>
            </article>

        @include('client.blog.comment')
        </div>
        @include('client.sider')
    </div>
</div>

@endsection
