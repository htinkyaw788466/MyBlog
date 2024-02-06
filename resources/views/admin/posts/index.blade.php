@extends('admin.layouts.master')

@section('title','all posts')

@section('content')

<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        ALL Posts
                        <span class="badge bg-red">
                          {{ count($posts) }}
                        </span>
                    </h2>

                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Content</th>
                                        <th>Show</th>
                                        <th>Edit</th>
                                        <th>Delete</th>


                                </tr>
                            </thead>
                            <tfoot>

                            </tfoot>

                            <tbody>
                                @foreach($posts as $key=> $post)
                                     <tr>
                                        <td>{{ $key+1}}</td>
                                        <td>{{ Str::limit($post->title,'10') }}</td>
                                        <td>{{ $post->user->name }}</td>
                                        <td>{{ Str::limit($post->body,'20') }}</td>
                                        <td><a href="{{ route('posts.show',$post->slug) }}" class="btn btn-success"><i class="fa-solid fa-eye"></i></a></td>
                                        <td>
                                            <a href="{{ route('posts.edit',$post->slug) }}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>

                                        </td>
                                        <td><a href="{{ route('posts.destroy',$post->slug) }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a></td>
                                    </tr>
                                @endforeach


                            </tbody>

                        </table>
                    {{ $posts->links() }}

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
