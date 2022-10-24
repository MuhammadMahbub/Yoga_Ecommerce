<footer id="footer" class="clear">
    <div class="footerSocial clear">
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
    <ul class="footerMenu clear">
        <li><a href="{{ route('classes') }}">{{ __("Classes") }}</a></li>
        {{-- <li><a href="{{ route('events') }}">Events</a></li>
        <li><a href="{{ route('shop') }}">Shop</a></li> --}}
        <li><a href="{{ route('about') }}">{{ __("About") }}</a></li>
        <li><a href="{{ route('blog') }}">{{ __("Blog") }}</a></li>
        <li><a href="{{ route('contact') }}">{{ __("Contact") }}</a></li>
    </ul>
    <div class="footerSubscribe">
        <form>
            <input class="email" type="text" id="subscriber_email" name="email" size="20" value="{{ old('email') }}" placeholder="Your email">
            <input class="btnSubscribe" id="subscribe_us" type="button" value="Subscribe">
        </form>
    </div>
    <div class="copyright">
        <p>{{ generalsettings()->copyright }}</p>
    </div>
</footer>
<div class="mobileMenu">
    <ul>
        <li class="@yield('frontend.index')"><a href="{{ route('frontend.index') }}">{{ __("home") }}</a></li>
        <li class="@yield('classes')">
            <a href="{{ route('classes') }}">{{ __("Classes") }}</a>
            {{-- <ul class="sub-menu">
                <li><a href="#">Outdoor</a></li>
                <li><a href="#">Yoga</a></li>
                <li><a href="#">Fitness</a></li>
                <li class="menu-item-has-children">
                    <a href="#">Training</a>
                    <ul class="sub-menu">
                        <li><a href="#">Training 1</a></li>
                        <li><a href="#">Training 2</a></li>
                    </ul>
                </li>
            </ul> --}}
        </li>
        <li class="@yield('gallery')"><a href="{{ route('gallery') }}">{{ __("Gallery") }}</a></li>
        {{-- <li>
            <a href="{{ route('events') }}">{{ __("Events") }}</a>
            <ul class="sub-menu"> 
            </ul>
        </li> --}}
        {{-- <li>
            <a href="{{ route('shop') }}">{{ __("Shop") }}</a>
            <ul class="sub-menu">
                <li><a href="{{ route('cart') }}">{{ __("Cart") }}</a></li> 
                <li><a href="{{ route('checkout') }}">{{ __("Checkout") }}</a></li> 
            </ul>
        </li> --}}
        <li class="@yield('about')"><a href="{{ route('about') }}">{{ __("About") }}</a></li>
        <li class="@yield('blog')">
            <a href="{{ route('blog') }}">{{ __("Blog") }}</a>
            {{-- <ul class="sub-menu">
                <li><a href="single-post.html">Single post</a></li>
                <li><a href="404.html">404 page</a></li>
            </ul> --}}
        </li>
        <li class="@yield('contact')"><a href="{{ route('contact') }}">{{ __("Contact") }}</a></li>
        @php
            $locale = \App::getLocale();
        @endphp  
        <li>
            <a href="javascript:void(0);"> 
                <img src="{{ asset('frontend_assets/images/flags') }}/{{ $locale == 'fr' ? 'fr.png':'en.png' }}" alt="{{ $locale == 'fr' ? 'fr':'en' }}" class="language-dropdown__image"> 
            </a>
            <ul class="sub-menu">
                @if ($locale == 'fr')
                    <li>
                        <a href="{{ route('locale', 'en') }}">
                            <img src="{{ asset('frontend_assets/images/flags/en.png') }}" alt="en" class="language-dropdown__image">
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('locale', 'fr') }}">
                            <img src="{{ asset('frontend_assets/images/flags/fr.png') }}" alt="fr" class="language-dropdown__image">
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('locale', 'fr') }}">
                            <img src="{{ asset('frontend_assets/images/flags/fr.png') }}" alt="fr" class="language-dropdown__image">
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('locale', 'en') }}">
                            <img src="{{ asset('frontend_assets/images/flags/en.png') }}" alt="en" class="language-dropdown__image">
                        </a>
                    </li>
                @endif
            </ul>
        </li>
    </ul>
</div>

{{-- Cookies Section --}}
<div class="cookies">
    <div class="cookies__body">
        <p class="cookies__body__text">{{ __("We use third-party cookies to personalize content, ads and analyze site traffic.") }}</p>
        {{-- <a href="#!" class="cookies__body__link">Learn more</a> --}}
        <div class="cookies__body__footer">
            <button type="button" class="cookies__btn cookies__btn--decline">{{ __("Decline") }}</button>
            <button type="button" class="cookies__btn cookies__btn--allow">{{ __("Allow cookies") }}</button>
        </div>
    </div>
</div>





