<div class="col-md-4">
    <aside class="right-sidebar">
        <div class="search-widget">
           <form action="/">
            <div class="input-group">
                <input type="text" name="search" class="form-control input-lg" placeholder="Search for...">
                <span class="input-group-btn">
                  <button  class="btn btn-lg btn-default" type="submit">
                      <i class="fa fa-search"></i>
                  </button>
                </span>
              </div><!-- /input-group -->
           </form>
        </div>

        <div class="widget">
            <div class="widget-heading">
                <h4>Categories</h4>
            </div>
            <div class="widget-body">
                <ul class="categories">

                    @foreach ($categories as $category)
                    <li>
                        <a href="{{ route('category.display',$category->slug) }}"><i class="fa fa-angle-right"></i>{{ $category->name }}</a>
                        <span class="badge pull-right">{{ $category->posts->count() }}</span>
                    </li>
                    @endforeach

                </ul>
            </div>
        </div>

        <div class="widget">
            <div class="widget-heading">
                <h4>Latest Posts</h4>
            </div>
            <div class="widget-body">
                <ul class="popular-posts">
                    @foreach ($popularPosts as $post)
                    <li>
                            <div class="post-image">
                                <a href="{{ route('blog.show',$post->slug) }}">
                                    <img src="{{$post->image ? Storage::disk('public')->url('postImg/'.$post->image)  : asset('files/img/blog.jpg')}}" />
                                </a>
                            </div>

                        <div class="post-body">
                            <h6><a href="{{ route('blog.show',$post->slug) }}">{{ $post->title }}</a></h6>
                            <div class="post-meta">
                                <span>{{ $post->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </li>
                    @endforeach

                </ul>
            </div>
        </div>

        {{-- <div class="widget">
            <div class="widget-heading">
                <h4>Tags</h4>
            </div>
            <div class="widget-body">
                <ul class="tags">
                    <li><a href="#">PHP</a></li>
                    <li><a href="#">Codeigniter</a></li>
                    <li><a href="#">Yii</a></li>
                    <li><a href="#">Laravel</a></li>
                    <li><a href="#">Ruby on Rails</a></li>
                    <li><a href="#">jQuery</a></li>
                    <li><a href="#">Vue Js</a></li>
                    <li><a href="#">React Js</a></li>
                </ul>
            </div>
        </div> --}}
    </aside>
</div>
