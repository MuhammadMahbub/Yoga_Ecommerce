@extends('frontend.layouts.app')

@section('title')
    Events
@endsection

{{-- Active Menu --}}
@section('events')
    current-menu-item
@endsection

@section('body_class')
    home
@endsection

@section('css')

@endsection

@section('content')


<div class="pageHeader" style="background-image: url({{ asset('frontend_assets/images')}}/content/events.jpg);">
    <h1>follow our events</h1>
</div>
<div class="contentWrap">
    <div class="pagePanel clear">
        <div class="pageTitle">{{ __("Events") }}</div>
        <div class="categoryList">
            <span>{{ __("category") }} <i></i></span>
            <ul>
                <li class="current"><a data-event-category="event-all" href="#">{{ __("All") }}</a></li>
                <li><a data-event-category="event-lecture" href="#">{{ __("lecture") }}</a></li>
                <li><a data-event-category="event-training" href="#">{{ __("training") }}</a></li>
                <li><a data-event-category="event-outdoor" href="#">{{ __("outdoor") }}</a></li>
            </ul>
        </div>
    </div>
    <div class="eventsWrap">
        <div class="eventItem event-lecture clear">
            <a href="single-event.html" class="eventItemImg">
                <img src="{{ asset('frontend_assets/images')}}/content/eventsItem.jpg" alt="">
            </a>
            <div class="eventItemDesc">
                <time class="eventItemTime" datetime="2015-02-01">February 1, 2015 12:00 PM</time>
                <h3><a href="#">{{ __("Yoga Classes for Discover Outdoors") }} (Lecture)</a></h3>
                <p>{{ __("In the sanctuary of a yoga studio, a retreat or a tranquil spot in the countryside, it’s easier to feel at peace. In the sanctuary of a yoga studio, a retreat or a tranquil spot in the countryside.") }}</p>
                <a href="#" class="eventLearnMore">{{ __("learn more") }}
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="38px" height="38px" viewBox="0 0 38 38" enable-background="new 0 0 38 38" xml:space="preserve">
                            <path fill="#6BBFAC" d="M16.558 11.5l6.884 6.494l1.059 0.999v0.015L16.558 26.5L15.5 25.486l6.882-6.494L15.5 12.5L16.558 11.5z"/>
                        </svg>
                    </i>
                </a>
            </div>
        </div>
        <div class="eventItem event-lecture clear">
            <a href="single-event.html" class="eventItemImg">
                <img src="{{ asset('frontend_assets/images')}}/content/eventsItem2.jpg" alt="">
            </a>
            <div class="eventItemDesc">
                <time class="eventItemTime" datetime="2015-02-01">February 1, 2015 12:00 PM</time>
                <h3><a href="#">Yoga Classes for Discover Outdoors (Lecture)</a></h3>
                <p>In the sanctuary of a yoga studio, a retreat or a tranquil spot in the countryside, it’s easier to feel at peace. In the sanctuary of a yoga studio, a retreat or a tranquil spot in the countryside.</p>
                <a href="#" class="eventLearnMore">learn more
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="38px" height="38px" viewBox="0 0 38 38" enable-background="new 0 0 38 38" xml:space="preserve">
                            <path fill="#6BBFAC" d="M16.558 11.5l6.884 6.494l1.059 0.999v0.015L16.558 26.5L15.5 25.486l6.882-6.494L15.5 12.5L16.558 11.5z"/>
                        </svg>
                    </i>
                </a>
            </div>
        </div>
        <div class="eventItem event-training clear">
            <a href="single-event.html" class="eventItemImg">
                <img src="{{ asset('frontend_assets/images')}}/content/eventsItem3.jpg" alt="">
            </a>
            <div class="eventItemDesc">
                <time class="eventItemTime" datetime="2015-02-01">February 1, 2015 12:00 PM</time>
                <h3><a href="#">Yoga Classes for Discover Outdoors (Training)</a></h3>
                <p>In the sanctuary of a yoga studio, a retreat or a tranquil spot in the countryside, it’s easier to feel at peace. In the sanctuary of a yoga studio, a retreat or a tranquil spot in the countryside.</p>
                <a href="#" class="eventLearnMore">learn more
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="38px" height="38px" viewBox="0 0 38 38" enable-background="new 0 0 38 38" xml:space="preserve">
                            <path fill="#6BBFAC" d="M16.558 11.5l6.884 6.494l1.059 0.999v0.015L16.558 26.5L15.5 25.486l6.882-6.494L15.5 12.5L16.558 11.5z"/>
                        </svg>
                    </i>
                </a>
            </div>
        </div>
        <div class="eventItem event-outdoor clear">
            <a href="single-event.html" class="eventItemImg">
                <img src="{{ asset('frontend_assets/images')}}/content/eventsItem4.jpg" alt="">
            </a>
            <div class="eventItemDesc">
                <time class="eventItemTime" datetime="2015-02-01">February 1, 2015 12:00 PM</time>
                <h3><a href="#">Yoga Classes for Discover Outdoors (Outdoor)</a></h3>
                <p>In the sanctuary of a yoga studio, a retreat or a tranquil spot in the countryside, it’s easier to feel at peace. In the sanctuary of a yoga studio, a retreat or a tranquil spot in the countryside.</p>
                <a href="#" class="eventLearnMore">{{ __("learn more") }}
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="38px" height="38px" viewBox="0 0 38 38" enable-background="new 0 0 38 38" xml:space="preserve">
                            <path fill="#6BBFAC" d="M16.558 11.5l6.884 6.494l1.059 0.999v0.015L16.558 26.5L15.5 25.486l6.882-6.494L15.5 12.5L16.558 11.5z"/>
                        </svg>
                    </i>
                </a>
            </div>
        </div>
        <span class="showMoreEvents">{{ __("show more") }}</span>
    </div>
    <div class="subscribeBox" style="background-image: url({{ asset('frontend_assets/images')}}/content/subscribe.jpg);">
        <i class="iconEmail"></i>
        <h3>{{ __("subscribe to our newsletter") }}</h3>
        <p>{{ __("Subscribe and take all information about our latest events") }}</p>
        <form class="clear">
            <input class="" type="text" name="" size="20" value="" placeholder="Your email ">
            <input class="subscribeSubmit" type="submit" value="subscribe">
        </form>
    </div>
</div>


@endsection


@section('js')

@endsection
