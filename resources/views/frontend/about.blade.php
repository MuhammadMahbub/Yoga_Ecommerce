@extends('frontend.layouts.app')

@section('title')
    About
@endsection

{{-- Active Menu --}}
@section('about')
    current-menu-item
@endsection

@section('body_class')
    about
@endsection

@section('header_class')
    clear
@endsection

@section('css')
<style>

    .teamItemWrap img{
        max-height: 337px;
        object-fit: cover;
    }
    .sbi_type_image img{
        max-height: 350px;
    }
</style>
@endsection

@section('content')

<div class="pageHeader" style="background-image: url({{ asset('uploads/abouts')}}/{{ $about->banner_image }});">
    <h1>{{ $about->banner_title }}</h1>
</div>
<div class="ourStory">
    <div class="wrapper">
        <div class="storyItem clear">
            <div class="storyImg">
                <img src="{{ asset('uploads/abouts')}}/{{ $about->image }}" alt="">
            </div>
            <div class="storyDesc">
                <h3>{{ $about->title }}</h3>
                <p>{!! $about->description !!}</p>
            </div>
        </div>
    </div>
</div>

<div class="ourTeam">
    <div class="blockTitle">{{ __("meet our Team") }}</div>
    <div class="teamItemWrap clear">
        @foreach ($teams as $team)
        <div data-userid="user_{{ $team->id }}" class="teamItem">
            <img src="{{ asset('uploads/teams')}}/{{ $team->image }}" alt="">
            <div class="overlay">
                <div class="teamItemNameWrap">
                    <h3>{{ $team->name }}</h3>
                </div>
                <p>{{ $team->designation }}</p>
            </div>
        </div>
        {{-- @endforeach --}}
        {{-- <div data-userid="user_2" class="teamItem">
            <img src="{{ asset('frontend_assets/images')}}/content/team2.jpg" alt="">
            <div class="overlay">
                <div class="teamItemNameWrap">
                    <h3>Morgan Romano</h3>
                </div>
                <p>Yoga Instructor</p>
            </div>
        </div>
        <div data-userid="user_3" class="teamItem">
            <img src="{{ asset('frontend_assets/images')}}/content/team3.jpg" alt="">
            <div class="overlay">
                <div class="teamItemNameWrap">
                    <h3>Morgan Romano</h3>
                </div>
                <p>Yoga Instructor</p>
            </div>
        </div>
        <div data-userid="user_4" class="teamItem">
            <img src="{{ asset('frontend_assets/images')}}/content/team4.jpg" alt="">
            <div class="overlay">
                <div class="teamItemNameWrap">
                    <h3>Morgan Romano</h3>
                </div>
                <p>Yoga Instructor</p>
            </div>
        </div>
        <div data-userid="user_5" class="teamItem">
            <img src="{{ asset('frontend_assets/images')}}/content/team5.jpg" alt="">
            <div class="overlay">
                <div class="teamItemNameWrap">
                    <h3>Morgan Romano</h3>
                </div>
                <p>Yoga Instructor</p>
            </div>
        </div>
        <div data-userid="user_6" class="teamItem">
            <img src="{{ asset('frontend_assets/images')}}/content/team6.jpg" alt="">
            <div class="overlay">
                <div class="teamItemNameWrap">
                    <h3>Morgan Romano</h3>
                </div>
                <p>Yoga Instructor</p>
            </div>
        </div>
        <div data-userid="user_7" class="teamItem">
            <img src="{{ asset('frontend_assets/images')}}/content/team7.jpg" alt="">
            <div class="overlay">
                <div class="teamItemNameWrap">
                    <h3>Morgan Romano</h3>
                </div>
                <p>Yoga Instructor</p>
            </div>
        </div> --}}

        {{-- @foreach ($teams as $team) --}}
        <div id="user_{{ $team->id }}" class="teamItemDesc">
            <div class="teamItemDescWrap">
                <img src="{{ asset('uploads/teams')}}/{{ $team->image }}" alt="" class="teamItemImg">
                <h3>{{ $team->name }}</h3>
                <p class="teamItemDescText1">{{ $team->designation }}</p>
                <p class="teamItemDescText">{{ $team->description }}</p>
                <div class="teamItemSocial">
                    <a href="{{ $team->fb_url ?? ''}}"><i class="fa fa-facebook"></i></a>
                    <a href="{{ $team->twitter_url ?? ''}}"><i class="fa fa-twitter"></i></a>
                    <a href="{{ $team->pinterest_url ?? '' }}"><i class="fa fa-pinterest"></i></a>
                </div>
            </div>
            <span class="closeTeamDesc">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="16px" height="16px" viewBox="1.5 -1 16 16" enable-background="new 1.5 -1 16 16" xml:space="preserve">
                    <path fill="#C1F4E8" d="M11.185 7l6.315 6.314L15.814 15L9.5 8.685L3.186 15L1.5 13.314L7.815 7L1.5 0.686L3.186-1L9.5 5.3 L15.814-1L17.5 0.686L11.185 7z"/>
                </svg>
            </span>
        </div>
        @endforeach
        {{-- <div id="user_2" class="teamItemDesc">
            <div class="teamItemDescWrap">
                <img src="{{ asset('frontend_assets/images')}}/content/team10.png" alt="" class="teamItemImg">
                <h3>Morgan Romano</h3>
                <p class="teamItemDescText1">Yoga Instructor</p>
                <p class="teamItemDescText">User2 Recently I was out to dinner with a big group of colleagues, chatting while we waited to be seated in a restaurant. I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing this, huh?” Recently I was out to dinner with a big group of colleagues, chatting while we waited to be seated in a restaurant. </p>
                <div class="teamItemSocial">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                </div>
            </div>
            <span class="closeTeamDesc">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="16px" height="16px" viewBox="1.5 -1 16 16" enable-background="new 1.5 -1 16 16" xml:space="preserve">
                    <path fill="#C1F4E8" d="M11.185 7l6.315 6.314L15.814 15L9.5 8.685L3.186 15L1.5 13.314L7.815 7L1.5 0.686L3.186-1L9.5 5.3 L15.814-1L17.5 0.686L11.185 7z"/>
                </svg>
            </span>
        </div>
        <div id="user_3" class="teamItemDesc">
            <div class="teamItemDescWrap">
                <img src="{{ asset('frontend_assets/images')}}/content/team10.png" alt="" class="teamItemImg">
                <h3>Morgan Romano</h3>
                <p class="teamItemDescText1">Yoga Instructor</p>
                <p class="teamItemDescText">User3 Recently I was out to dinner with a big group of colleagues, chatting while we waited to be seated in a restaurant. I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing this, huh?” Recently I was out to dinner with a big group of colleagues, chatting while we waited to be seated in a restaurant. </p>
                <div class="teamItemSocial">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                </div>
            </div>
            <span class="closeTeamDesc">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="16px" height="16px" viewBox="1.5 -1 16 16" enable-background="new 1.5 -1 16 16" xml:space="preserve">
                    <path fill="#C1F4E8" d="M11.185 7l6.315 6.314L15.814 15L9.5 8.685L3.186 15L1.5 13.314L7.815 7L1.5 0.686L3.186-1L9.5 5.3 L15.814-1L17.5 0.686L11.185 7z"/>
                </svg>
            </span>
        </div>
        <div id="user_4" class="teamItemDesc">
            <div class="teamItemDescWrap">
                <img src="{{ asset('frontend_assets/images')}}/content/team10.png" alt="" class="teamItemImg">
                <h3>Morgan Romano</h3>
                <p class="teamItemDescText1">Yoga Instructor</p>
                <p class="teamItemDescText">User4 Recently I was out to dinner with a big group of colleagues, chatting while we waited to be seated in a restaurant. I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing this, huh?” Recently I was out to dinner with a big group of colleagues, chatting while we waited to be seated in a restaurant. </p>
                <div class="teamItemSocial">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                </div>
            </div>
            <span class="closeTeamDesc">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="16px" height="16px" viewBox="1.5 -1 16 16" enable-background="new 1.5 -1 16 16" xml:space="preserve">
                    <path fill="#C1F4E8" d="M11.185 7l6.315 6.314L15.814 15L9.5 8.685L3.186 15L1.5 13.314L7.815 7L1.5 0.686L3.186-1L9.5 5.3 L15.814-1L17.5 0.686L11.185 7z"/>
                </svg>
            </span>
        </div>
        <div id="user_5" class="teamItemDesc">
            <div class="teamItemDescWrap">
                <img src="{{ asset('frontend_assets/images')}}/content/team10.png" alt="" class="teamItemImg">
                <h3>Morgan Romano</h3>
                <p class="teamItemDescText1">Yoga Instructor</p>
                <p class="teamItemDescText">User5 Recently I was out to dinner with a big group of colleagues, chatting while we waited to be seated in a restaurant. I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing this, huh?” Recently I was out to dinner with a big group of colleagues, chatting while we waited to be seated in a restaurant. </p>
                <div class="teamItemSocial">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                </div>
            </div>
            <span class="closeTeamDesc">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="16px" height="16px" viewBox="1.5 -1 16 16" enable-background="new 1.5 -1 16 16" xml:space="preserve">
                    <path fill="#C1F4E8" d="M11.185 7l6.315 6.314L15.814 15L9.5 8.685L3.186 15L1.5 13.314L7.815 7L1.5 0.686L3.186-1L9.5 5.3 L15.814-1L17.5 0.686L11.185 7z"/>
                </svg>
            </span>
        </div>
        <div id="user_6" class="teamItemDesc">
            <div class="teamItemDescWrap">
                <img src="{{ asset('frontend_assets/images')}}/content/team10.png" alt="" class="teamItemImg">
                <h3>Morgan Romano</h3>
                <p class="teamItemDescText1">Yoga Instructor</p>
                <p class="teamItemDescText">User6 Recently I was out to dinner with a big group of colleagues, chatting while we waited to be seated in a restaurant. I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing this, huh?” Recently I was out to dinner with a big group of colleagues, chatting while we waited to be seated in a restaurant. </p>
                <div class="teamItemSocial">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                </div>
            </div>
            <span class="closeTeamDesc">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="16px" height="16px" viewBox="1.5 -1 16 16" enable-background="new 1.5 -1 16 16" xml:space="preserve">
                    <path fill="#C1F4E8" d="M11.185 7l6.315 6.314L15.814 15L9.5 8.685L3.186 15L1.5 13.314L7.815 7L1.5 0.686L3.186-1L9.5 5.3 L15.814-1L17.5 0.686L11.185 7z"/>
                </svg>
            </span>
        </div>
        <div id="user_7" class="teamItemDesc">
            <div class="teamItemDescWrap">
                <img src="{{ asset('frontend_assets/images')}}/content/team10.png" alt="" class="teamItemImg">
                <h3>Morgan Romano</h3>
                <p class="teamItemDescText1">Yoga Instructor</p>
                <p class="teamItemDescText">User7 Recently I was out to dinner with a big group of colleagues, chatting while we waited to be seated in a restaurant. I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing this, huh?” Recently I was out to dinner with a big group of colleagues, chatting while we waited to be seated in a restaurant. </p>
                <div class="teamItemSocial">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                </div>
            </div>
            <span class="closeTeamDesc">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="16px" height="16px" viewBox="1.5 -1 16 16" enable-background="new 1.5 -1 16 16" xml:space="preserve">
                    <path fill="#C1F4E8" d="M11.185 7l6.315 6.314L15.814 15L9.5 8.685L3.186 15L1.5 13.314L7.815 7L1.5 0.686L3.186-1L9.5 5.3 L15.814-1L17.5 0.686L11.185 7z"/>
                </svg>
            </span>
        </div> --}}

    </div>
</div>

{{-- <div class="ourValues">
    <div class="blockTitle">our values</div>
    <div class="parallaxBox" data-type="parallax" data-speed="10" style="background-image: url({{ asset('frontend_assets/images')}}/content/ourValues1.jpg);">
        <h3>impossible is nothing</h3>
    </div>
    <div class="wrapper">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
    </div>
    <div class="parallaxBox" data-type="parallax" data-speed="10" style="background-image: url({{ asset('frontend_assets/images')}}/content/ourValues2.jpg);">
        <h3>everyday practice</h3>
    </div>
    <div class="wrapper">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
    </div>
    <div class="parallaxBox" data-type="parallax" data-speed="10" style="background-image: url({{ asset('frontend_assets/images')}}/content/ourValues3.jpg);">
        <h3>live what you love</h3>
    </div>
    <div class="wrapper">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
    </div>
</div> --}}

@endsection


@section('js')

@endsection
