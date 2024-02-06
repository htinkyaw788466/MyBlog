@extends('admin.layouts.master')

@section('title','all posts')

@section('content')

<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        ALL Comments
                        <span class="badge bg-red">
                          {{ count($comments) }}
                        </span>
                    </h2>

                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                        <th>Author</th>
                                        <th>Content</th>
                                        <th>Delete</th>


                                </tr>
                            </thead>
                            <tfoot>

                            </tfoot>

                            <tbody>
                                @foreach($comments as $key=> $comment)
                                     <tr>
                                        <td>{{ $key+1}}</td>
                                        <td>{{ $comment->user->name }}</td>
                                        <td>{{ Str::limit($comment->content,'20') }}</td>
                                        <td><a href="{{ route('delete.comments',$comment->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a></td>
                                    </tr>
                                @endforeach


                            </tbody>

                        </table>
                         

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
