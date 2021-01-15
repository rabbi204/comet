@extends('layouts.app')

@section('main-content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome {{ Auth::user() -> name}}!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->


            <div class="row">
                <div class="col-xl-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <h4 class="card-title">Slider Add</h4>
                            @include('validate')
                        </div>
                        <div class="card-body">
                            <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                @php
                                    $all_slider_data = json_decode($slider -> sliders);
                                @endphp

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Slider Video</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="slider_url" value="{{ $all_slider_data -> svideo }}" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"></label>
                                    <div class="col-lg-9">
                                        <div class="comet-slider-container">

                                            @foreach($all_slider_data -> slider as $slide)
                                                <div id="slider-card-{{ $slide -> slide_code }}" class="card">
                                                    <div data-toggle="collapse" data-target="#slide-{{ $slide -> slide_code }}" class="card-header"><h4 style="cursor: pointer;">#slide-{{ $slide -> slide_code }}<button id="comet-slide-remove-btn" remove_id="{{ $slide -> slide_code }}" class="close">&times;</button></h4></div>
                                                    <div id="slide-{{ $slide -> slide_code }}"  class="collapse">
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label for="">Sub Tittle</label>
                                                                <input type="hidden" name="slide_code[]" value="{{ $slide -> slide_code }}" class="form-control">
                                                                <input type="text" name="subtitle[]" value="{{ $slide -> subtitle }}" class="form-control">
                                                            </div>
                                                             <div class="form-group">
                                                                 <label for="">Title</label>
                                                                <input type="text" name="title[]" value="{{ $slide -> title }}" class="form-control">
                                                             </div>
                                                            <div class="form-group">
                                                                <label for="">Button 01 Title</label>
                                                                <input type="text" name="btn1_title[]" value="{{ $slide -> btn1_title }}" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Button 01 Link</label>
                                                                <input type="text" name="btn1_link[]" value="{{ $slide -> btn1_link }}" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Button 02 Title</label>
                                                                <input type="text" name="btn2_title[]" value="{{ $slide -> btn2_title }}" class="form-control">
                                                            </div>
                                                           <div class="form-group">
                                                               <label for="">Button 02 Link</label>
                                                                <input type="text" name="btn2_link[]" value="{{ $slide -> btn2_link }}" class="form-control">
                                                           </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Add Slide</label>
                                    <div class="col-lg-9">
                                        <button id="comet-add-slide" class="btn btn-primary">Add New Slide</button>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Save</button>
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
