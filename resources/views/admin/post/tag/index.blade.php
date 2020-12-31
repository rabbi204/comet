@extends('layouts.app')

@section('main-content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome {{ Auth::user()->name }}!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Tag</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row">
                <div class="col-md-10">

                    @include('validate')

                    <a class="btn btn-primary" data-toggle="modal" href="#tag-modal">Add New Tag</a>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Tags</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tag-Name</th>
                                            <th>Slug</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($all_data as $data)
                                        <tr>
                                            <td>{{ $loop -> index +1 }}</td>
                                            <td>{{ $data -> name }}</td>
                                            <td>{{ $data -> slug }}</td>
                                            <td>
                                                @if($data -> status == 'Published')
                                                    <span class="badge badge-success">Published</span>
                                                @else
                                                    <span class="badge badge-danger">Unpublished</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($data -> status == 'Published')
                                                    <a class="btn btn-sm btn-danger" href="{{ route('tag.unpublished', $data -> id ) }}"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                @else
                                                    <a class="btn btn-sm btn-success" href="{{ route('tag.published', $data -> id ) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                @endif

                                                <a id="tag-edit" edit_id="{{ $data -> id }}" class="btn btn-warning btn-sm" data-toggle="modal" href="#tag-modal-update">Edit</a>

                                                <form style="display: inline;" action="{{ route('tag.destroy',$data -> id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                       @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--    Add-tag-modal--}}
            <div id="tag-modal" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add new Tag</h4>
                            <button class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('tag.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input name="name" class="form-control" type="text" placeholder="name">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-block btn-primary" type="submit" value="Add">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{--    Edit-tag-modal--}}
            <div id="tag-modal-update" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Update Tag</h4>
                            <button class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action=" " method="POST">
                                @csrf
                                <div class="form-group">
                                    <input name="name" class="form-control" type="text" placeholder="name">
                                    <input name="id" class="form-control" type="hidden" placeholder="id">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-block btn-primary" type="submit" value="Update">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->
@endsection
