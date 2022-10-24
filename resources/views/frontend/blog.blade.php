@extends('frontend.layouts.app')

@section('title')
    Blog
@endsection

{{-- Active Menu --}}
@section('blog')
    current-menu-item
@endsection

@section('body_class','blog')

@section('header_class','clear')

@section('css')
<style>
    .blogPostImg img{
        width: 100%;
        height: 272px;
    }
</style>
@endsection

@section('content')


<div class="blogPostWrap" id="blogs_load_more">

    @include('frontend.includes.blog_load_more')

    {{-- <div class="postItem">
        <a href="single-post.html" class="postItemImg">
            <img src="{{ asset('frontend_assets/images')}}/content/postimg2.jpg" alt="">
        </a>
        <time class="postItemTime" datetime="2015-02-01">February 1, 2015</time>
        <h4><a href="single-post.html">You Are What You Yoga</a></h4>
        <p>Duis aute irure dolor in reprehenderit in velit esse cillum dolore eu fugiat nulla pariatur.</p>
    </div>
    <div class="postItem">
        <a href="single-post.html" class="postItemImg">
            <img src="{{ asset('frontend_assets/images')}}/content/postimg3.jpg" alt="">
        </a>
        <time class="postItemTime" datetime="2015-02-01">February 1, 2015</time>
        <h4><a href="single-post.html">Why you shouldn’t go to yoga</a></h4>
        <p>Duis aute irure dolor in reprehenderit in velit esse cillum dolore eu fugiat nulla pariatur.</p>
    </div>
    <div class="postItem">
        <a href="single-post.html" class="postItemImg">
            <img src="{{ asset('frontend_assets/images')}}/content/postimg4.jpg" alt="">
        </a>
        <time class="postItemTime" datetime="2015-02-01">February 1, 2015</time>
        <h4><a href="single-post.html">C’era una volta: Gaia Stella</a></h4>
        <p>Duis aute irure dolor in reprehenderit in velit esse cillum dolore eu fugiat nulla pariatur.</p>
    </div>
    <div class="postItem">
        <a href="single-post.html" class="postItemImg">
            <img src="{{ asset('frontend_assets/images')}}/content/postimg5.jpg" alt="">
        </a>
        <time class="postItemTime" datetime="2015-02-01">February 1, 2015</time>
        <h4><a href="single-post.html">You Are What You Yoga</a></h4>
        <p>Duis aute irure dolor in reprehenderit in velit esse cillum dolore eu fugiat nulla pariatur.</p>
    </div>
    <div class="postItem">
        <a href="single-post.html" class="postItemImg">
            <img src="{{ asset('frontend_assets/images')}}/content/postimg6.jpg" alt="">
        </a>
        <time class="postItemTime" datetime="2015-02-01">February 1, 2015</time>
        <h4><a href="single-post.html">Why you shouldn’t go to yoga</a></h4>
        <p>Duis aute irure dolor in reprehenderit in velit esse cillum dolore eu fugiat nulla pariatur.</p>
    </div>
    <div class="postItem">
        <a href="single-post.html" class="postItemImg">
            <img src="{{ asset('frontend_assets/images')}}/content/postimg7.jpg" alt="">
        </a>
        <time class="postItemTime" datetime="2015-02-01">February 1, 2015</time>
        <h4><a href="single-post.html">C’era una volta: Gaia Stella</a></h4>
        <p>Duis aute irure dolor in reprehenderit in velit esse cillum dolore eu fugiat nulla pariatur.</p>
    </div>
    <div class="postItem">
        <a href="single-post.html" class="postItemImg">
            <img src="{{ asset('frontend_assets/images')}}/content/postimg8.jpg" alt="">
        </a>
        <time class="postItemTime" datetime="2015-02-01">February 1, 2015</time>
        <h4><a href="single-post.html">You Are What You Yoga</a></h4>
        <p>Duis aute irure dolor in reprehenderit in velit esse cillum dolore eu fugiat nulla pariatur.</p>
    </div>
    <div class="postItem">
        <a href="single-post.html" class="postItemImg">
            <img src="{{ asset('frontend_assets/images')}}/content/postimg9.jpg" alt="">
        </a>
        <time class="postItemTime" datetime="2015-02-01">February 1, 2015</time>
        <h4><a href="single-post.html">Why you shouldn’t go to yoga</a></h4>
        <p>Duis aute irure dolor in reprehenderit in velit esse cillum dolore eu fugiat nulla pariatur.</p>
    </div>
    <div class="postItem">
        <a href="single-post.html" class="postItemImg">
            <img src="{{ asset('frontend_assets/images')}}/content/postimg5.jpg" alt="">
        </a>
        <time class="postItemTime" datetime="2015-02-01">February 1, 2015</time>
        <h4><a href="single-post.html">You Are What You Yoga</a></h4>
        <p>Duis aute irure dolor in reprehenderit in velit esse cillum dolore eu fugiat nulla pariatur.</p>
    </div>
    <div class="postItem">
        <a href="single-post.html" class="postItemImg">
            <img src="{{ asset('frontend_assets/images')}}/content/postimg6.jpg" alt="">
        </a>
        <time class="postItemTime" datetime="2015-02-01">February 1, 2015</time>
        <h4><a href="single-post.html">Why you shouldn’t go to yoga</a></h4>
        <p>Duis aute irure dolor in reprehenderit in velit esse cillum dolore eu fugiat nulla pariatur.</p>
    </div>
    <div class="postItem">
        <a href="single-post.html" class="postItemImg">
            <img src="{{ asset('frontend_assets/images')}}/content/postimg7.jpg" alt="">
        </a>
        <time class="postItemTime" datetime="2015-02-01">February 1, 2015</time>
        <h4><a href="single-post.html">C’era una volta: Gaia Stella</a></h4>
        <p>Duis aute irure dolor in reprehenderit in velit esse cillum dolore eu fugiat nulla pariatur.</p>
    </div> --}}
</div>
<a href="#!" id="#" data-count="9" class="load_more_blogs load_more_button loadMoreItems">{{ __("load more") }}</a>
@endsection


@section('js')
    <script>
        $(document).ready(function () {
            $('.load_more_blogs').click(function () {

                let count = $(this).attr('data-count');
                // alert(count)
                let load_more = $(this);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('blogs.load_more') }}",
                    type: "post",
                    data:{
                        count: count,
                    },
                    success: function(data)
                    {

                        $(load_more).attr('data-count', data.count);

                        if ((1*data.blog_count) < 9) {
                            $('.load_more_button').hide();
                        }

                        $('#blogs_load_more').append(data.data);

                    }
                })

            });
        });
    </script>
@endsection
