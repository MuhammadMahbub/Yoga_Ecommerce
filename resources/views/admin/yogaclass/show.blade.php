@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }}
@endsection

{{-- Active Menu --}}
@section('')
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
                <a href="{{ route('products.index') }}">{{ __("Products") }}</a>
            </li>
            <li class="breadcrumb-item active">
                {{ $product->title }}
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
                            <img src="{{ asset('uploads/products') }}/{{ $product->image }}" class="img-fluid product-img" alt="product image" />
                        </div>
                    </div>
                    <div class="col-12 col-md-7">
                        <h4>{{ $product->title }}</h4>
                        <span class="card-text item-company">By <a href="javascript:void(0)" class="company-name">{{ $product->creator->name }}</a></span>
                        <div class="ecommerce-details-price d-flex flex-wrap mt-1">
                            <h4 class="item-price mr-1">$499.99</h4>
                            <ul class="unstyled-list list-inline pl-1 border-left">
                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                            </ul>
                        </div>
                        @if($product->quantity > 10)
                        <p class="card-text">Available - <span class="text-success">{{ __("In stock") }} ({{ $product->quantity }} left)</span></p>
                        @elseif($product->quantity < 10)
                        <p class="card-text">Available - <span class="text-warning">{{ __("Low stock") }} ({{ $product->quantity }} left)</span></p>
                        @else
                        <p class="card-text">{{ __("Unavailable") }} - <span class="text-danger">{{ __("Out of stock") }}</span></p>
                        @endif
                        <p class="card-text">
                            <div>
                                {!! $product->short_description !!}
                            </div>
                            <div>
                                {!! $product->long_description !!}
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
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary mr-0 mr-sm-1 mb-1 mb-sm-0">
                                <i data-feather='edit-2' class="mr-50"></i>
                                <span class="add-to-cart">{{ __("Edit") }}</span>
                            </a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger  mr-0 mr-sm-1 mb-1 mb-sm-0">
                                    <i data-feather="trash-2" class="mr-50"></i>
                                    <span>{{ __("Delete") }}</span>
                                </button>
                            </form>
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
    </section>
    <!-- app e-commerce details end -->

</div>

@endsection

@push('js')
    <script>

    </script>

@endpush
