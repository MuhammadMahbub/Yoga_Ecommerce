<div class="headerWrap clear">
    <a href="{{ route('frontend.index') }}" class="logo">
        <img style="max-height:32px" class="logo-white" src="{{ asset('uploads/generalSettings') }}/{{ generalSettings()->logo }}" alt="">
        <img style="max-height:32px" class="logo-black" src="{{ asset('uploads/generalSettings') }}/{{ generalSettings()->logo_dark }}" alt="">
    </a>
    <nav class="mainMenu">
        <ul class="clear">
            <li class="@yield('frontend.index')"><a href="{{ route('frontend.index') }}">{{ __("home") }}</a></li>

            <li class="@yield('classes')">
                <a href="{{ route('classes') }}">{{ __("Classes") }}</a>
            </li>

            <li class="@yield('service.paris.index')">
                <a href="{{ route('service.paris.index') }}">{{ __("Service paris") }}</a>
            </li>

            <li class="@yield('gallery')">
                <a href="{{ route('gallery') }}">{{ __("Gallery") }}</a>
            </li>

            <li class="@yield('about')"><a href="{{ route('about') }}">{{ __("About") }}</a></li>

            <li class="@yield('blog')">
                <a href="{{ route('blog') }}">{{ __("Blog") }}</a>
            </li>

            <li class="@yield('contact')"><a href="{{ route('contact') }}">{{ __("Contact") }}</a></li>
            @php
                $locale = \App::getLocale();
            @endphp 
            <li class="language-dropdown">
                <a href="javascript:void(0);" class="language-dropdown__link">
                    
                    <img src="{{ asset('frontend_assets/images/flags') }}/{{ ($locale == 'fr' )? 'fr.png':'en.png' }}" alt="{{ ($locale == 'fr' )? 'fr':'en' }}" class="language-dropdown__image">
                </a>
                <ul class="language-dropdown__menu">
                    @if ($locale == 'fr')
                        <li class="language-dropdown__menu__item">
                            <a href="{{ route('locale', 'en') }}" class="language-dropdown__menu__link">
                                <img src="{{ asset('frontend_assets/images/flags/en.png') }}" alt="en" class="language-dropdown__image">
                            </a>
                        </li>
                        <li class="language-dropdown__menu__item">
                            <a href="{{ route('locale', 'fr') }}" class="language-dropdown__menu__link">
                                <img src="{{ asset('frontend_assets/images/flags/fr.png') }}" alt="fr" class="language-dropdown__image">
                            </a>
                        </li>
                    @else
                        <li class="language-dropdown__menu__item">
                            <a href="{{ route('locale', 'fr') }}" class="language-dropdown__menu__link">
                                <img src="{{ asset('frontend_assets/images/flags/fr.png') }}" alt="fr" class="language-dropdown__image">
                            </a>
                        </li>
                        <li class="language-dropdown__menu__item">
                            <a href="{{ route('locale', 'en') }}" class="language-dropdown__menu__link">
                                <img src="{{ asset('frontend_assets/images/flags/en.png') }}" alt="en" class="language-dropdown__image">
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        </ul>
    </nav>
    <span class="showMobileMenu">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </span>
</div>
