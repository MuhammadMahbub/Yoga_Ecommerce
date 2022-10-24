@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __("Shop") }}
@endsection

{{-- Active Menu --}}
@section('')
    active
@endsection

@push('css')

<style>
    .edit-thumb-preview{
        position: relative;
    }
    .edit-thumb-preview__btn{
        position: absolute;
        top: 10%;
        right: 10%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        border: 0;
        border-radius: 50%;
        color: #ffffff;
        background-color: #ea5455;
        transition: box-shadow 0.15s ease-in-out;
    }
    .edit-thumb-preview__img{
        max-width: 100%;
        max-height: 150px;
    }
    .edit-thumb-preview__btn:is(:hover, :active){
        box-shadow: 0 8px 25px -8px #ea5455;
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
            <li class="breadcrumb-item">
                <a href="{{ route('shop.index') }}">{{ __("Shops") }}</a>
            </li>
            <li class="breadcrumb-item active">
                {{ $shop->name }}
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
                            <img src="{{ asset('uploads/shops') }}/{{ $shop->image }}" class="img-fluid product-img" alt="product image" />
                        </div>
                    </div>
                    <div class="col-12 col-md-7">
                        <h4>{{ $shop->title }}</h4>
                        <span class="card-text item-company">By <a href="javascript:void(0)" class="company-name">{{ $shop->creator->name ?? 'N/A'}}</a></span>
                        <h3>{{ $shop->name ?? 'N/A'}}</h3>
                        <h5>Category: {{ $shop->get_category->name }}</h5>
                        <div class="ecommerce-details-price d-flex flex-wrap mt-1">
                            <h4 class="item-price mr-1">Price: ${{ $shop->price }}</h4>
                            <h4 class="item-price mr-1">Thick: {{ $shop->thick }}mm</h4>
                            {{-- <ul class="unstyled-list list-inline pl-1 border-left">
                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                            </ul> --}}
                        </div>

                        <p class="card-text">
                            <div>
                                {!! $shop->description !!}
                            </div>
                        </p>
                        <hr />

                        <div class="d-flex flex-column flex-sm-row pt-1">
                            <a href="{{ route('shop.index') }}" class="btn btn-warning mr-0 mr-sm-1 mb-1 mb-sm-0">
                                <i data-feather='arrow-left' class="mr-50"></i>
                                <span class="add-to-cart">{{ __("Back") }}</span>
                            </a>
                            <a data-toggle="modal" data-target="#edit_shop_{{ $shop->id }}" class="btn btn-primary mr-0 mr-sm-1 mb-1 mb-sm-0">
                                <i data-feather='edit-2' class="mr-50"></i>
                                <span class="add-to-cart">{{ __("Edit") }}</span>
                            </a>
                            {{-- <form action="{{ route('shop.destroy', $shop->id) }}" method="POST">
                                @csrf
                                @method('DELETE') --}}
                                <a class="btn btn-danger mr-0 mr-sm-1 mb-1 mb-sm-0" data-toggle="modal" data-target="#deleteModal_{{ $shop->id }}" title="Delete">
                                    <i data-feather="trash" class="mr-50"></i>
                                    <span>{{ __('Delete') }}</span>
                                </a>
                            {{-- </form> --}}

                        </div>
                    </div>
                </div>
            </div>

            {{-- thumb images --}}
            <div class="item-features mb-3">
                <div class="row text-center">
                    <div class="col-12">
                    @foreach ($shop->get_shop_thumb as $thumb)
                        <img src="{{ asset('uploads/shops') }}/{{ $thumb->thumb_image }}" alt="" width="150">
                    @endforeach
                    </div>
                </div>
            </div>
            {{-- thumb images --}}
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

@push('all_modals')
    <!--Edit Modal -->
    @if (havePermission('shop','edit'))
    <div class="modal fade" id="edit_shop_{{ $shop->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __("Update Shop") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('shop.update', $shop->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="category_id_edit">{{ __("Category") }} <span class="text-danger">*</span></label>
                        <select name="category_id_edit" id="category_id_edit" class="form-control">
                            <option selected disabled value="">{{ __("Select Category") }}</option>
                            @foreach (categories() as $category)
                                <option value="{{ $category->id }}" {{ $shop->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category_id_edit')
                    <div class="alert alert-danger" role="alert">
                        <div class="alert-body">
                            {{ $message }}
                        </div>
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="name_edit">{{ __("Name") }}<span class="text-danger">*</span></label>
                        <input type="text" value="{{ $shop->name }}" name="name_edit" id="name_edit" class="form-control">
                    </div>
                    @error('name_edit')
                    <div class="alert alert-danger" role="alert">
                        <div class="alert-body">
                            {{ $message }}
                        </div>
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="description_edit">{{ __("Description") }} <span class="text-danger">*</span></label>
                        <input type="hidden" name="description_edit" id="description_edit" class="form-control" value="{{ $shop->description ?? old('description_edit') }}">
                        <trix-editor input="description_edit"></trix-editor>
                    </div>
                    @error('description_edit')
                    <div class="alert alert-danger" role="alert">
                        <div class="alert-body">
                            {{ $message }}
                        </div>
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="price_edit">{{ __("Price") }}<span class="text-danger">*</span></label>
                        <input type="text" value="{{ $shop->price }}" name="price_edit" id="price_edit" class="form-control">
                    </div>
                    @error('price_edit')
                    <div class="alert alert-danger" role="alert">
                        <div class="alert-body">
                            {{ $message }}
                        </div>
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="thick_edit">{{ __("Thick") }}<span class="text-danger">*</span></label>
                        <input type="text" value="{{ $shop->thick }}" name="thick_edit" id="thick_edit" class="form-control">
                    </div>
                    @error('thick_edit')
                    <div class="alert alert-danger" role="alert">
                        <div class="alert-body">
                            {{ $message }}
                        </div>
                    </div>
                    @enderror

                    <div class="form-group">
                        <label> {{ __('Previous Image') }} </label>
                        <img src="{{ asset('uploads/shops') }}/{{ $shop->image }}" alt="" width="200">
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image_edit" name="image_edit">
                            <label class="custom-file-label" for="image_edit">{{ __("Choose Shop Image") }}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for=""> {{ __('Preview Image') }} </label>
                        <img width="200" id="output_edit">
                    </div>
                    @error('image_edit')
                    <div class="alert alert-danger" role="alert">
                        <div class="alert-body">
                            {{ $message }}
                        </div>
                    </div>
                    @enderror

                    <div class="form-group">
                        <label> {{ __('Previous Thumb Images') }} </label>
                        <div class="row">
                            @foreach ($shop->get_shop_thumb as $shop_thumb)
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="edit-thumb-preview">
                                        <button type="button" data-id="{{ $shop_thumb->id }}" class="edit-thumb-preview__btn shop_thumb_delete">
                                            <i data-feather="x"></i>
                                        </button>
                                        <img src="{{ asset('uploads/shops') }}/{{ $shop_thumb->thumb_image }}" alt="Previous Thumb" class="edit-thumb-preview__img">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="thumb_image" name="thumb_image[]" multiple>
                            <label class="custom-file-label" for="thumb_image">{{ __('Choose Thumb Images') }} </label>
                        </div>
                    </div>
                    @error('thumb_image')
                        <div class="alert alert-danger">
                            <div class="alert-body">
                                {{ $message }}
                            </div>
                        </div>
                    @enderror
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label for="meta_title"> {{ __("Meta Title") }} </label>
                        <input type="text" value="{{ $shop_thumb->meta_title }}" class="form-control" id="title" name="meta_title" placeholder="Blog Meta Title">
                    </div>
                    @error('meta_title')
                        <div class="alert alert-danger">
                            <div class="alert-body">
                                {{ $message }}
                            </div>
                        </div>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="meta_keyword"> {{ __("Meta Keywords") }}</label>
                        <input type="text" value="{{ $shop_thumb->meta_keyword }}" class="form-control" id="keywords" name="meta_keyword" placeholder="Blog Meta keywords">
                    </div>
                    @error('meta_keyword')
                        <div class="alert alert-danger">
                            <div class="alert-body">
                                {{ $message }}
                            </div>
                        </div>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="meta_description"> {{ __("Meta Description") }} </label>
                       <textarea class="form-control" name="meta_description" id="meta_description" cols="30" rows="5" placeholder="Blog Meta Description">{{ $shop_thumb->meta_description }}</textarea>
                    </div>
                    @error('meta_description')
                        <div class="alert alert-danger">
                            <div class="alert-body">
                                {{ $message }}
                            </div>
                        </div>
                    @enderror
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __("Close") }}</button>
                    <button type="submit" class="btn btn-primary">{{ __("Submit") }}</button>
                </div>
            </form>
        </div>
        </div>
    </div>

@endif

    <!-- Single Delete Modal -->
    <div class="modal fade" id="deleteModal_{{ $shop->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('shop.destroy', $shop->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('delete')
                    <div class="modal-body text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" style="font-size: 100px" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle text-danger">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>
                        <h2 class="font-weight-normal mt-1">{{ __('Are you sure') }}?</h2>
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
@endpush

@endsection

@push('js')
<script>
$(document).ready(function(){

    @if($errors->has('name_edit') || $errors->has('thick_edit') || $errors->has('description_edit') || $errors->has('price_edit'))
        $("#edit_shop_{{ session('id') }}").modal('show');
    @endif

    document.getElementById('image').onchange = function() {
        var src = URL.createObjectURL(this.files[0])
        document.getElementById('output').src = src
    }

    $('.shop_thumb_delete').on('click', function(){
        var shop_thumb_id = $(this).attr('data-id');
        // alert(shop_thumb_id)
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ route('shop_thumb_single_delete') }}",
            type: 'POST',
            data: {
                shop_thumb_id: shop_thumb_id,
            },
            success: function(data){
                if(data.success == 'done'){
                    toastr.error(data.message);
                    window.location.reload();
                }
            }
        });
    });
});
</script>

@endpush
