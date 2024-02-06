@extends('admin.layouts.master')

@section('title', 'update password')

@section('content')

<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-6 mt-5">
            <h1 class="text-center md-5">Update Password</h1>
            @if (Session::has('error'))
             <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif
            <form method="POST" action="{{ route('password.update') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="oldpassword">Current Password</label>
                    <input type="password" name="oldpassword" class="form-control" id="current_password"
                        placeholder="Current Password">

                    @error('oldpassword')
                        <span class="text-danger">{{ $message }} </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="New Password">

                    @error('password')
                        <span class="text-danger">{{ $message }} </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                        placeholder="Confirm Password">

                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }} </span>
                    @enderror
                </div>


                <button type="submit" class="btn btn-default">Update</button>


            </form>

        </div>

    </div>
</div>

@endsection
