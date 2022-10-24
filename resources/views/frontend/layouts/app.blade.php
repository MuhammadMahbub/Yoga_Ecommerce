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
	   @yield('content')
		<div class="ourInstagram">
			<div id="sb_instagram">
				{{-- <div class="sb_instagram_header"> --}}
				<div class="sb_instagram_header">
					<a href="#" class="sbi_header_link">Gallery</a>
				</div>
				<div id="sbi_images">
					@foreach (studio() as $studio)
						<div class="sbi_item sbi_type_image">
							<div class="sbi_photo_wrap">
								<a href="{{ $studio->link }}" class="sbi_photo">
									<img src="{{ asset('uploads/studios') }}/{{ $studio->image }}" alt="">
								</a>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>

    @include('frontend.includes.footer')

    @include('frontend.includes.script')
</body>


<!-- Mirrored from highseastudio.com/demo/asana-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Sep 2022 23:49:07 GMT -->
</html>
