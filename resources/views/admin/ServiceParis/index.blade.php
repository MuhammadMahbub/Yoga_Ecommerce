@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __("Service Paris") }}
@endsection

{{-- Active Menu --}}
@section('serviceParis.index')
    active
@endsection

@push('vendor-css')
<link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/vendors/css/extensions/nouislider.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/css/plugins/extensions/ext-component-sliders.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/css/pages/app-ecommerce.css') }}">
@endpush

@push('theme-css')

@endpush

@push('css')
    <style>
        .card-img-top {
            height: 100%;
            max-height: 300px;
        }
    </style>
@endpush


{{-- Breadcrumb --}}
@section('breadcrumb')
    <h2 class="content-header-title float-left mb-0">{{ __("Admin Dashboard") }}</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">{{ __("Home") }}</a>
            </li>
            <li class="breadcrumb-item active">
                {{ __("Service Paris") }}
            </li>
        </ol>
    </div>
@endsection

@section('content-wrapper-class', 'ecommerce-application')

{{-- Main Content --}}
@section('content')
    <div class="content-detached">
        <div class="content-body">
            <!-- E-commerce Content Section Starts -->
            <section id="ecommerce-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="ecommerce-header-items">
                            <div class="result-toggler">
                                <div class="search-results">{{ $services->count() }} {{ __("results found") }}</div>
                            </div>
                            <div class="view-options d-flex">
                                <div class="button-group-spacing">
                                    @if (havePermission('class','create'))
                                        <a class="btn btn-warning waves-effect w-100 w-sm-auto" href="{{ route('serviceParis.create') }}">
                                            <i data-feather='plus'></i>
                                            <span class="pl-50">{{ __("Add New Service") }}</span>
                                        </a>
                                        <button class="btn btn-primary waves-effect w-100 w-sm-auto" data-toggle="modal" data-target="#banner_setting" >
                                            <i data-feather='settings'></i>
                                            <span class="pl-50">{{ __("Banner setting") }}</span>
                                        </button>
                                    @endif
                                    <div class="dropdown d-inline-block w-100 w-sm-auto">
                                        <button type="button" class="btn btn-outline-primary dropdown-toggle waves-effect w-100 w-sm-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @if(request()->lowest == 'true')
                                                <span class="active-sorting">{{ __("Lowest") }}</span>
                                            @elseif(request()->highest == 'true')
                                                <span class="active-sorting">{{ __("Highest") }}</span>
                                            @else
                                                <span class="active-sorting">{{ __("All") }}</span>
                                            @endif
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right w-100">
                                            <a class="dropdown-item" href="{{ route('serviceParis.index') }}">All</a>
                                            <a class="dropdown-item {{ (request()->lowest == 'true') ? 'active' : '' }}" href="{{ route('serviceParis.index', 'lowest=true') }}">{{ __("Lowest") }}</a>
                                            <a class="dropdown-item {{ (request()->highest == 'true') ? 'active' : '' }}" href="{{ route('serviceParis.index', 'highest=true') }}">{{ __("Highest") }}</a>
                                        </div>
                                    </div>
                                    <div class="btn-group btn-group-toggle w-100 w-sm-auto" data-toggle="buttons">
                                        <label class="btn btn-icon btn-outline-primary view-btn grid-view-btn">
                                            <input type="radio" name="radio_options" id="radio_option1" checked />
                                            <i data-feather="grid" class="font-medium-3"></i>
                                        </label>
                                        <label class="btn btn-icon btn-outline-primary view-btn list-view-btn">
                                            <input type="radio" name="radio_options" id="radio_option2" />
                                            <i data-feather="list" class="font-medium-3"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- E-commerce Content Section Starts -->

            <!-- background Overlay when sidebar is shown  starts-->
            <div class="body-content-overlay"></div>
            <!-- background Overlay when sidebar is shown  ends-->

            <!-- E-commerce Search Bar Starts -->
            <section id="ecommerce-searchbar" class="ecommerce-searchbar">
                <div class="row mt-1">
                    <div class="col-sm">
                        <form action="{{ route('serviceParis.search') }}" method="get" class="input-group">
                            <input type="text" class="form-control search-product" @if(isset(request()->search)) value="{{ request()->search }}" @endif name="search" id="shop-search" placeholder="Search class... Type and hit Enter" />
                            <div class="input-group-append">
                                <button type="submit" class="input-group-text">
                                    <i data-feather="search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    @if (Route::is("serviceParis.search"))
                        <div class="col-sm-auto mt-50 mt-sm-0">
                            <a href="{{ route('serviceParis.index') }}" class="btn btn-danger waves-effect waves-float waves-light w-100 w-sm-auto">
                                <i data-feather='trash'></i><span class="pl-50">{{ __("Clear") }}</span>
                            </a>
                        </div>
                    @endif
                </div>
            </section>
            <!-- E-commerce Search Bar Ends -->

            <!-- E-commerce Products Starts -->
            <section id="ecommerce-products" class="grid-view">
                @foreach ($services as $service)
                    <div class="card ecommerce-card">
                        <a href="">
                            <img class="img-fluid card-img-top" src="{{ asset('uploads/services') }}/{{ $service->image }}" alt="{{ $service->title }}" />
                        </a>
                        <div class="card-body">
                            <div class="item-wrapper">
                                <div class="item-rating">
                                    <ul class="unstyled-list list-inline">
                                        <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                        <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                        <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                        <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                        <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <h6 class="item-name">
                                <a class="text-body" href="">{{ $service->title }}</a>
                                <span class="card-text item-company">By <a href="javascript:void(0)" class="company-name">{{ $service->creator->name }}</a></span>
                            </h6>
                            <p class="card-text item-description">
                                <div>
                                    {{ Str::words($service->short_description,30) }}
                                </div>
                            </p>
                        </div>
                        <div class="item-options text-center">
                            <div class="item-wrapper">
                                <div class="item-cost">
                                    <h4 class="item-price">€{{ $service->price }}</h4>
                                </div>
                            </div>

                            <div class="item-options__btn-wrapper">
                                @if (havePermission('class','edit')) 
                                    <a href="{{ route('serviceParis.edit', $service->id) }}" class="btn btn-warning waves-float waves-light w-100">
                                        <i data-feather='edit-2'></i>
                                        <span>{{ __("Edit") }}</span>
                                    </a>
                                @endif
                                @if (havePermission('class','delete'))
                                    <form action="{{ route('serviceParis.destroy') }}" method="POST" class="w-100">
                                        @csrf
                                        <input type="hidden" name="id"  value="{{ $service->id }}">
                                        <button type="submit" class="btn btn-danger waves-effect waves-float waves-light w-100">
                                            <i data-feather='trash-2'></i>
                                            <span class="add-to-cart">{{ __("Delete") }}</span>
                                        </button>
                                    </form>
                                @endif
                            </div>

                            <div class="item-options__btn-wrapper">
                                @if (havePermission('class','edit')) 
                                    <a href="{{ route('service.gallery.index', $service->id) }}" class="btn btn-info waves-effect waves-float waves-light w-100">
                                        <i data-feather='image'></i>
                                        <span class="add-to-cart">{{ __("Gallery") }}</span>
                                    </a> 
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- @push('all_modals') 
                        <!-- Modal -->
                        <div class="modal fade" id="classPricing{{ $service->id }}" tabindex="-1"  aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Class Pricing</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        
                                    </div>
                                    <div class="modal-footer"> 
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endpush --}}
                @endforeach
            </section>
            <!-- E-commerce Products Ends -->

            @include('includes.pagination' , ['variables' => $services, 'data_variables' => ['search' => request()->search, 'active' => request()->active,'lowest' => request()->lowest,'highest' => request()->highest]])

        </div>
    </div>



    @push('all_modals')
        <div class="modal fade" id="banner_setting" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un nouveau</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('serviceParis.banner.update',$banner->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="title[en]">{{ __("Title") }} (EN) <small class="text-danger">*</small></label>
                                {{ app()->setLocale('en') }}
                                <input type="text" class="form-control" id="title[en]" name="title[en]" value="{{ $banner->title }}" >
                                {{ app()->setLocale(app()->getLocale()) }}
                            </div>
                            @error('title.en')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                            <div class="form-group">
                                <label for="title[fr]">{{ __("Title") }} (FR) <small class="text-danger">*</small></label>
                                {{ app()->setLocale('fr') }}
                                <input type="text" class="form-control" id="title[fr]" name="title[fr]" value="{{ $banner->title }}" >
                                {{ app()->setLocale(app()->getLocale()) }}
                            </div>
                            @error('title.fr')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                            <div class="form-group">
                                <label for="image">{{ __("Image") }} <span class="text-warning">(Dimensions:1366 x 560)</span> <small class="text-danger">*</small></label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">{{ __("Choose Image") }}</label>
                                </div>
                            </div>
                            @error('image')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror

                            <img src="{{ asset($banner->image) }}" alt="Banner image" height="150">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Soumettre</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
   @endpush



@endsection

@push('page-js')
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('dashboard_assets/app-assets/vendors/js/extensions/wNumb.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/app-assets/vendors/js/extensions/nouislider.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('dashboard_assets/app-assets/js/scripts/pages/app-ecommerce.js') }}"></script>
    <!-- END: Page JS-->
@endpush


@push('js')
    <script>

        @if($errors->has('title.fr') && $error->has('image'))
            $('#banner_setting').modal('show');
        @endif


        
        $(document).ready(function(){

            $("body").on('change', '#product_category', function(){
                let id = $("#product_category").val();
                $.ajax({
                    type : 'POST',
                    url  : "{{ route('get.subcategory') }}",
                    data : {
                        id : id,
                    },
                    success : function(data){
                       $("#product_subcategory").html(data);
                    }
                })
            });

            // Product  Import
            $('body').on('change','#importProduct',function(){
                var form_data = new FormData($('#importProductForm')[0]);

                $.ajax({
                    url: "{{ route('product.pre.import') }}",
                    type: "post",
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if(response.data){
                            $('#importSubmitButton').removeClass('d-none');
                            $('#importError').addClass('d-none');
                            $('#productCsvHeader').html(response.data);
                        }
                        if(response.error){
                            $('#importSubmitButton').addClass('d-none');
                            $('#importError').removeClass('d-none');
                            $('#importError').text(response.error);
                        }
                    },
                });
            });

        });
    </script>

@endpush

