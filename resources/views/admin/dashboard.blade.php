@extends('admin.layouts.master')

@section('title','dashboard')

@section('content')

<div id="page-wrapper">

    <div class="row">
      <div class="col-lg-12">
        <h1>Blog Post </h1>

      </div>
    </div><!-- /.row -->

    <div class="row">
      <div class="col-lg-3">
        <div class="panel panel-info">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <i class="fa fa-comments fa-5x"></i>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-heading">{{ count($posts) }}</p>
                <p class="announcement-text">Posts!</p>
              </div>
            </div>
          </div>
          <a href="{{ route('posts.index') }}">
            <div class="panel-footer announcement-bottom">
              <div class="row">
                <div class="col-xs-6">
                  View Post
                </div>
                <div class="col-xs-6 text-right">
                  <i class="fa fa-arrow-circle-right"></i>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="panel panel-warning">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <i class="fa fa-check fa-5x"></i>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-heading">{{ count($categories) }}</p>
                <p class="announcement-text">Categories</p>
              </div>
            </div>
          </div>
          <a href="{{ route('category.index') }}">
            <div class="panel-footer announcement-bottom">
              <div class="row">
                <div class="col-xs-6">
                  Category
                </div>
                <div class="col-xs-6 text-right">
                  <i class="fa fa-arrow-circle-right"></i>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      {{-- <div class="col-lg-3">
        <div class="panel panel-danger">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <i class="fa fa-tasks fa-5x"></i>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-heading">18</p>
                <p class="announcement-text">Crawl Errors</p>
              </div>
            </div>
          </div>
          <a href="#">
            <div class="panel-footer announcement-bottom">
              <div class="row">
                <div class="col-xs-6">
                  Fix Issues
                </div>
                <div class="col-xs-6 text-right">
                  <i class="fa fa-arrow-circle-right"></i>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div> --}}
      <div class="col-lg-3">
        <div class="panel panel-success">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <i class="fa fa-comments fa-5x"></i>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-heading">{{ count(auth()->user()->comments) }}</p>
                <p class="announcement-text">Comments</p>
              </div>
            </div>
          </div>
          <a href="{{ route('list.comments') }}">
            <div class="panel-footer announcement-bottom">
              <div class="row">
                <div class="col-xs-6">
                 All Comments
                </div>
                <div class="col-xs-6 text-right">
                  <i class="fa fa-arrow-circle-right"></i>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div><!-- /.row -->


  </div><!-- /#page-wrapper -->

@endsection
