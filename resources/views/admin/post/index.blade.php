@extends('layouts.app')

@section('main-content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome !</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">All Posts</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row">
                <div class="col-md-12">

                    @include('validate')

                    <a class="btn btn-primary" data-toggle="modal" href="#post-modal">Add New Post</a>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Posts</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table  class="table table-striped data-table mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Categories</th>
                                            <th>tags</th>
                                            <th>Featured-image</th>
                                            <th>Author</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($all_data as $data)
                                        <tr>
                                            <td>{{ $loop -> index +1 }}</td>
                                            <td>{{ $data -> title }}</td>
                                            <td>
                                                @foreach( $data -> categories  as $category)
                                                    {{ $category -> name }} |
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach( $data -> tags  as $tag)
                                                    {{ $tag -> name }} |
                                                @endforeach
                                            </td>
                                            <td>
                                                @if( !empty($data->featured_image) )
                                                    <img style="width: 60px;height: 60px;" src="{{ URL::to('/') }}/media/posts/{{ $data -> featured_image }}" alt="">
                                                @endif
                                            </td>
                                            <td>{{ $data -> author -> name }}</td>
                                            <td>{{ date('F d,Y',strtotime($data -> created_at)) }}</td>
                                            <td>
                                                @if($data -> status == 'Published')
                                                    <span class="badge badge-success">Published</span>
                                                @else
                                                    <span class="badge badge-danger">Unpublished</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($data -> status == 'Published')
                                                    <a class="btn btn-sm btn-danger" href="{{ route('post.unpublished', $data -> id ) }}"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                @else
                                                    <a class="btn btn-sm btn-success" href="{{ route('post.published', $data -> id ) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                @endif

                                                <a id="post-edit" edit_id="{{ $data -> id }}" class="btn btn-warning btn-sm" data-toggle="modal" href="#">Edit</a>

                                                <form style="display: inline;" action="{{ route('post.destroy',$data -> id) }}" method="POST">
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

            {{--    Add-Post-modal--}}
            <div id="post-modal" class="modal fade">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add new Post</h4>
                            <button class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input name="title" class="form-control" type="text" placeholder="title">
                                </div>
                                <div class="form-group">
                                    <label for="">Categories:</label>

                                    @foreach($categories as $category)
                                    <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value="{{ $category ->id }}" name="category[]"> {{ $category ->name }}
                                            </label>
                                        </div>
                                    @endforeach

                                </div>

                                <div class="form-group">
                                    <label for="">All tags:</label>

                                    @foreach($all_tags as $tag)
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value="{{ $tag -> id }}" name="tag[]"> {{ $tag -> name  }}
                                            </label>
                                        </div>
                                    @endforeach

                                </div>



                                <div class="form-group">
                                    <label style="cursor: pointer; font-size: 60px;" for="fimage"><i class="fa fa-file-image-o" aria-hidden="true"></i></label>
                                    <input style="display: none;" name="fimg" id="fimage" type="file" >
                                    <img style="max-width: 100%; display: block" src="" id="post-featured-image-load" alt="">
                                </div>
                                <div class="form-group">
                                    <textarea id="post_editor" name="content"></textarea>
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-block btn-primary" type="submit" value="Add">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{--    Edit-Post-modal--}}
            <div id="post_modal_update" class="modal fade">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Update Post</h4>
                            <button class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('post.update.ajax') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <input name="title" class="form-control" type="text" placeholder="title">
                                    <input name="id" class="form-control" type="hidden" placeholder="title">
                                </div>
                                <div class="form-group">
                                    <label for="">Categories:</label>
                                    <div class="cl"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">All tags:</label>
                                    <div class="tl"></div>
                                </div>
                                <div class="form-group">
                                    <label style="cursor: pointer; font-size: 60px;" for="fimage_edit"><i class="fa fa-file-image-o" aria-hidden="true"></i></label>
                                    <input style="display: none;" name="fimg" id="fimage_edit" type="file" >
                                    <img style="max-width: 100%; display: block" src="" id="post_featured_image_edit" alt="">
                                </div>
                                <div class="form-group">
                                    <textarea id="" name="content" class="form-control" rows="10"></textarea>
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
