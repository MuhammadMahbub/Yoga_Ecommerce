@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | Products
@endsection

{{-- Active Menu --}}
@section('productslist')
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
    <h2 class="content-header-title float-left mb-0">Admin Dashboard</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">
                Products
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
                                <div class="search-results">{{ $products->count() }} results found</div>
                            </div>
                            <div class="view-options d-flex">
                                <div class="button-group-spacing">
                                    @if (havePermission('products','export'))
                                        <form action="{{ route('products.mass_export') }}" method="POST" class="d-inline-block w-100 w-sm-auto">
                                            @csrf
                                            <button type="submit" class="btn btn-primary waves-effect w-100 w-sm-auto">
                                                <i data-feather='download'></i><span class="pl-50">Export</span>
                                            </button>
                                        </form>
                                    @endif

                                    @if (havePermission('products','import'))
                                        <button type="button" class="btn btn-success waves-effect w-100 w-sm-auto" data-toggle="modal" data-target="#csvImportModal">
                                            <i data-feather='upload'></i>
                                            <span class="pl-50">Import</span>
                                        </button>
                                    @endif

                                    
                                    @push('all_modals')
                                        <!-- CSV Import Modal -->
                                        @if (havePermission('products','import'))
                                            <div class="modal fade" id="csvImportModal" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                    <div class="modal-content position-relative"> 
                                                        <form action="{{ route('products.import') }}" method="POST" id="importProductForm" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Import Products</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group my-2">
                                                                    <p class="form-label">Import Products</p> <span id="importError" class="text-danger"></span>
                                                                    <div class="custom-file cursor-pointer">
                                                                        <input type="file" name="file" id="importProduct"class="custom-file-input" required>
                                                                        <label class="custom-file-label">{{ __('Choose file') }} ...</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12"> 
                                                                        <div class="table-responsive"> 
                                                                            <table class="table table-bordered"  width="100%" cellspacing="0">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>
                                                                                            {{ __('Table Header ') }}
                                                                                        </th> 
                                                                                        <th>
                                                                                            {{ __('CSV Header') }} 
                                                                                        </th> 
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id="productCsvHeader">  

                                                                                </tbody>
                                                                            </table>  
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                                                                <button type="submit" id="importSubmitButton" class="btn btn-primary">{{ __('Save changes') }}</button>
                                                            </div> 
                                                        </form> 
                                                    </div>
                                                </div>
                                            </div> 
                                        @endif
                                    @endpush
                                    @if (havePermission('products','create'))
                                        <a class="btn btn-warning waves-effect w-100 w-sm-auto" href="{{ route('products.create') }}">
                                            <i data-feather='plus'></i>
                                            <span class="pl-50">Add New Product</span>
                                        </a>
                                    @endif
                                    <div class="dropdown d-inline-block w-100 w-sm-auto">
                                        <button type="button" class="btn btn-outline-primary dropdown-toggle waves-effect w-100 w-sm-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @if(request()->active == 'true')
                                                <span class="active-sorting">Active</span>
                                            @elseif(request()->lowest == 'true')
                                                <span class="active-sorting">Lowest</span>
                                            @elseif(request()->highest == 'true')
                                                <span class="active-sorting">Highest</span>
                                            @else
                                                <span class="active-sorting">All</span>
                                            @endif
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right w-100">
                                            <a class="dropdown-item" href="{{ route('products.index') }}">All</a>
                                            <a class="dropdown-item {{ (request()->active == 'true') ? 'active' : '' }}" href="{{ route('products.index', 'active=true') }}">Active</a>
                                            <a class="dropdown-item {{ (request()->lowest == 'true') ? 'active' : '' }}" href="{{ route('products.index', 'lowest=true') }}">Lowest</a>
                                            <a class="dropdown-item {{ (request()->highest == 'true') ? 'active' : '' }}" href="{{ route('products.index', 'highest=true') }}">Highest</a>
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
                        <form action="{{ route('product.search') }}" method="get" class="input-group">
                            <input type="text" class="form-control search-product" name="search" id="shop-search" placeholder="Search Product... Type and hit Enter" />
                            <div class="input-group-append">
                                <button type="submit" class="input-group-text">
                                    <i data-feather="search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    @if (Route::is("product.search"))    
                        <div class="col-sm-auto mt-50 mt-sm-0">
                            <a href="{{ route('products.index') }}" class="btn btn-danger waves-effect waves-float waves-light w-100 w-sm-auto">
                                <i data-feather='trash'></i><span class="pl-50">Clear</span>
                            </a>
                        </div>
                    @endif
                </div>
            </section>
            <!-- E-commerce Search Bar Ends -->

            <!-- E-commerce Products Starts -->
            <section id="ecommerce-products" class="grid-view">
                @foreach ($products as $product)
                    <div class="card ecommerce-card">
                        <a href="{{ route('products.show', $product->id) }}">
                            <img class="img-fluid card-img-top" src="{{ asset('uploads/products') }}/{{ $product->image }}" alt="{{ $product->title }}" />
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
                                <div>
                                    <h6 class="item-price">€{{ $product->price }}</h6>
                                </div>
                            </div>
                            <h6 class="item-name">
                                <a class="text-body" href="{{ route('products.show', $product->id) }}">{{ $product->title }}</a>
                                <span class="card-text item-company">By <a href="javascript:void(0)" class="company-name">{{ $product->creator->name }}</a></span>
                            </h6>
                            <p class="card-text item-description">
                                <div>
                                {!! $product->short_description !!}
                                </div>
                            </p>
                        </div>
                        <div class="item-options text-center">
                            <div class="item-wrapper">
                                <div class="item-cost">
                                    <h4 class="item-price">€{{ $product->price }}</h4>
                                </div>
                            </div>
                            <div class="item-options__btn-wrapper">
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning waves-float waves-light w-100">
                                    <i data-feather='edit-2'></i>
                                    <span>Edit</span>
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="w-100">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger waves-effect waves-float waves-light w-100">
                                        <i data-feather='trash-2'></i>
                                        <span class="add-to-cart">Delete</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </section>
            <!-- E-commerce Products Ends -->

            @include('includes.pagination' , ['variables' => $products, 'data_variables' => ['search' => request()->search, 'active' => request()->active,'lowest' => request()->lowest,'highest' => request()->highest]])

            <!-- E-commerce Pagination Starts -->
            {{-- <section id="ecommerce-pagination">
                <div class="row">
                    <div class="col-sm-12">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center mt-2">
                                <li class="page-item prev-item"><a class="page-link" href="javascript:void(0);"></a></li>
                                <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                <li class="page-item" aria-current="page"><a class="page-link" href="javascript:void(0);">4</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">5</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">6</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">7</a></li>
                                <li class="page-item next-item"><a class="page-link" href="javascript:void(0);"></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </section> --}}
            <!-- E-commerce Pagination Ends -->

        </div>
    </div>
    {{-- <div class="sidebar-detached sidebar-left">
        <div class="sidebar">
            <!-- Ecommerce Sidebar Starts -->
            <div class="sidebar-shop">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="filter-heading d-none d-lg-block">Filters</h6>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <!-- Price Filter starts -->
                        <div class="multi-range-price">
                            <h6 class="filter-title mt-0">Multi Range</h6>
                            <ul class="list-unstyled price-range" id="price-range">
                                <li>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="priceAll" name="price-range" class="custom-control-input" checked />
                                        <label class="custom-control-label" for="priceAll">All</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="priceRange1" name="price-range" class="custom-control-input" />
                                        <label class="custom-control-label" for="priceRange1">&lt;=$10</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="priceRange2" name="price-range" class="custom-control-input" />
                                        <label class="custom-control-label" for="priceRange2">$10 - $100</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="priceARange3" name="price-range" class="custom-control-input" />
                                        <label class="custom-control-label" for="priceARange3">$100 - $500</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="priceRange4" name="price-range" class="custom-control-input" />
                                        <label class="custom-control-label" for="priceRange4">&gt;= $500</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- Price Filter ends -->

                        <!-- Price Slider starts -->
                        <div class="price-slider">
                            <h6 class="filter-title">Price Range</h6>
                            <div class="price-slider">
                                <div class="range-slider mt-2" id="price-slider"></div>
                            </div>
                        </div>
                        <!-- Price Range ends -->

                        <!-- Categories Starts -->
                        <div id="product-categories">
                            <h6 class="filter-title">Categories</h6>
                            <ul class="list-unstyled categories-list">
                                <li>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="category1" name="category-filter" class="custom-control-input" checked />
                                        <label class="custom-control-label" for="category1">Appliances</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="category2" name="category-filter" class="custom-control-input" />
                                        <label class="custom-control-label" for="category2">Audio</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="category3" name="category-filter" class="custom-control-input" />
                                        <label class="custom-control-label" for="category3">Cameras & Camcorders</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="category4" name="category-filter" class="custom-control-input" />
                                        <label class="custom-control-label" for="category4">Car Electronics & GPS</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="category5" name="category-filter" class="custom-control-input" />
                                        <label class="custom-control-label" for="category5">Cell Phones</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="category6" name="category-filter" class="custom-control-input" />
                                        <label class="custom-control-label" for="category6">Computers & Tablets</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="category7" name="category-filter" class="custom-control-input" />
                                        <label class="custom-control-label" for="category7">Health, Fitness & Beauty</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="category8" name="category-filter" class="custom-control-input" />
                                        <label class="custom-control-label" for="category8">Office & School Supplies</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="category9" name="category-filter" class="custom-control-input" />
                                        <label class="custom-control-label" for="category9">TV & Home Theater</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="category10" name="category-filter" class="custom-control-input" />
                                        <label class="custom-control-label" for="category10">Video Games</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- Categories Ends -->

                        <!-- Brands starts -->
                        <div class="brands">
                            <h6 class="filter-title">Brands</h6>
                            <ul class="list-unstyled brand-list">
                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="productBrand1" />
                                        <label class="custom-control-label" for="productBrand1">Insignia™</label>
                                    </div>
                                    <span>746</span>
                                </li>
                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="productBrand2" checked />
                                        <label class="custom-control-label" for="productBrand2">Samsung</label>
                                    </div>
                                    <span>633</span>
                                </li>
                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="productBrand3" />
                                        <label class="custom-control-label" for="productBrand3">Metra</label>
                                    </div>
                                    <span>591</span>
                                </li>
                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="productBrand4" />
                                        <label class="custom-control-label" for="productBrand4">HP</label>
                                    </div>
                                    <span>530</span>
                                </li>
                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="productBrand5" checked />
                                        <label class="custom-control-label" for="productBrand5">Apple</label>
                                    </div>
                                    <span>442</span>
                                </li>
                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="productBrand6" />
                                        <label class="custom-control-label" for="productBrand6">GE</label>
                                    </div>
                                    <span>394</span>
                                </li>
                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="productBrand7" />
                                        <label class="custom-control-label" for="productBrand7">Sony</label>
                                    </div>
                                    <span>350</span>
                                </li>
                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="productBrand8" />
                                        <label class="custom-control-label" for="productBrand8">Incipio</label>
                                    </div>
                                    <span>320</span>
                                </li>
                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="productBrand9" />
                                        <label class="custom-control-label" for="productBrand9">KitchenAid</label>
                                    </div>
                                    <span>318</span>
                                </li>
                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="productBrand10" />
                                        <label class="custom-control-label" for="productBrand10">Whirlpool</label>
                                    </div>
                                    <span>298</span>
                                </li>
                            </ul>
                        </div>
                        <!-- Brand ends -->

                        <!-- Rating starts -->
                        <div id="ratings">
                            <h6 class="filter-title">Ratings</h6>
                            <div class="ratings-list">
                                <a href="javascript:void(0)">
                                    <ul class="unstyled-list list-inline">
                                        <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                        <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                        <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                        <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                        <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                                        <li>& up</li>
                                    </ul>
                                </a>
                                <div class="stars-received">160</div>
                            </div>
                            <div class="ratings-list">
                                <a href="javascript:void(0)">
                                    <ul class="unstyled-list list-inline">
                                        <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                        <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                        <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                        <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                                        <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                                        <li>& up</li>
                                    </ul>
                                </a>
                                <div class="stars-received">176</div>
                            </div>
                            <div class="ratings-list">
                                <a href="javascript:void(0)">
                                    <ul class="unstyled-list list-inline">
                                        <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                        <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                        <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                                        <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                                        <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                                        <li>& up</li>
                                    </ul>
                                </a>
                                <div class="stars-received">291</div>
                            </div>
                            <div class="ratings-list">
                                <a href="javascript:void(0)">
                                    <ul class="unstyled-list list-inline">
                                        <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                        <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                                        <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                                        <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                                        <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                                        <li>& up</li>
                                    </ul>
                                </a>
                                <div class="stars-received">190</div>
                            </div>
                        </div>
                        <!-- Rating ends -->

                        <!-- Clear Filters Starts -->
                        <div id="clear-filters">
                            <button type="button" class="btn btn-block btn-primary">Clear All Filters</button>
                        </div>
                        <!-- Clear Filters Ends -->
                    </div>
                </div>
            </div>
            <!-- Ecommerce Sidebar Ends -->

        </div>
    </div> --}}
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

