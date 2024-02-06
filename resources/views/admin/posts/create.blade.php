@extends('admin.layouts.master')

@section('title', 'create post')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-6 mt-5">
                <h1 class="text-center md-5">Add Post</h1>
                <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control  @error('title') is-invalid @enderror">
                        @error('title')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror">
                        @error('slug')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="excerpt">Excerpt</label>
                        <input type="text" name="excerpt" class="form-control @error('excerpt') is-invalid @enderror">
                        @error('excerpt')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>


                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea name="body" class="form-control @error('body') is-invalid @enderror" rows="3"></textarea>
                        @error('body')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="category">Category</label>
                        @foreach ($categories as $category)
                            <div class="checkbox">
                                <label>
                                    <input name="category_id" type="checkbox" value="{{ $category['id'] }}">
                                    {{ $category['name'] }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <button type="submit" class="btn btn-default">Add Post</button>


                </form>

            </div>

        </div>
    </div>

@endsection
