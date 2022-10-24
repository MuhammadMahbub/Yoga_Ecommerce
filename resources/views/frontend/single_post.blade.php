@extends('frontend.layouts.app')

@section('title')
    Single Post
@endsection

@section('blog')
    current-menu-item
@endsection

@section('body_class','single-post')

@section('header_class','clear')

@section('css')
<style>
    .postItem img{
        width: 100%;
        height: 272px;
    }
</style>
@endsection

@section('content')

    <div class="wrapper">
        <time class="postItemTime" datetime="2015-02-01">{{ \Carbon\Carbon::parse($single_blog->created_at)->format('F d, Y') }}</time>
        <div class="singlePostWrap">
           <div>
                {!! $single_blog->description !!}
           </div>

           {{-- <h1>Yoga Classes for Discover Outdoors</h1>
           <p>Recently I was out to dinner with a <a href="#">big group of colleagues</a>, chatting while we waited to be seated in a restaurant. I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing
               this, huh?”</p>
           <h2>And <a href="#">resigned</a> in the act (h2)</h2>
           <p>Most of us were looking at our phones. And resigned in the act, too — no pretense of apology, no genuine sense that it was inappropriate or impolite. Once acknowledged, more people took phones out, and we all began concentrating on them
               in earnest rather than guiltily, enjoying the permission to indulge in the few minutes of relief we all knew we all wanted.</p>
           <h3>Despite the <a href="#">finger-wagging</a> modern (h3)</h3>
           <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
               that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
           <h4>The obligation to <a href="#">provide your full attention</a> to any one person or thing for a sustained (h4)</h4>
           <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
               that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
           <h5>The phone, and the <a href="#">constellation</a> of diversions that it (h5)</h5>
           <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
               that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
           <img class="size-full" src="images/content/post0.html" alt="">
           <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
               that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
           <img class="alignleft" src="images/content/post01.html" alt="">
           <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
               that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
           <img class="alignright" src="images/content/post01.html" alt="">
           <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
               that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
           <img class="aligncenter" src="images/content/post01.html" alt="">
           <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
               that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
           <ul>
               <li>Despite the finger-wagging modern etiquette pieces</li>
               <li>The obligation to provide your <a href="#">full attention to any</a> one person or thing for a sustained period of time is becoming more difficult to meet.</li>
               <li>The phone, and the constellation of diversions that live inside it</li>
               <li>All of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</li>
               <li>I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing this, huh?”</li>
           </ul>
           <ol>
               <li>Despite the finger-wagging modern etiquette pieces</li>
               <li>The obligation to provide your <a href="#">full attention to any</a> one person or thing for a sustained period of time is becoming more difficult to meet.</li>
               <li>The phone, and the constellation of diversions that live inside it</li>
               <li>All of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</li>
               <li>I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing this, huh?”</li>
           </ol>

           <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
               that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
           <blockquote>
               <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the <a href="#">constellation of diversions</a>                        that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
           </blockquote>
           <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
               that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p> --}}
        </div>
        <div class="singlePostTags clear">
            {{-- <span>Tags:</span>
            <a href="#">Yoga</a>,
            <a href="#">Sport</a>,
            <a href="#">Event</a>,
            <a href="#">Community</a> --}}
        </div>
        <div class="shareSinglePost">
            @if (socialurls()->fb_status == 'show')
                <a href="{{ socialurls()->fb_url }}"><i class="fa fa-facebook"></i></a>
            @endif
            @if (socialurls()->twitter_status == 'show')
                <a href="{{ socialurls()->twitter_url }}"><i class="fa fa-twitter"></i></a>
            @endif
            @if (socialurls()->instagram_status == 'show')
                <a href="{{ socialurls()->instagram_url }}"><i class="fa fa-instagram"></i></a>
            @endif
            @if (socialurls()->linkedin_status == 'show')
                <a href="{{ socialurls()->linkedin_url }}"><i class="fa fa-linkedin"></i></a>
            @endif
            @if (socialurls()->youtube_status == 'show')
                <a href="{{ socialurls()->youtube_url }}"><i class="fa fa-youtube"></i></a>
            @endif
        </div>
    </div>

<div class="relatedPosts">
    <div class="blockTitle">{{ __("Related posts") }}</div>
    <div class="blogPostWrap">
        @foreach ($related_blogs as $related)
        <div class="postItem">
            <a href="{{ route('single_post', $related->slug) }}" class="postItemImg">
                <img src="{{asset('uploads/blogs')}}/{{ $related->image }}" alt="">
            </a>
            <h4><a href="{{ route('single_post', $related->slug) }}">{{ $related->title }}</a></h4>
            <p>{!! Str::limit($related->short_description, 50) !!}</p>
        </div>
        @endforeach
        {{-- <div class="postItem">
            <a href="#" class="postItemImg">
                <img src="{{asset('frontend_assets/images')}}/content/postimg.jpg" alt="">
            </a>
            <h4><a href="#">C’era una volta: Gaia Stella</a></h4>
            <p>Duis aute irure dolor in reprehenderit in velit esse cillum dolore eu fugiat nulla pariatur.</p>
        </div>
        <div class="postItem">
            <a href="#" class="postItemImg">
                <img src="{{asset('frontend_assets/images')}}/content/postimg2.jpg" alt="">
            </a>
            <h4><a href="#">You Are What You Yoga</a></h4>
            <p>Duis aute irure dolor in reprehenderit in velit esse cillum dolore eu fugiat nulla pariatur.</p>
        </div> --}}
    </div>
</div>


@endsection


@section('js')

@endsection
