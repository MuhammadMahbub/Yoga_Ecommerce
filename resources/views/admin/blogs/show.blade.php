@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __("Single Blog") }}
@endsection

{{-- Active Menu --}}
@section('blogList')
    active
@endsection

@push('css')

@endpush


{{-- Breadcrumb --}}
@section('breadcrumb')
    <h2 class="content-header-title float-left mb-0">{{ __("Admin Dashboard") }}</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">{{ __("Home") }}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('blogs.index') }}">{{ __("Blogs") }}</a>
            </li>
            <li class="breadcrumb-item active">
                {{ __("Single Blog") }}
            </li>
        </ol>
    </div>
@endsection

{{-- Main Content --}}
@section('content')

<div class="content-body">
    <!-- app e-commerce details start -->
    <section class="app-ecommerce-details">
        <div class="card">
            <!-- Product Details starts -->
            <div class="card-body">
                <div class="row my-2">
                    <div class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="{{ asset('uploads/blogs') }}/{{ $blog->image }}" class="img-fluid product-img" alt="product image" />
                        </div>
                    </div>
                    <div class="col-12 col-md-7">
                        <h4>{{ $blog->title }}</h4>
                        <span class="card-text item-company">By <a href="javascript:void(0)" class="company-name">{{ $blog->creator->name ?? 'N/A' }}</a></span>

                        <p class="card-text">
                            <div>
                                <h6>{{ __("Short Description") }}</h6>
                                {!! $blog->short_description !!}
                            </div>
                            <hr/>
                            <div>
                                <h6>{{ __("Description") }}</h6>
                                {!! $blog->description !!}
                            </div>
                        </p>
                        <hr />
                        {{-- <div class="product-color-options">
                            <h6>Colors</h6>
                            <ul class="list-unstyled mb-0">
                                <li class="d-inline-block selected">
                                    <div class="color-option b-primary">
                                        <div class="filloption bg-primary"></div>
                                    </div>
                                </li>
                                <li class="d-inline-block">
                                    <div class="color-option b-success">
                                        <div class="filloption bg-success"></div>
                                    </div>
                                </li>
                                <li class="d-inline-block">
                                    <div class="color-option b-danger">
                                        <div class="filloption bg-danger"></div>
                                    </div>
                                </li>
                                <li class="d-inline-block">
                                    <div class="color-option b-warning">
                                        <div class="filloption bg-warning"></div>
                                    </div>
                                </li>
                                <li class="d-inline-block">
                                    <div class="color-option b-info">
                                        <div class="filloption bg-info"></div>
                                    </div>
                                </li>
                            </ul>
                        </div> --}}
                        <hr />
                        <div class="d-flex flex-column flex-sm-row pt-1">
                            <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning waves-float waves-light mr-1">
                                <i data-feather='edit-2'></i>
                                <span>{{ __("Edit") }}</span>
                            </a>
                            <a class="btn btn-danger waves-effect waves-float waves-light" data-toggle="modal" data-target="#deleteModal_{{ $blog->id }}" title="Delete">
                                <i data-feather="trash" class="mr-50"></i>
                                <span>{{ __('Delete') }}</span>
                            </a>
                            {{-- <form action="{{ route('products.destroy', $blog->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger  mr-0 mr-sm-1 mb-1 mb-sm-0">
                                    <i data-feather="trash-2" class="mr-50"></i>
                                    <span>Delete</span>
                                </button>
                            </form> --}}
                            {{-- <div class="btn-group dropdown-icon-wrapper btn-share">
                                <button type="button" class="btn btn-icon hide-arrow btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i data-feather="share-2"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="javascript:void(0)" class="dropdown-item">
                                        <i data-feather="facebook"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="dropdown-item">
                                        <i data-feather="twitter"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="dropdown-item">
                                        <i data-feather="youtube"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="dropdown-item">
                                        <i data-feather="instagram"></i>
                                    </a>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product Details ends -->

            <!-- Item features starts -->
            {{-- <div class="item-features">
                <div class="row text-center">
                    <div class="col-12 col-md-4 mb-4 mb-md-0">
                        <div class="w-75 mx-auto">
                            <i data-feather="award"></i>
                            <h4 class="mt-2 mb-1">100% Original</h4>
                            <p class="card-text">Chocolate bar candy canes ice cream toffee. Croissant pie cookie halvah.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mb-4 mb-md-0">
                        <div class="w-75 mx-auto">
                            <i data-feather="clock"></i>
                            <h4 class="mt-2 mb-1">10 Day Replacement</h4>
                            <p class="card-text">Marshmallow biscuit donut dragée fruitcake. Jujubes wafer cupcake.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mb-4 mb-md-0">
                        <div class="w-75 mx-auto">
                            <i data-feather="shield"></i>
                            <h4 class="mt-2 mb-1">1 Year Warranty</h4>
                            <p class="card-text">Cotton candy gingerbread cake I love sugar plum I love sweet croissant.</p>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- Item features ends -->
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

    </section>
    <!-- app e-commerce details end -->

</div>

@endsection

@push('js')
    <script>

    </script>

@endpush
