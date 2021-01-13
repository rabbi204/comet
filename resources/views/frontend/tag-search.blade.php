@extends('frontend.layouts.app')

@section('main-content')

    <section class="page-title parallax">
        <div data-parallax="scroll" data-image-src="frontend/images/bg/18.jpg" class="parallax-bg"></div>
        <div class="parallax-overlay">
            <div class="centrize">
                <div class="v-center">
                    <div class="container">
                        <div class="title center">
                            <h1 class="upper">This is our blog<span class="red-dot"></span></h1>
                            <h4>We have a few tips for you.</h4>
                            <hr>
                        </div>
                    </div>
                    <!-- end of container-->
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="blog-posts">

                        @foreach($all_tags -> posts as $post)

                            <article class="post-single">
                                <div class="post-info">
                                    <h2><a href="#">{{ $post -> title }}</a></h2>
                                    <h6 class="upper"><span>By</span><a href="#"> {{ $post -> author -> name  }}</a><span class="dot"></span><span>{{ date('F d,Y', strtotime($post-> created_at)) }}</span><span class="dot"></span>

                                        @foreach($post ->categories as $cat_name).
                                        <a href="{{ $cat_name -> slug }}" class="post-tag">{{ $cat_name -> name }}</a>
                                        @endforeach
                                    </h6>
                                </div>
                                <div class="post-media">
                                    <div data-options="{&quot;animation&quot;: &quot;slide&quot;, &quot;controlNav&quot;: true" class="flexslider nav-outside">
                                        <ul class="slides">
                                            <li>
                                                <img src="{{ URL::to('/') }}/media/posts/{{ $post -> featured_image }}" alt="">
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="post-body">
                                    {!!  Str::of(htmlspecialchars_decode($post -> content)) -> words(30,' >> >>') !!}
                                    <p><a href="{{ route('blog.single',$post -> slug) }}" class="btn btn-color btn-sm">Read More</a></p>
                                </div>
                            </article>
                            <!-- end of article-->

                        @endforeach

                    </div>


                {{--                    <ul class="pagination">--}}
                {{--                        {{ $posts -> links() }}--}}
                {{--                    </ul>--}}

                {{--                    <ul class="pagination">--}}
                {{--                        <li><a href="#" aria-label="Previous"><span aria-hidden="true"><i class="ti-arrow-left"></i></span></a>--}}
                {{--                        </li>--}}
                {{--                        <li class="active"><a href="#">1</a>--}}
                {{--                        </li>--}}
                {{--                        <li><a href="#">2</a>--}}
                {{--                        </li>--}}
                {{--                        <li><a href="#">3</a>--}}
                {{--                        </li>--}}
                {{--                        <li><a href="#">4</a>--}}
                {{--                        </li>--}}
                {{--                        <li><a href="#">5</a>--}}
                {{--                        </li>--}}
                {{--                        <li><a href="#" aria-label="Next"><span aria-hidden="true"><i class="ti-arrow-right"></i></span></a>--}}
                {{--                        </li>--}}
                {{--                    </ul>--}}

                <!-- end of pagination-->
                </div>

                {{--                sidebar loading--}}
                @include('frontend.layouts.partials.sidebar')

            </div>
            <!-- end of row-->
        </div>
        <!-- end of container-->
    </section>

@endsection


