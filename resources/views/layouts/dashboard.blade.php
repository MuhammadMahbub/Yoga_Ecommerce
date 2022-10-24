<!DOCTYPE html>
<html class="loaded {{ themesettings(Auth::id())->theme }}" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Digital Tech">

    <title>@yield('title')</title>


    <link rel="apple-touch-icon" href="{{ asset('uploads/generalSettings') }}/{{ generalsettings()->logo }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('uploads/generalSettings/'. generalsettings()->logo) }}">

    <!-- Google Fonts Link-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/css/plugins/charts/chart-apex.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/vendors/css/extensions/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/vendors/css/pickers/pickadate/pickadate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/css/plugins/forms/pickers/form-pickadate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/vendors/css/editors/trix/trix.min.css') }}">


    @stack('vendor-css')

    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/css/themes/semi-dark-layout.css') }}">
    @stack('theme-css')

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/assets/css/style.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <style>
        .trix-button-group--file-tools
        {
            display: none !important;
        }
    </style>
    @stack('css')

    <!-- END: Custom CSS-->
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static menu-{{ themesettings(Auth::id())->nav }}" data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item">
                        <a class="nav-link menu-toggle" href="javascript:void(0);">
                            <i class="ficon" data-feather="menu"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center ml-auto">
                @php
                    $locale = \App::getLocale();
                    // dd($locale);
                @endphp
                
                <li class="nav-item dropdown dropdown-language">
                    @if ($locale == 'fr')
                        <a class="nav-link dropdown-toggle" id="dropdown-flag" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="flag-icon flag-icon-fr"></i>
                            <span class="selected-language">{{ __('French') }}</span>
                        </a>
                    @else
                        <a class="nav-link dropdown-toggle" id="dropdown-flag" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="flag-icon flag-icon-us"></i>
                            <span class="selected-language">{{ __('English') }}</span>
                        </a>
                    @endif
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-flag">
                        <a class="dropdown-item" href="{{ route('locale', 'en') }}" data-language="en"><i class="flag-icon flag-icon-us"></i> {{ __('English') }}<a>
                        <a class="dropdown-item" href="{{ route('locale', 'fr') }}" data-language="fr"><i class="flag-icon flag-icon-fr"></i> {{ __('French') }}</a>
                    </div>
                </li>

                    <li class="nav-item d-none d-lg-block">
                        <a id="dark" class="nav-link nav-link-style">
                            @if (themesettings(Auth::user()->id)->theme == 'dark-layout')
                                <i class="ficon" data-feather='sun'></i>
                            @else
                                <i class="ficon" data-feather="moon"></i>
                            @endif
                        </a>
                    </li>


                <li class="nav-item dropdown dropdown-notification mr-25 d-none">
                    <a class="nav-link" href="javascript:void(0);" data-toggle="dropdown">
                        <i class="ficon" data-feather="bell"></i>
                        <span class="badge badge-pill badge-danger badge-up">5</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                        <li class="dropdown-menu-header">
                            <div class="dropdown-header d-flex">
                                <h4 class="notification-title mb-0 mr-auto">{{ __("Notifications") }}</h4>
                                <div class="badge badge-pill badge-light-primary">6 {{ __("New") }}</div>
                            </div>
                        </li>
                        <li class="scrollable-container media-list">
                            <a class="d-flex" href="javascript:void(0)">
                                <div class="media d-flex align-items-start">
                                    <div class="media-left">
                                        <div class="avatar">
                                            @if(!Auth::user()->profile_photo_path)
                                                <img src="{{ Auth::user()->profile_photo_url }}" alt="avatar" width="32" height="32">
                                            @else
                                                <img src="{{ asset(Auth::user()->profile_photo_path) }}" alt="avatar" width="32" height="32">
                                            @endif
                                            {{-- <img src="{{ asset('dashboard_assets/app-assets/images/portrait/small/avatar-s-15.jpg') }}" alt="avatar" width="32" height="32"> --}}
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <p class="media-heading"><span class="font-weight-bolder">{{ __("Congratulation") }} {{ Auth::user()->name }} 🎉</span>winner!</p><small class="notification-text"> Won the monthly best seller badge.</small>
                                    </div>
                                </div>
                            </a>
                            <div class="media d-flex align-items-center">
                                <h6 class="font-weight-bolder mr-auto mb-0">System Notifications</h6>
                                <div class="custom-control custom-control-primary custom-switch">
                                    <input class="custom-control-input" id="systemNotification" type="checkbox" checked="">
                                    <label class="custom-control-label" for="systemNotification"></label>
                                </div>
                            </div>
                            <a class="d-flex" href="javascript:void(0)">
                                <div class="media d-flex align-items-start">
                                    <div class="media-left">
                                        <div class="avatar bg-light-danger">
                                            <div class="avatar-content"><i class="avatar-icon" data-feather="x"></i></div>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <p class="media-heading">
                                            <span class="font-weight-bolder">Server down</span>&nbsp;registered
                                        </p>
                                        <small class="notification-text"> USA Server is down due to hight CPU usage</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-menu-footer"><a class="btn btn-primary btn-block" href="javascript:void(0)">Read all notifications</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <div class="user-nav d-sm-flex d-none">
                            <span class="user-name font-weight-bolder">{{ ucfirst(Auth::user()->name) }}</span>
                            <span class="user-status">Admin</span>
                        </div>
                        <span class="avatar">
                            <img class="round" src="{{ asset(Auth::user()->profile_photo_path) }}" alt="Profile Photo" height="40" width="40">
                            <span class="avatar-status-online"></span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" href="{{ route('my-profile') }}"><i class="mr-50" data-feather="user"></i> {{ __("Profile") }}</a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="mr-50" data-feather="power"></i>
                                {{ __("Logout") }}
                            </button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <ul class="main-search-list-defaultlist d-none">
        <li class="d-flex align-items-center">
            <a href="javascript:void(0);">
                <h6 class="section-label mt-75 mb-0">{{ __("Files") }}</h6>
            </a>
        </li>
        <li class="auto-suggestion">
            <a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
                <div class="d-flex">
                    <div class="mr-75"><img src="../../../app-assets/images/icons/xls.png" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing Manager</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;17kb</small>
            </a>
        </li>
    </ul>
    <ul class="main-search-list-defaultlist-other-list d-none">
        <li class="auto-suggestion justify-content-between">
            <a class="d-flex align-items-center justify-content-between w-100 py-50">
                <div class="d-flex justify-content-start">
                    <span class="mr-75" data-feather="alert-circle"></span>
                    <span>{{ __("No results found") }}.</span>
                </div>
            </a>
        </li>
    </ul>
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="{{ route('dashboard') }}">
                        <span>
                            <img src="{{ asset('uploads/generalSettings/'. generalsettings()->logo) }}" style="max-width: 30px" alt="Logo">
                        </span>
                        <h2 class="brand-text">SoClose</h2>
                    </a>
                </li>
                <li class="nav-item nav-toggle">
                    <a id="toggle" class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                        <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                        <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item">
                    <a target="_blank" class="d-flex align-items-center" href="{{ url('/') }}">
                        <i data-feather='eye'></i>
                        <span class="menu-title text-truncate" data-i18n="Dashboards">{{ __("View Website") }}</span>
                    </a>
                </li>
                <li class="nav-item @yield('dashboard')">
                    <a class="d-flex align-items-center" href="{{ route('dashboard') }}">
                        <i data-feather='database'></i>
                        <span class="menu-title text-truncate" data-i18n="Email">{{ __("Dashboard") }}</span>
                    </a>
                </li>

                @if (havePermission('order','read'))
                    <li class="nav-item @yield('orders.index')">
                        <a class="d-flex align-items-center" href="{{ route('orders.index') }}">
                            <i data-feather='clipboard'></i>
                            <span class="menu-title text-truncate">{{ __("Orders") }}</span>
                        </a>
                    </li>
                @endif

                <li class="navigation-header">
                    <span data-i18n="Apps &amp; Pages">{{ __("Pages") }}</span>
                    <i data-feather="more-horizontal"></i>
                </li>

                @if (havePermission('banner','read'))
                    <li class="nav-item @yield('banner.index')">
                        <a class="d-flex align-items-center" href="{{ route('banner.index') }}">
                            <i data-feather='flag'></i>
                            <span class="menu-title text-truncate">{{ __("Banner") }}</span>
                        </a>
                    </li>
                @endif

                @if (havePermission('about','read'))
                    <li class="nav-item @yield('about.index')">
                        <a class="d-flex align-items-center" href="{{ route('about.index') }}">
                            <i data-feather='command'></i>
                            <span class="menu-title text-truncate">{{ __("About Us") }}</span>
                        </a>
                    </li>
                @endif

                @if (havePermission('contact','read'))
                    <li class="nav-item @yield('contacts')">
                        <a class="d-flex align-items-center" href="{{ route('contacts.index') }}">
                            <i data-feather='phone-missed'></i>
                            <span class="menu-title text-truncate">{{ __("Contact Page") }}</span>
                        </a>
                    </li>
                @endif

                <li class="nav-item @yield('admin.gallery.index')">
                    <a class="d-flex align-items-center" href="{{ route('admin.gallery.index') }}">
                        <i data-feather='camera'></i>
                        <span class="menu-title text-truncate">{{ __("Gallery") }}</span>
                    </a>
                </li>

                {{-- Catalogs & Products --}}
                <li class="navigation-header">
                    <span data-i18n="Apps &amp; Pages">{{ __("Catalog") }}</span>
                    <i data-feather="more-horizontal"></i>
                </li>
                @if (havePermission('category','read'))
                    <li class="nav-item @yield('categories')">
                        <a class="d-flex align-items-center" href="{{ route('categories.index') }}">
                            <i data-feather='align-center'></i>
                            <span class="menu-title text-truncate">{{ __("Category") }}</span>
                        </a>
                    </li>
                @endif
                @if (havePermission('sub_category','read'))
                    <li class="nav-item @yield('subcategories')">
                        <a class="d-flex align-items-center" href="{{ route('subcategories.index') }}">
                            <i data-feather='archive'></i>
                            <span class="menu-title text-truncate">{{ __("Sub Category") }}</span>
                        </a>
                    </li>
                @endif
                @if (havePermission('class','read'))
                    <li class=" nav-item">
                        <a class="d-flex align-items-center" href="#">
                            <i data-feather='clock'></i>
                            <span class="menu-title text-truncate" data-i18n="Invoice">{{ __("Yoga Class") }}</span>
                        </a>
                        <ul class="menu-content">
                            <li class="@yield('yogaclassList')">
                                <a class="d-flex align-items-center" href="{{ route('yogaclass.index') }}">
                                    <i data-feather="circle"></i>
                                    <span class="menu-item text-truncate" data-i18n="List">{{ __("List") }}</span>
                                </a>
                            </li>
                            @if (havePermission('class','create'))
                                <li class="@yield('yogaclassCreate')">
                                    <a class="d-flex align-items-center" href="{{ route('yogaclass.create') }}">
                                        <i data-feather="circle"></i>
                                        <span class="menu-item text-truncate" data-i18n="Add">{{ __("Create") }}</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                    <li class=" nav-item">
                        <a class="d-flex align-items-center" href="#">
                            <i data-feather='calendar'></i>
                            <span class="menu-title text-truncate" data-i18n="Invoice">{{ __("Service Paris") }}</span>
                        </a>
                        <ul class="menu-content">
                            <li class="@yield('serviceParis.index')">
                                <a class="d-flex align-items-center" href="{{ route('serviceParis.index') }}">
                                    <i data-feather="circle"></i>
                                    <span class="menu-item text-truncate" data-i18n="List">{{ __("List") }}</span>
                                </a>
                            </li>
                            @if (havePermission('class','create'))
                                <li class="@yield('serviceParis.create')">
                                    <a class="d-flex align-items-center" href="{{ route('serviceParis.create') }}">
                                        <i data-feather="circle"></i>
                                        <span class="menu-item text-truncate" data-i18n="Add">{{ __("Create") }}</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if (havePermission('shop','read'))
                    <li class="nav-item @yield('shop.index')">
                        <a class="d-flex align-items-center" href="#">
                            <i data-feather='truck'></i>
                            <span class="menu-title text-truncate">{{ __("Yoga Shop") }}</span>
                        </a>
                        <ul class="menu-content">
                            <li class="@yield('shop.index')">
                                <a class="d-flex align-items-center" href="{{ route('shop.index') }}">
                                    <i data-feather="circle"></i>
                                    <span class="menu-item text-truncate" data-i18n="List">{{ __("Shop List") }}</span>
                                </a>
                            </li>
                            <li class="@yield('shopbanner.index')">
                                <a class="d-flex align-items-center" href="{{ route('shopbanner.index') }}">
                                    <i data-feather="circle"></i>
                                    <span class="menu-item text-truncate" data-i18n="List">{{ __("Banner") }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if (havePermission('coupons','read'))
                    <li class="nav-item @yield('coupons.index')">
                        <a class="d-flex align-items-center" href="{{ route('coupons.index') }}">
                            <i data-feather='credit-card'></i>
                            <span class="menu-title text-truncate">{{ __("Coupons") }}</span>
                        </a>
                    </li>
                @endif
                @if (havePermission('team','read'))
                    <li class="nav-item @yield('team.index')">
                        <a class="d-flex align-items-center" href="{{ route('team.index') }}">
                            <i data-feather='users'></i>
                            <span class="menu-title text-truncate">{{ __("Team") }}</span>
                        </a>
                    </li>
                @endif

                @if (havePermission('studio','read'))
                    <li class="nav-item @yield('studio.index')">
                        <a class="d-flex align-items-center" href="{{ route('studio.index') }}">
                            <i data-feather='tv'></i>
                            <span class="menu-title text-truncate">{{ __("Studio") }}</span>
                        </a>
                    </li>
                @endif

                {{-- @if (havePermission('products','read'))
                    <li class=" nav-item">
                        <a class="d-flex align-items-center" href="#">
                            <i data-feather='shopping-bag'></i>
                            <span class="menu-title text-truncate" data-i18n="Invoice">Products</span>
                        </a>
                        <ul class="menu-content">
                            <li class="@yield('productslist')">
                                <a class="d-flex align-items-center" href="{{ route('products.index') }}">
                                    <i data-feather="circle"></i>
                                    <span class="menu-item text-truncate" data-i18n="List">List</span>
                                </a>
                            </li>

                            @if (havePermission('products','create'))
                                <li class="@yield('productscreate')">
                                    <a class="d-flex align-items-center" href="{{ route('products.create') }}">
                                        <i data-feather="circle"></i>
                                        <span class="menu-item text-truncate" data-i18n="Add">Create</span>
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </li>
                @endif --}} 

                @if (havePermission('invoice','read'))
                    <li class="nav-item @yield('admin.invoice.index')">
                        <a class="d-flex align-items-center" href="{{ route('admin.invoice.index') }}">
                            <i data-feather='clipboard'></i>
                            <span class="menu-title text-truncate">{{ __("Invoice") }}</span>
                        </a>
                    </li>
                @endif


                {{-- Catalogs & Products --}}
                <li class="navigation-header">
                    <span data-i18n="Apps &amp; Pages">{{ __("Clients & Testimonials") }}</span>
                    <i data-feather="more-horizontal"></i>
                </li>

                @if (havePermission('testimonial','read'))
                    <li class=" nav-item @yield('testimonialslist')">
                        <a class="d-flex align-items-center" href="{{ route('testimonials.index') }}">
                            <i data-feather='anchor'></i>
                            <span class="menu-title text-truncate" data-i18n="Invoice">{{ __("Testimonials") }}</span>
                        </a>
                        {{-- <ul class="menu-content">
                            <li class="">
                                <a class="d-flex align-items-center" href="">
                                    <i data-feather="circle"></i>
                                    <span class="menu-item text-truncate" data-i18n="List">{{ __("List") }}</span>
                                </a>
                            </li>
                            @if (havePermission('testimonial','create'))
                                <li class="@yield('testimonialscreate')">
                                    <a class="d-flex align-items-center" href="{{ route('testimonials.create') }}">
                                        <i data-feather="circle"></i>
                                        <span class="menu-item text-truncate" data-i18n="Add">{{ __("Create") }}</span>
                                    </a>
                                </li>
                            @endif
                        </ul> --}}

                    </li>
                @endif

                @if (havePermission('client','read'))
                    <li class="nav-item @yield('client.index')">
                        <a class="d-flex align-items-center" href="{{ route('client.index') }}">
                            <i data-feather='slack'></i>
                            <span class="menu-title text-truncate">{{ __("Client") }}</span>
                        </a>
                    </li>
                @endif

                {{-- @if (havePermission('contact','read'))
                    <li class="nav-item @yield('contacts')">
                        <a class="d-flex align-items-center" href="{{ route('contacts.index') }}">
                            <i data-feather='file'></i>
                            <span class="menu-title text-truncate">Contact Page</span>
                        </a>
                    </li>
                @endif --}}

                @if (havePermission('message','read'))
                    <li class="nav-item @yield('message')">
                        <a class="d-flex align-items-center" href="{{ route('message.index') }}">
                            <i data-feather='message-square'></i>
                            <span class="menu-title text-truncate">{{ __("Contact Messages") }}</span>
                        </a>
                    </li>
                @endif

                {{-- User Lists & Contact Forms & Subscribers --}}
                <li class="navigation-header">
                    <span data-i18n="Apps &amp; Pages">{{ __('Ecommerce') }}</span>
                    <i data-feather="more-horizontal"></i>
                </li>

                @if (havePermission('user','read'))
                    <li class=" nav-item">
                        <a class="d-flex align-items-center" href="#">
                            <i data-feather='user-check'></i>
                            <span class="menu-title text-truncate" data-i18n="Invoice">{{ __("Users") }}</span>
                        </a>
                        <ul class="menu-content">
                            <li class="@yield('usersList')">
                                <a class="d-flex align-items-center" href="{{ route('users.index') }}">
                                    <i data-feather="circle"></i>
                                    <span class="menu-item text-truncate" data-i18n="List">{{ __("List") }}</span>
                                </a>
                            </li>

                            @if (havePermission('user','create'))
                                <li class="@yield('usersCreate')">
                                    <a class="d-flex align-items-center" href="{{ route('users.create') }}">
                                        <i data-feather="circle"></i>
                                        <span class="menu-item text-truncate" data-i18n="Add">{{ __("Create") }}</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif


                {{-- @if (havePermission('contact','read'))
                    <li class="nav-item @yield('contacts')">
                        <a class="d-flex align-items-center" href="{{ route('contacts.index') }}">
                            <i data-feather='user-plus'></i>
                            <span class="menu-title text-truncate">Contacts</span>
                        </a>
                    </li>
                @endif --}}

                @if (havePermission('subscriber','read'))
                    <li class="nav-item @yield('subscribers')">
                        <a class="d-flex align-items-center" href="{{ route('subscribers.index') }}">
                            <i data-feather='users'></i>
                            <span class="menu-title text-truncate">{{ __("Subscribers") }}</span>
                        </a>
                    </li>
                @endif

                @if (havePermission('appointment','read'))
                    <li class="nav-item @yield('appointment')">
                        <a class="d-flex align-items-center" href="{{ route('appointment.index') }}">
                            <i data-feather='award'></i>
                            <span class="menu-title text-truncate">{{ __("Appointment") }}</span>
                        </a>
                    </li>
                @endif


                <li class="navigation-header">
                    <span data-i18n="Apps &amp; Pages">{{ __("Blogs") }}</span>
                    <i data-feather="more-horizontal"></i>
                </li>

                @if (havePermission('blogs','read'))
                    <li class="nav-item @yield('blogList')">
                        <a class="d-flex align-items-center" href="{{ route('blogs.index') }}">
                            <i data-feather='life-buoy'></i>
                            <span class="menu-title text-truncate">{{ __("Blogs") }}</span>
                        </a>
                    </li>
                @endif

                {{-- Site Settings --}}
                <li class="navigation-header">
                    <span data-i18n="Apps &amp; Pages">{{ __("Site Settings") }}</span>
                    <i data-feather="more-horizontal"></i>
                </li>

                <li class="nav-item @yield('lang_edit')">
                    <a class="d-flex align-items-center" href="{{ route('lang_edit.index') }}">
                        <i data-feather='settings'></i>
                        <span class="menu-title text-truncate">{{ __("Lang Update") }}</span>
                    </a>
                </li>

                @if (havePermission('stripe','read'))
                    <li class="nav-item @yield('stripe.index')">
                        <a class="d-flex align-items-center" href="{{ route('stripe.index') }}">
                            <i data-feather='settings'></i>
                            <span class="menu-title text-truncate">{{ __("Stripe Settings") }}</span>
                        </a>
                    </li>
                @endif


                @if (havePermission('seo','read'))
                    <li class="nav-item @yield('seo.index')">
                        <a class="d-flex align-items-center" href="{{ route('seo.index') }}">
                            <i data-feather='settings'></i>
                            <span class="menu-title text-truncate">{{ __("Seo Settings") }}</span>
                        </a>
                    </li>
                @endif

                @if (havePermission('general_setting','read'))
                    <li class="nav-item @yield('generalSettings')">
                        <a class="d-flex align-items-center" href="{{ route('generalSettings.index') }}">
                            <i data-feather='settings'></i>
                            <span class="menu-title text-truncate">{{ __("General Settings") }}</span>
                        </a>
                    </li>

                    <li class="nav-item @yield('admin.email.setting.index')">
                        <a class="d-flex align-items-center" href="{{ route('admin.email.setting.index') }}">
                            <i data-feather='settings'></i>
                            <span class="menu-title text-truncate">{{ __("Email Settings") }}</span>
                        </a>
                    </li>
                @endif

                @if (havePermission('color_setting','read'))
                    <li class="nav-item @yield('colorSettings')">
                        <a class="d-flex align-items-center" href="{{ route('colorSettings.index') }}">
                            <i data-feather='settings'></i>
                            <span class="menu-title text-truncate">{{ __("Color Settings") }}</span>
                        </a>
                    </li>
                @endif

                @if (havePermission('social_url','read'))
                    <li class="nav-item @yield('socialurls')">
                        <a class="d-flex align-items-center" href="{{ route('socialurls.index') }}">
                            <i data-feather='settings'></i>
                            <span class="menu-title text-truncate">{{ __("Social Urls") }}</span>
                        </a>
                    </li>
                @endif


            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper @yield('content-wrapper-class')">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            @yield('breadcrumb')
                            {{-- <h2 class="content-header-title float-left mb-0">Admin Dashboard</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="#">Layouts</a>
                                    </li>
                                </ol>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block">
                    <div class="form-group breadcrumb-right">

                    </div>
                </div>
            </div>
            <div class="content-body">
                {{-- Content Start From Here --}}
                    @yield('content')
                {{-- Content End Here --}}
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0">
            <span class="float-md-left d-block d-md-inline-block mt-25">{{ __("COPYRIGHT") }} &copy; {{ now()->year }}
                <a class="ml-25" href="#" target="_blank">SoClose</a>
                <span class="d-none d-sm-inline-block">, {{ __("All rights Reserved") }}</span>
            </span>
        </p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button">
        <i data-feather="arrow-up"></i>
    </button>
    <!-- END: Footer-->

    @stack('all_modals')



    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('dashboard_assets/app-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js') }}"></script>
    <script src="{{ asset('dashboard_assets/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    {{-- <script src="{{ asset('dashboard_assets/app-assets/js/scripts/forms/form-validation.js') }}"></script> --}}
    <script src="{{ asset('dashboard_assets/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/app-assets/js/scripts/forms/form-select2.js') }}"></script>
    <script src="{{ asset('dashboard_assets/app-assets/vendors/js/pickers/pickadate/picker.js') }}"></script>
    <script src="{{ asset('dashboard_assets/app-assets/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('dashboard_assets/app-assets/vendors/js/pickers/pickadate/picker.time.js') }}"></script>
    <script src="{{ asset('dashboard_assets/app-assets/vendors/js/pickers/pickadate/legacy.js') }}"></script>
    <script src="{{ asset('dashboard_assets/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/app-assets/js/scripts/forms/pickers/form-pickers.js') }}"></script>
    <script src="{{ asset('dashboard_assets/app-assets/vendors/js/editors/trix/trix.min.js') }}"></script>
    <!-- END Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('dashboard_assets/app-assets/js/core/app.js') }}"></script>
    <script src="{{ asset('dashboard_assets/app-assets/js/core/app-menu.js') }}"></script>

    @yield('js')
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    @stack('page-js')
    <!-- END: Page JS-->

    <!-- Global AjaxSetup Script-->
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        })
    </script>

    <!-- IMPORTANT Ajax Script   DO NOT DELETE  DARK MODE / LIGHT MODE && MENU EXPAND / COLLAPSE IMPORTANT AJAX-->
    <script>
        $(document).ready(function(){
            $('#dark').click(function(){
                $.ajax({
                    url: "{{ route('theme.color') }}",
                    type: "GET",
                    success: function(data){
                    }
                })
            });
            $('#toggle').click(function(){
                $.ajax({
                    url: "{{ route('theme.toggle') }}",
                    type: "GET",
                    success: function(data)
                    {
                    }
                })
            });
        })
    </script>

    <!-- DataTable Script-->
    <script>
        $(document).ready(function(){
            $('.data_table').dataTable({
                "bProcessing": false,
                "sAutoWidth": false,
                "bDestroy":false,
                "bSort":true,
                "sPaginationType": "bootstrap", // full_numbers
                // "iDisplayStart ": 10,
                // "iDisplayLength": 10,
                "bPaginate": false, //hide/show pagination
                "bFilter": true, //hide/show Search bar
                "bInfo": false, // hide/show showing entries
            });

            $('.data_table--without-sort').dataTable({
                "bProcessing": false,
                "sAutoWidth": false,
                "bDestroy":false,
                "bSort":false,
                "sPaginationType": "bootstrap", // full_numbers
                // "iDisplayStart ": 10,
                // "iDisplayLength": 10,
                "bPaginate": false, //hide/show pagination
                "bFilter": true, //hide/show Search bar
                "bInfo": false, // hide/show showing entries
            });
        })
    </script>

    <!-- Feather Icon Script-->
    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: '1em',
                    height: '1em'
                });
            }
        });
    </script>

    <!-- Inner Table Dropdown probolem solve functions -->
    <script>
        $(document).ready(function() {
            $('table').on('shown.bs.dropdown', function (e){
                $(this).closest('[class*="col"]').addClass("position-static")
            });
            $('table').on('hide.bs.dropdown', function () {
                $(this).closest('[class*="col"]').removeClass("position-static")
            });
        });
    </script>

    <!-- Toastr Message Script-->
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "3000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        $(window).on("load", function(){
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    toastr.error('{{ $error }}');
                @endforeach
            @endif

            @if(session()->get('error'))
                toastr.error('{{ session()->get('error') }}');
            @endif

            @if(session()->get('success'))
                toastr.success('{{ session()->get('success') }}');
            @endif
        });
    </script>

    @stack('js')
</body>
<!-- END: Body-->

</html>
