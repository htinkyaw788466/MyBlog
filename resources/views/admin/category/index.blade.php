@extends('admin.layouts.master')

@section('title','all category')

@section('content')

<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        ALL Category
                        <span class="badge bg-red">
                          {{ count($categories) }}
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
                                        <th>Created At</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                </tr>
                            </thead>
                            <tfoot>

                            </tfoot>

                            <tbody>
                                @foreach($categories as $key=> $category)
                                     <tr>
                                        <td>{{ $key+1}}</td>
                                        <td>{{ Str::limit($category->name,'10') }}</td>
                                        <td>{{ $category->created_at->diffForHumans() }}</td>


                                        <td>
                                            <a href="{{ route('category.edit',$category->slug) }}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>

                                        </td>
                                        <td><a href="{{ route('category.destroy',$category->slug) }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a></td>
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
