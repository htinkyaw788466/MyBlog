@extends('admin.layouts.master')

@section('title', 'user profile')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 mt-5">
            <h1 class="text-center md-5">Profile</h1>
            <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input value="{{ Auth::user()->name }}" type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="slug">Slug Name</label>
                    <input value="{{ Auth::user()->slug }}" type="text" name="slug" class="form-control">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input value={{ Auth::user()->email }} type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" >
                </div>
                <div class="form-group">
                    <label for="bio">Bio</label>
                    <textarea name="content" class="form-control" rows="3">
                        {{ Auth::user()->content }}
                    </textarea>

                </div>


                <button type="submit" class="btn btn-default">Update Profile</button>


            </form>

        </div>

    </div>
</div>
@endsection
