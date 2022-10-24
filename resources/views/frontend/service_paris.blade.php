@extends('frontend.layouts.app')

@section('title')
    Service paris
@endsection

@section('service.paris.index')
    current-menu-item
@endsection


@section('body_class','events')

@section('css')

@endsection

@section('content')


<div class="pageHeader" style="background-image: url({{ asset($banner->image)}});">
    <h1>{{ $banner->title}}</h1>
</div>
<div class="contentWrap">
    <div class="pagePanel clear">
        {{-- <div class="pageTitle">{{ __("Classes") }}</div> --}}
        {{-- <div class="categoryList">
            <span>Filter By <i></i></span>
            <ul>
                <li class="current"><a href="#">All</a></li>
                <li><a href="#">Lowest</a></li>
                <li><a href="#">Highest</a></li>
            </ul>
        </div> --}}
    </div>

    <div class="eventsWrap">
        @foreach ($classes as $class)
            <div class="eventItem clear">
                <a href="{{ route('service.paris.details', [\Str::slug($class->title), $class->id]) }}" class="eventItemImg">
                    <img src="{{ asset('uploads/services')}}/{{ $class->image }}" alt="Thumbnail">
                </a>
                <div class="eventItemDesc">
                    <time class="eventItemTime" datetime="{{ \Carbon\Carbon::parse($class->date)->format('Y-m-d') }}">{{ \Carbon\Carbon::parse($class->date)->format('F d, Y') }}, {{ $class->time }}</time>
                    {{-- <h3>{{ $class->price }}€</h3> --}}
                    <h3><a href="{{ route('service.paris.details', [\Str::slug($class->title), $class->id]) }}">{{ $class->title }}</a></h3>
                    <p>{{ \Str::words($class->short_description,80) }}</p>
                    <a href="{{ route('service.paris.details', [\Str::slug($class->title), $class->id]) }}" class="eventLearnMore">learn more
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="38px" height="38px" viewBox="0 0 38 38" enable-background="new 0 0 38 38" xml:space="preserve">
                                <path fill="#6BBFAC" d="M16.558 11.5l6.884 6.494l1.059 0.999v0.015L16.558 26.5L15.5 25.486l6.882-6.494L15.5 12.5L16.558 11.5z"/>
                            </svg>
                        </i>
                    </a>
                </div>
            </div>
        @endforeach
        {{-- <span class="showMoreEvents">show more</span> --}}
    </div>
    {{-- <div class="subscribeBox" style="background-image: url({{ asset('frontend_assets/images')}}/content/subscribe.jpg);">
        <i class="iconEmail"></i>
        <h3>subscribe to our newsletter</h3>
        <p>Subscribe and take all information about our latest events</p>
        <form class="clear">
            <input class="" type="text" name="" size="20" value="" placeholder="Your email ">
            <input class="subscribeSubmit" type="submit" value="subscribe">
        </form>
    </div> --}}
</div>


@endsection


@section('js')

@endsection
