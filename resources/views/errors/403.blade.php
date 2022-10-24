<!DOCTYPE html>
<html lang="uk">

<head>
    <title>{{ config('app.name') }} | @yield('title')</title>
    @include('frontend.includes.header')
</head>
<body class="@yield('body_class')">

	<header id="header" class="@yield('header_class')">
	    @include('frontend.includes.nav')
	</header>

	<section class="container">
        <div class="page404Wrap">
            <img src="{{asset('frontend_assets/images')}}/403.png" alt="">
            <p>You are not authorize to this page</p>
            <a href="{{ route('frontend.index') }}" class="homePage">Homepage</a>
        </div>
        
	</section>

    @include('frontend.includes.footer')
	
    @include('frontend.includes.script')
</body>
 
</html>

