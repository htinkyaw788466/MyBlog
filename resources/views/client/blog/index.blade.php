@extends('client.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">

            @if (!$posts->count())
             <div class="alert alert-info">
                <p>Nothing Found</p>
             </div>
            @else

            @if (isset($categoryName))
              <div class="alert alert-info">
                <p>Category: <strong>{{ $categoryName }}</strong></p>
              </div>
            @endif

            @if (isset($authorName))
            <div class="alert alert-info">
              <p>Author: <strong>{{ $authorName }} has {{ count(auth()->user()->posts) }} posts</strong></p>
            </div>
          @endif

           @foreach ($posts as $post)
           <article class="post-item">
            <div class="post-item-image">
                <a href="{{ route('blog.show',$post->slug) }}">
                    <img src="{{$post->image ? Storage::disk('public')->url('postImg/'.$post->image)  : asset('files/img/blog.jpg')}}" alt="">
                </a>
            </div>
            <div class="post-item-body">
                <div class="padding-10">
            <h2><a href="{{ route('blog.show',$post->slug) }}">{{ $post->title }}</a></h2>
                    <p>{{ $post->excerpt }}</p>
                </div>

                <div class="post-meta padding-10 clearfix">
                    <div class="pull-left">
                        <ul class="post-meta-group">
                            <li><i class="fa fa-user"></i><a href="{{ route('author',$post->user->slug) }}">{{ $post->user->name}}</a></li>
                            <li><i class="fa fa-clock-o"></i><time>{{ $post->created_at->diffForHumans() }}</time></li>
                            <li><i class="fa fa-tags"></i><a href="{{ route('category.display',$post->category->slug) }}">{{ $post->category->name }}</a></li>
                            <li><i class="fa fa-comments"></i><a href="#">{{ count($post->comments) }} Comments</a></li>
                        </ul>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('blog.show',$post->slug) }}">Continue Reading &raquo;</a>
                    </div>
                </div>
            </div>
        </article>
           @endforeach
        @endif

            <nav>
             {{ $posts->links() }}
            </nav>
        </div>
        @include('client.sider')
    </div>
</div>

@endsection
