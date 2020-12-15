<div class="col-md-3 col-md-offset-1">
    <div class="sidebar hidden-sm hidden-xs">
        <div class="widget">
            <h6 class="upper">Search blog</h6>
            <form>
                <input type="text" placeholder="Search.." class="form-control">
            </form>
        </div>
        <!-- end of widget        -->
        <div class="widget">
            <h6 class="upper">Categories</h6>
            <ul class="nav">

                @php
                   $categories = App\Models\Category::latest() -> take(5) -> get();
                @endphp

                @foreach($categories as $cat)
                    <li><a href="#">{{ $cat -> name }}</a></li>
                @endforeach

            </ul>
        </div>
        <!-- end of widget        -->
        <div class="widget">
            <h6 class="upper">Popular Tags</h6>
            <div class="tags clearfix">
                @php
                    $all_tags = App\Models\Tag::latest() -> take(5) -> get();
                @endphp

                @foreach( $all_tags as $tag )
                    <a href="#">{{ $tag -> name }}</a>
                @endforeach
            </div>
        </div>
        <!-- end of widget      -->
        <div class="widget">
            <h6 class="upper">Latest Posts</h6>
            <ul class="nav">
                @php
                   $all_posts = App\Models\Post::latest() -> take(7) -> get();
                @endphp

                @foreach($all_posts as $post)
                    <li>
                        <a href="#">{{ $post -> title }}<i class="ti-arrow-right"></i><span>{{ date('F d,Y',strtotime($post -> created_at)) }}</span></a>
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- end of widget          -->
    </div>
    <!-- end of sidebar-->
</div>