@extends('frontend.layouts.app')

@section('title')
    Home
@endsection

@section('frontend.index')
    current-menu-item
@endsection

@section('body_class')
    home
@endsection

@section('css')
    <style>
        .shopItem img{
            height: 300px;
            width: 300px;
        }
        .postItemImg img{
            height: 272px;
            width: 408px;
        }
    </style>
@endsection

@section('content')

    <div class="homeBxSliderWrap">
        <div class="homeBxSlider">
            @foreach ($banners as $banner)
                <div class="slide {{ $loop->first ? 'active' : '' }}" data-slide="{{ $loop->index }}" style="background-image: url({{ asset('uploads/banners')}}/{{ $banner->banner_image }});">
                    <div class="slideDesc">
                        @if ($banner->banner_title1 != null && $banner->banner_title2 != null)
                            <h2 style="color:{{ $banner->text_color }}">
                                @if ($banner->banner_title1 != null)
                                    {{ $banner->banner_title1 }}
                                @endif
                                <br>
                                @if ($banner->banner_title1 != null)
                                    {{ $banner->banner_title2 }}
                                @endif
                            </h2>
                        @endif
                        <a class="learnMore" href="{{ $banner->button_url }}">{{ $banner->button_text }}</a>
                    </div>
                </div>
            @endforeach
            {{-- <div class="slide" data-slide="1" style="background-image: url({{ asset('frontend_assets/images/content/homeslide2.jpg')}});">
                <div class="slideDesc">
                    <h2>TAKING YOGA BEYOND <br> THE MAT training</h2>
                    <a class="learnMore" href="#">learn more</a>
                </div>
            </div> --}}
        </div>
    </div>

    <div class="homeGrid">
        <div class="gridItemWrap clear">
            @php
                $x = 1;
            @endphp
            @foreach ($classes as $class)
                <a href="{{ route('class.details', [\Str::slug($class->title), $class->id]) }}" class="gridItem
                    @if ($loop->iteration == $x)
                    gridItemWhite
                        @if ($loop->iteration % 2 == 0)
                            @php
                                $x = $x+1;
                            @endphp
                        @else
                            @php
                                $x = $x+3;
                            @endphp
                        @endif
                    @endif
                    clear">
                    <div class="gridItemImg">
                        <img src="{{ asset('uploads/class')}}/{{ $class->image }}" alt="">
                    </div>
                    <div class="gridItemDesc">
                        {{-- <h2>{{ $class->price }}€</h2> --}}
                        <h3>{{ $class->title }}</h3>
                        <p>{{ Str::limit($class->short_description, 140) }}</p>
                        <span class="viewMore">view more
                            <i>
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="9px" height="15px" viewBox="0 0 9 15" enable-background="new 0 0 9 15" xml:space="preserve">
                                    <path fill="#96e9d5" d="M10-184.5l-0.826 0.757L1.826-177L1-177.758l7.349-6.742L1-191.243L1.826-192l7.349 6.743L10-184.5z M9.174-183.743L9.174-183.743L10-184.5L9.174-183.743z M9.175-185.257L10-184.5v0L9.175-185.257z"/>
                                    <path fill="#96e9d5" d="M9 7.5L8.174 8.257L0.826 15L0 14.242L7.349 7.5L0 0.757L0.826 0l7.349 6.743L9 7.5z M8.174 8.3 L8.174 8.257L9 7.5L8.174 8.257z M8.175 6.743L9 7.5v0L8.175 6.743z"/>
                                </svg>
                            </i>
                        </span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    {{-- <div class="shopItems">
        <div class="blockTitle">yoga shop</div>
        <div class="shopItemsWrap">
            @foreach ($shops as $shop)
            <a href="{{ route('single_product', $shop->slug) }}" class="shopItem">
                <img src="{{ asset('uploads/shops')}}/{{ $shop->image }}" alt="">
                <div class="overlay">
                    <div class="shopItemTextWrap">
                        <p>{{ $shop->name }} ({{ $shop->thick }}mm)</p>
                    </div>
                    <span class="price"><span>$</span>{{ $shop->price }}</span>
                </div>
            </a>
            @endforeach
            <a href="single-product.html" class="shopItem">
                <img src="{{ asset('frontend_assets/images/content/shopitem.jpg')}}" alt="">
                <div class="overlay">-
                    <div class="shopItemTextWrap">
                        <p>Citron Sundial Yoga Mat (5mm)</p>
                    </div>
                    <span class="price"><span>$</span>28</span>
                </div>
            </a>
            <a href="single-product.html" class="shopItem">
                <img src="{{ asset('frontend_assets/images/content/shopitem1.jpg')}}" alt="">
                <div class="overlay">
                    <div class="shopItemTextWrap">
                        <p>Citron Sundial Yoga Mat (5mm)</p>
                    </div>
                    <span class="price"><span>$</span>28</span>
                </div>
            </a>
            <a href="single-product.html" class="shopItem">
                <img src="{{ asset('frontend_assets/images/content/shopitem2.jpg')}}" alt="">
                <div class="overlay">
                    <div class="shopItemTextWrap">
                        <p>Citron Sundial Yoga Mat (5mm)</p>
                    </div>
                    <span class="price"><span>$</span>28</span>
                </div>
            </a>
            <a href="single-product.html" class="shopItem">
                <img src="{{ asset('frontend_assets/images/content/shopitem0.jpg')}}" alt="">
                <div class="overlay">
                    <div class="shopItemTextWrap">
                        <p>Citron Sundial Yoga Mat (5mm)</p>
                    </div>
                    <span class="price"><span>$</span>28</span>
                </div>
            </a>
            <a href="single-product.html" class="shopItem">
                <img src="{{ asset('frontend_assets/images/content/shopitem.jpg')}}" alt="">
                <div class="overlay">
                    <div class="shopItemTextWrap">
                        <p>Citron Sundial Yoga Mat (5mm)</p>
                    </div>
                    <span class="price"><span>$</span>28</span>
                </div>
            </a>
            <a href="single-product.html" class="shopItem">
                <img src="{{ asset('frontend_assets/images/content/shopitem1.jpg')}}" alt="">
                <div class="overlay">
                    <div class="shopItemTextWrap">
                        <p>Citron Sundial Yoga Mat (5mm)</p>
                    </div>
                    <span class="price"><span>$</span>28</span>
                </div>
            </a>
            <a href="single-product.html" class="shopItem">
                <img src="{{ asset('frontend_assets/images/content/shopitem2.jpg')}}" alt="">
                <div class="overlay">
                    <div class="shopItemTextWrap">
                        <p>Citron Sundial Yoga Mat (5mm)</p>
                    </div>
                    <span class="price"><span>$</span>28</span>
                </div>
            </a>
        </div>
        <a href="{{ route('shop') }}" class="showAllItems">Shop all</a>
    </div> --}}

    <div class="blogPosts">
        <div class="blockTitle">{{ __("Blog") }}</div>
        <div class="blogPostWrap">
            @foreach ($blogs as $blog)
            <div class="postItem">
                <a href="{{ route('single_post', $blog->slug) }}" class="postItemImg">
                    <img src="{{ asset('uploads/blogs')}}/{{ $blog->image }}" alt="">
                </a>
                <h4><a href="{{ route('single_post', $blog->slug) }}">{{ $blog->title }}</a></h4>
                <p>{{ $blog->short_description }}</p>
            </div>
            @endforeach
            {{-- <div class="postItem">
                <a href="single-post.html" class="postItemImg">
                    <img src="{{ asset('frontend_assets/images/content/postimg2.jpg')}}" alt="">
                </a>
                <h4><a href="single-post.html">Key benefits of being positive</a></h4>
                <p>Duis aute irure dolor in reprehenderit in velit esse cillum dolore eu fugiat nulla pariatur.</p>
            </div>
            <div class="postItem">
                <a href="single-post.html" class="postItemImg">
                    <img src="{{ asset('frontend_assets/images/content/postimg3.jpg')}}" alt="">
                </a>
                <h4><a href="single-post.html">Happiness starts with this habit</a></h4>
                <p>Duis aute irure dolor in reprehenderit in velit esse cillum dolore eu fugiat nulla pariatur.</p>
            </div> --}}
        </div>
    </div>

    <div class="testimonial">
        <div class="wrapper">
            <div class="testimonial-conatiner">
                @foreach ($testimonials as $testimonial)
                    <div class="testimonial-card">
                        <div class="testimonial-card__quote">
                            <svg class="testimonial-card__quote__icon" width="1em" height="1em" viewBox="0 0 64 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M29.7143 23V39.1C29.7143 42.9049 26.6384 46 22.8571 46H6.97097C6.19429 46 5.4688 45.6023 5.04914 44.9443C2 40.1759 0 36.553 0 29.9C0 25.5739 0.8304 21.4031 2.46651 17.506C7.59154 5.09864 14.8192 0.02254 27.4018 0H27.4064C28.4958 0 29.4331 0.77257 29.6475 1.84621C29.8619 2.92215 29.2926 4.00016 28.2859 4.42244C22.2544 6.95175 20.4421 9.91415 18.3191 16.1H22.8571C26.6384 16.1 29.7143 19.1951 29.7143 23ZM57.1429 16.1H52.6048C54.7275 9.91415 56.5401 6.95175 62.5714 4.42267C63.5781 4.00039 64.1474 2.92238 63.933 1.84644C63.7189 0.77257 62.7813 0 61.6919 0C61.6896 0 61.6896 0 61.6873 0C49.1047 0.02254 41.877 5.09864 36.752 17.506C35.1161 21.4031 34.2857 25.5739 34.2857 29.9C34.2857 36.553 36.2857 40.1759 39.3349 44.9443C39.7545 45.6023 40.48 46 41.2567 46H57.1429C60.9241 46 64 42.9049 64 39.1V23C64 19.1951 60.9241 16.1 57.1429 16.1Z" fill="currentColor"/>
                            </svg>
                        </div>
                        <div class="testimonial-card__header">
                            <div class="testimonial-card__header__avatar">
                                <img src="{{ asset('uploads/testimonials') }}/{{ $testimonial->image }}" alt="user image" class="testimonial-card__header__avatar__image">
                            </div>
                            <div class="testimonial-card__header__details">
                                <h3 class="testimonial-card__header__title">{{ $testimonial->name }}</h3>
                                <h5 class="testimonial-card__header__sub-title">{{ $testimonial->designation }}</h5>
                            </div>
                        </div>
                        <p class="testimonial-card__text">{{ $testimonial->description }}</p>
                    </div>
                @endforeach
                {{-- <div class="testimonial-card">
                    <div class="testimonial-card__quote">
                        <svg class="testimonial-card__quote__icon" width="1em" height="1em" viewBox="0 0 64 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M29.7143 23V39.1C29.7143 42.9049 26.6384 46 22.8571 46H6.97097C6.19429 46 5.4688 45.6023 5.04914 44.9443C2 40.1759 0 36.553 0 29.9C0 25.5739 0.8304 21.4031 2.46651 17.506C7.59154 5.09864 14.8192 0.02254 27.4018 0H27.4064C28.4958 0 29.4331 0.77257 29.6475 1.84621C29.8619 2.92215 29.2926 4.00016 28.2859 4.42244C22.2544 6.95175 20.4421 9.91415 18.3191 16.1H22.8571C26.6384 16.1 29.7143 19.1951 29.7143 23ZM57.1429 16.1H52.6048C54.7275 9.91415 56.5401 6.95175 62.5714 4.42267C63.5781 4.00039 64.1474 2.92238 63.933 1.84644C63.7189 0.77257 62.7813 0 61.6919 0C61.6896 0 61.6896 0 61.6873 0C49.1047 0.02254 41.877 5.09864 36.752 17.506C35.1161 21.4031 34.2857 25.5739 34.2857 29.9C34.2857 36.553 36.2857 40.1759 39.3349 44.9443C39.7545 45.6023 40.48 46 41.2567 46H57.1429C60.9241 46 64 42.9049 64 39.1V23C64 19.1951 60.9241 16.1 57.1429 16.1Z" fill="currentColor"/>
                        </svg>
                    </div>
                    <div class="testimonial-card__header">
                        <div class="testimonial-card__header__avatar">
                            <img src="https://i.pravatar.cc/300" alt="user image" class="testimonial-card__header__avatar__image">
                        </div>
                        <div class="testimonial-card__header__details">
                            <h3 class="testimonial-card__header__title">Client Name</h3>
                            <h5 class="testimonial-card__header__sub-title">Client Position</h5>
                        </div>
                    </div>
                    <p class="testimonial-card__text">Lorem ipsum </p>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-card__quote">
                        <svg class="testimonial-card__quote__icon" width="1em" height="1em" viewBox="0 0 64 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M29.7143 23V39.1C29.7143 42.9049 26.6384 46 22.8571 46H6.97097C6.19429 46 5.4688 45.6023 5.04914 44.9443C2 40.1759 0 36.553 0 29.9C0 25.5739 0.8304 21.4031 2.46651 17.506C7.59154 5.09864 14.8192 0.02254 27.4018 0H27.4064C28.4958 0 29.4331 0.77257 29.6475 1.84621C29.8619 2.92215 29.2926 4.00016 28.2859 4.42244C22.2544 6.95175 20.4421 9.91415 18.3191 16.1H22.8571C26.6384 16.1 29.7143 19.1951 29.7143 23ZM57.1429 16.1H52.6048C54.7275 9.91415 56.5401 6.95175 62.5714 4.42267C63.5781 4.00039 64.1474 2.92238 63.933 1.84644C63.7189 0.77257 62.7813 0 61.6919 0C61.6896 0 61.6896 0 61.6873 0C49.1047 0.02254 41.877 5.09864 36.752 17.506C35.1161 21.4031 34.2857 25.5739 34.2857 29.9C34.2857 36.553 36.2857 40.1759 39.3349 44.9443C39.7545 45.6023 40.48 46 41.2567 46H57.1429C60.9241 46 64 42.9049 64 39.1V23C64 19.1951 60.9241 16.1 57.1429 16.1Z" fill="currentColor"/>
                        </svg>
                    </div>
                    <div class="testimonial-card__header">
                        <div class="testimonial-card__header__avatar">
                            <img src="https://i.pravatar.cc/300" alt="user image" class="testimonial-card__header__avatar__image">
                        </div>
                        <div class="testimonial-card__header__details">
                            <h3 class="testimonial-card__header__title">Client Name</h3>
                            <h5 class="testimonial-card__header__sub-title">Client Position</h5>
                        </div>
                    </div>
                    <p class="testimonial-card__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, eaque quis nulla veniam cumque ducimus voluptatum cum libero et, eveniet odio quam magni officiis</p>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-card__quote">
                        <svg class="testimonial-card__quote__icon" width="1em" height="1em" viewBox="0 0 64 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M29.7143 23V39.1C29.7143 42.9049 26.6384 46 22.8571 46H6.97097C6.19429 46 5.4688 45.6023 5.04914 44.9443C2 40.1759 0 36.553 0 29.9C0 25.5739 0.8304 21.4031 2.46651 17.506C7.59154 5.09864 14.8192 0.02254 27.4018 0H27.4064C28.4958 0 29.4331 0.77257 29.6475 1.84621C29.8619 2.92215 29.2926 4.00016 28.2859 4.42244C22.2544 6.95175 20.4421 9.91415 18.3191 16.1H22.8571C26.6384 16.1 29.7143 19.1951 29.7143 23ZM57.1429 16.1H52.6048C54.7275 9.91415 56.5401 6.95175 62.5714 4.42267C63.5781 4.00039 64.1474 2.92238 63.933 1.84644C63.7189 0.77257 62.7813 0 61.6919 0C61.6896 0 61.6896 0 61.6873 0C49.1047 0.02254 41.877 5.09864 36.752 17.506C35.1161 21.4031 34.2857 25.5739 34.2857 29.9C34.2857 36.553 36.2857 40.1759 39.3349 44.9443C39.7545 45.6023 40.48 46 41.2567 46H57.1429C60.9241 46 64 42.9049 64 39.1V23C64 19.1951 60.9241 16.1 57.1429 16.1Z" fill="currentColor"/>
                        </svg>
                    </div>
                    <div class="testimonial-card__header">
                        <div class="testimonial-card__header__avatar">
                            <img src="https://i.pravatar.cc/300" alt="user image" class="testimonial-card__header__avatar__image">
                        </div>
                        <div class="testimonial-card__header__details">
                            <h3 class="testimonial-card__header__title">Client Name</h3>
                            <h5 class="testimonial-card__header__sub-title">Client Position</h5>
                        </div>
                    </div>
                    <p class="testimonial-card__text">Lorem ipsum officiis</p>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-card__quote">
                        <svg class="testimonial-card__quote__icon" width="1em" height="1em" viewBox="0 0 64 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M29.7143 23V39.1C29.7143 42.9049 26.6384 46 22.8571 46H6.97097C6.19429 46 5.4688 45.6023 5.04914 44.9443C2 40.1759 0 36.553 0 29.9C0 25.5739 0.8304 21.4031 2.46651 17.506C7.59154 5.09864 14.8192 0.02254 27.4018 0H27.4064C28.4958 0 29.4331 0.77257 29.6475 1.84621C29.8619 2.92215 29.2926 4.00016 28.2859 4.42244C22.2544 6.95175 20.4421 9.91415 18.3191 16.1H22.8571C26.6384 16.1 29.7143 19.1951 29.7143 23ZM57.1429 16.1H52.6048C54.7275 9.91415 56.5401 6.95175 62.5714 4.42267C63.5781 4.00039 64.1474 2.92238 63.933 1.84644C63.7189 0.77257 62.7813 0 61.6919 0C61.6896 0 61.6896 0 61.6873 0C49.1047 0.02254 41.877 5.09864 36.752 17.506C35.1161 21.4031 34.2857 25.5739 34.2857 29.9C34.2857 36.553 36.2857 40.1759 39.3349 44.9443C39.7545 45.6023 40.48 46 41.2567 46H57.1429C60.9241 46 64 42.9049 64 39.1V23C64 19.1951 60.9241 16.1 57.1429 16.1Z" fill="currentColor"/>
                        </svg>
                    </div>
                    <div class="testimonial-card__header">
                        <div class="testimonial-card__header__avatar">
                            <img src="https://i.pravatar.cc/300" alt="user image" class="testimonial-card__header__avatar__image">
                        </div>
                        <div class="testimonial-card__header__details">
                            <h3 class="testimonial-card__header__title">Client Name</h3>
                            <h5 class="testimonial-card__header__sub-title">Client Position</h5>
                        </div>
                    </div>
                    <p class="testimonial-card__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, eaque quis nulla veniam cumque ducimus voluptatum cum libero et, eveniet odio quam magni officiis</p>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-card__quote">
                        <svg class="testimonial-card__quote__icon" width="1em" height="1em" viewBox="0 0 64 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M29.7143 23V39.1C29.7143 42.9049 26.6384 46 22.8571 46H6.97097C6.19429 46 5.4688 45.6023 5.04914 44.9443C2 40.1759 0 36.553 0 29.9C0 25.5739 0.8304 21.4031 2.46651 17.506C7.59154 5.09864 14.8192 0.02254 27.4018 0H27.4064C28.4958 0 29.4331 0.77257 29.6475 1.84621C29.8619 2.92215 29.2926 4.00016 28.2859 4.42244C22.2544 6.95175 20.4421 9.91415 18.3191 16.1H22.8571C26.6384 16.1 29.7143 19.1951 29.7143 23ZM57.1429 16.1H52.6048C54.7275 9.91415 56.5401 6.95175 62.5714 4.42267C63.5781 4.00039 64.1474 2.92238 63.933 1.84644C63.7189 0.77257 62.7813 0 61.6919 0C61.6896 0 61.6896 0 61.6873 0C49.1047 0.02254 41.877 5.09864 36.752 17.506C35.1161 21.4031 34.2857 25.5739 34.2857 29.9C34.2857 36.553 36.2857 40.1759 39.3349 44.9443C39.7545 45.6023 40.48 46 41.2567 46H57.1429C60.9241 46 64 42.9049 64 39.1V23C64 19.1951 60.9241 16.1 57.1429 16.1Z" fill="currentColor"/>
                        </svg>
                    </div>
                    <div class="testimonial-card__header">
                        <div class="testimonial-card__header__avatar">
                            <img src="https://i.pravatar.cc/300" alt="user image" class="testimonial-card__header__avatar__image">
                        </div>
                        <div class="testimonial-card__header__details">
                            <h3 class="testimonial-card__header__title">Client Name</h3>
                            <h5 class="testimonial-card__header__sub-title">Client Position</h5>
                        </div>
                    </div>
                    <p class="testimonial-card__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, eaque quis nulla veniam cumque ducimus voluptatum cum libero et, eveniet odio quam magni officiis</p>
                </div> --}}
            </div>
        </div>
    </div>

    <div class="classesBox" data-type="parallax" data-speed="10" style="background-image: url({{ asset('frontend_assets/images/content/bg-classes.jpg')}});">
        <a href="#" class="classesCategory">{{ __("classes") }}</a>
        <h3>{{ __("choose your classes and start") }} <br> {{ __("your training") }}</h3>
        <a href="{{ route('classes') }}" class="viewClasses">{{ __("view classes") }}</a>
    </div>

@endsection


@section('js')
<script>
    $(document).ready(function () {
        if($(".testimonial-conatiner").children().length > 2){
            $(".testimonial-conatiner").addClass("children-3")
        }
        else if($(".testimonial-conatiner").children().length == 2){
            $(".testimonial-conatiner").addClass("children-2")
        }
        else{
            $(".testimonial-conatiner").addClass("children-1")
        }
    });
</script>

@endsection
