@extends('admin.layouts.master')

@section('title', 'edit category')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-6 mt-5">
                <h1 class="text-center md-5">Update Category</h1>
                <form method="POST" action="{{ route('category.update',$category->slug) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input value="{{ $category->name }}" type="text" name="name" class="form-control  @error('name') is-invalid @enderror">
                        @error('name')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input value={{ $category->slug }} type="text" name="slug" class="form-control @error('slug') is-invalid @enderror">
                        @error('slug')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <a href="{{ route('category.index') }}" class="btn btn-warning">Back</a>

                    <button type="submit" class="btn btn-default">Update</button>


                </form>

            </div>

        </div>
    </div>

@endsection
