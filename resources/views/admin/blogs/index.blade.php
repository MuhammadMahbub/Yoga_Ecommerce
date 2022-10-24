@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __("Blogs") }}
@endsection

{{-- Active Menu --}}
@section('blogList')
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

        .blogpostimage img{
            height: 326px;
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
                {{ __("Blogs") }}
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
                                <div class="search-results">{{ $blogs->count() }} {{ __("results found") }}</div>
                            </div>
                            <div class="view-options d-flex">
                                <div class="button-group-spacing">
                                    @if (havePermission('blogs','export'))
                                        <form action="{{ route('blogs.mass_export') }}" method="POST" class="d-inline-block w-100 w-sm-auto">
                                            @csrf
                                            <button type="submit" class="btn btn-primary waves-effect w-100 w-sm-auto">
                                                <i data-feather='download'></i><span class="pl-50">{{ __("Export") }}</span>
                                            </button>
                                        </form>
                                    @endif

                                    @if (havePermission('blogs','import'))
                                        <button type="button" class="btn btn-success waves-effect w-100 w-sm-auto" data-toggle="modal" data-target="#csvImportModal">
                                            <i data-feather='upload'></i>
                                            <span class="pl-50">{{ __("Import") }}</span>
                                        </button>
                                    @endif


                                    @push('all_modals')
                                        @if (havePermission('blogs','import'))
                                            <div class="modal fade" id="csvImportModal" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                    <div class="modal-content position-relative">
                                                        <form action="{{ route('blogs.import') }}" method="POST" id="importBlogForm" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">{{ __("Import Blogs") }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group my-2">
                                                                    <p class="form-label">{{ __("Import Blogs") }}</p> <span id="importError" class="text-danger"></span>
                                                                    <div class="custom-file cursor-pointer">
                                                                        <input type="file" name="file" id="importBlog"class="custom-file-input" required>
                                                                        <label class="custom-file-label">{{ __('Choose File') }} ...</label>
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
                                                                <button type="submit" id="importSubmitButton" class="btn btn-primary">{{ __('Save Changes') }}</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endpush


                                    @if (havePermission('blogs','create'))
                                        <a class="btn btn-warning waves-effect w-100 w-sm-auto" href="{{ route('blogs.create') }}">
                                            <i data-feather='plus'></i>
                                            <span class="pl-50">{{ __("Add New Blog") }}</span>
                                        </a>
                                    @endif

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
                        <form action="{{ route('blogs.search') }}" method="get" class="input-group">
                            <input type="text" class="form-control search-product" name="search" id="shop-search" placeholder="Search Blogs... Type and hit Enter" />
                            <div class="input-group-append">
                                <button type="submit" class="input-group-text">
                                    <i data-feather="search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    @if (Route::is("blogs.search"))
                        <div class="col-sm-auto mt-50 mt-sm-0">
                            <a href="{{ route('blogs.index') }}" class="btn btn-danger waves-effect waves-float waves-light w-100 w-sm-auto">
                                <i data-feather='trash'></i><span class="pl-50">{{ __("Clear") }}</span>
                            </a>
                        </div>
                    @endif
                </div>
            </section>
            <!-- E-commerce Search Bar Ends -->

            <!-- E-commerce Products Starts -->
            <section id="ecommerce-products" class="grid-view">
                @foreach ($blogs as $blog)
                    <div class="card ecommerce-card blogpostimage">
                        <a href="{{ route('blogs.show', $blog->id) }}">
                            <img class="img-fluid card-img-top" src="{{ asset('uploads/blogs') }}/{{ $blog->image }}" alt="{{ $blog->title }}" />
                        </a>
                        <div class="card-body">

                            <h6 class="item-name">
                                <a class="text-body" href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a>
                                {{-- <span class="card-text item-company">By <a href="javascript:void(0)" class="company-name">{{ $blog->creator->name ?? ''}}</a></span> --}}
                            </h6>
                            <p class="card-text item-description">
                                <div>
                                    {!! $blog->short_description !!}
                                </div>
                            </p>
                        </div>
                        <div class="item-options text-center">

                            <div class="item-options__btn-wrapper">
                                <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning waves-float waves-light w-100">
                                    <i data-feather='edit-2'></i>
                                    <span>{{ __("Edit") }}</span>
                                </a>
                                <a class="btn btn-danger waves-effect waves-float waves-light w-100" data-toggle="modal" data-target="#deleteModal_{{ $blog->id }}" title="Delete">
                                    <i data-feather="trash" class="mr-50"></i>
                                    <span>{{ __('Delete') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Delete Modal -->
                    <div class="modal fade" id="deleteModal_{{ $blog->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('delete')
                                    <div class="modal-body text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" style="font-size: 100px" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle text-danger">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="12" y1="8" x2="12" y2="12"></line>
                                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                        </svg>
                                        <h2 class="font-weight-normal mt-1">{{ __('Are you sure?') }}?</h2>
                                        <h4 class="font-weight-light mb-0">{{ __("You won't be able to revert this!") }}</h4>
                                    </div>
                                    <div class="modal-footer border-top-0 justify-content-center">
                                        <button type="button" class="btn btn-outline-secondary waves-effect" data-dismiss="modal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                            </svg>
                                            {{ __('Close') }}
                                        </button>
                                        <button class="btn btn-danger waves-effect waves-float waves-light">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                            {{ __('Delete') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </section>
            <!-- E-commerce Products Ends -->

            @include('includes.pagination' , ['variables' => $blogs, 'data_variables' => []])

        </div>
    </div>
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


            // Product  Import
            $('body').on('change','#importBlog',function(){
                var form_data = new FormData($('#importBlogForm')[0]);

                $.ajax({
                    url: "{{ route('blog.pre.import') }}",
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

