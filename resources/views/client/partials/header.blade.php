<header>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#the-navbar-collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ route('blog.index') }}">MyBlog</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="the-navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="{{ route('blog.index') }}">Blog</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>

            <li>
                @auth
                    <a class="nav-link text-success"
                            href="{{ route('dashboard') }}">
                            Dashboard
                    </a>
                @endauth
            </li>

                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                  
                @endguest

          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav>
</header>
