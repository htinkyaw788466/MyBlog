@extends('admin.layouts.master')

@section('title', 'single posts')

@section('content')

    <div class="container-fluid">

        <a href="{{ route('posts.index') }}" class="btn btn-danger wave-effect">BACK</a>

        <br>
        <br>

        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            {{ $post->title }}
                            <small>Posted By <strong><a href="">{{ $post->user->name }}</a> </strong> on
                                {{ $post->created_at->toFormattedDateString() }} </small>

                        </h2>


                    </div>
                    <div class="body">

                        {!! $post->body !!}



                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-cyan">
                        <h2>
                            Categoryies

                        </h2>

                    </div>
                    <div class="body">


                            <span class="label bg-cyan" style="color: blue">{{ $post->category->name }}</span>



                    </div>
                </div>



                <div class="card">
                    <div class="header bg-amber">
                        <h2>
                            Featured Image

                        </h2>

                    </div>
                    <div class="body">

                        <img
                            src="{{$post->image ? Storage::disk('public')->url('postImg/'.$post->image)  : asset('files/img/blog.jpg')}}"
                            alt=""
                        />


                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection
