<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
<meta name="csrf-token" content="{{ csrf_token() }}" />

{{-- <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/> --}}
<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/plugins/cookies/css/cookies.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/bxslider.css') }}" media="screen"/>
<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/font-awesome.min.css') }}" media="screen"/>
<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/selectric.css') }}" media="screen"/>
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/style.css') }}" media="screen"/> --}}
<link rel="shortcut icon" href="{{ asset('uploads/generalSettings') }}/{{ generalsettings()->favicon }}" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/vendors/css/extensions/toastr.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/jscrollpane.css') }}" media="screen" />
@yield('plugin-css')

@include('admin.css_settings.css')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/adaptive.css') }}" media="screen"/>


@yield('css')
