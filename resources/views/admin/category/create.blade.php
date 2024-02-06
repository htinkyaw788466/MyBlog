@extends('admin.layouts.master')

@section('title', 'create category')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-6 mt-5">
                <h1 class="text-center md-5">Add Category</h1>
                <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror">
                        @error('name')
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


                    <button type="submit" class="btn btn-default">Add Category</button>


                </form>

            </div>

        </div>
    </div>

@endsection
