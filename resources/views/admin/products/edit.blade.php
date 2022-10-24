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
    <h2 class="content-header-title float-left mb-0">Admin Dashboard</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('products.index') }}">Products</a>
            </li>
            <li class="breadcrumb-item active">
                Edit {{ $product->title }}
            </li>
        </ol>
    </div>
@endsection

{{-- Main Content --}}
@section('content')
<div class="row">
    <div class="col-12">
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Product</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="product_name">Product title <small class="text-danger">*</small></label>
                                <input type="text" value="{{ $product->title ?? old('title') }}" class="form-control" id="product_name" name="title" placeholder="Product Name">
                            </div>
                            @error('title')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="product_price">Product Price <small class="text-danger">*</small></label>
                                <input type="text" value="{{ $product->price ?? old('price') }}" class="form-control" id="product_price" name="price" placeholder="Product Price">
                            </div>
                            @error('price')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="product_quantity">Product Quantity <small class="text-danger">*</small></label>
                                <input value="{{ $product->quantity ?? old('quantity') }}" type="text" class="form-control" id="product_quantity" name="quantity" placeholder="Product Quantity">
                            </div>
                            @error('quantity')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="product_discount">Product Discount <small class="text-danger">(Please define a discount amount)</small></label>
                                <input type="text" class="form-control" value="{{ $product->discount ?? old('discount') }}" id="product_discount" name="discount" placeholder="Product discount">
                            </div>
                            @error('discount')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="product_discountsku">Product SKU <small class="text-danger">*</small></label>
                                <input type="text" class="form-control" value="{{ $product->sku ?? old('sku') }}" id="product_sku" name="sku" placeholder="Product sku">
                            </div>
                            @error('sku')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="product_category">Product Category <small class="text-danger">*</small></label>
                                <select class="form-control select2" id="product_category" name="category_id">
                                    <option value="" selected>Select Category</option>
                                    @foreach ($categories as $category)
                                        @if($category->subCategories->count() > 0)
                                            @if($product->category_id == $category->id)
                                                <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                                            @else
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endif
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            @error('category_id')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="product_subcategory">Product Subcategory <small class="text-danger">*</small></label>
                                <select class="form-control select2" id="product_subcategory" name="subcategory_id[]" multiple>
                                    @foreach ($product->sub_category as $subcategory)
                                        @foreach ($product->category->subCategories as $item)
                                            @if($item->id == $subcategory->sub_category->id)
                                                <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                            @error('subcategory_id')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="short_description">Short Description <small class="text-danger">*</small></label>
                                <div>
                                    <input id="short_description" value="{!! $product->short_description ?? old('short_description') !!}" type="hidden" name="short_description">
                                    <trix-editor input="short_description" class="trix-content"></trix-editor>
                                </div>
                            </div>
                            @error('short_description')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="long_description">Long Description</label>
                                <div>
                                    <input id="long_description" value="{!! $product->long_description ?? old('long_description') !!}" type="hidden" name="long_description">
                                    <trix-editor input="long_description" class="trix-content"></trix-editor>
                                </div>
                            </div>
                            @error('long_description')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="product_image">Product Image <small class="text-danger">(Aspect ratio 7∶5 is preferred for best visualization)</small></label>
                                <input type="file" class="form-control" id="product_image" name="image">
                            </div>
                            {{--  Existing Image --}}
                            @if($product->image)
                                <div class="col-12">
                                    <img src="{{ asset('uploads/products/' . $product->image) }}" alt="{{ $product->title }}" class="img-fluid">
                                </div>
                            @endif
                            @error('image')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="product_image">Product Gallery <small class="text-danger">(Aspect ratio 7∶5 is preferred for best visualization)</small></label>
                                <input type="file" class="form-control" id="product_image" name="gallery[]" multiple>
                            </div>
                            {{--  Existing Multiple Image Gallery with cross button --}}
                          
                            @error('gallery')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                            @if($product->gallery)
                                @foreach ($product->gallery as $image)
                                    <div class="col-3" id="img-{{ $image->id }}">
                                        <img  src="{{ asset('uploads/products/gallery/' . $image->product_image) }}" alt="{{ $product->title }}" class="img-fluid">
                                        <a data-id="{{ $image->id }}" class="btn btn-danger btn-sm delete-gallery">
                                            <i data-feather="x"></i>
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        <div class="col-12">
                            <div class="form-group">
                                <label for="product_status">Product Status</label>
                                <select class="form-control select2" id="product_status" name="status">
                                    <option value="active" {{ $product->status == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ $product->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div> 
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary mr-1 mb-1">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('js')
    <script>
        $(document).ready(function(){

            $("body").on('click', '.delete-gallery', function(e){
                e.preventDefault();
                alert('Are you sure you want to delete this image?');
                var id = $(this).data('id');

             
                    $.ajax({
                        url: "{{ route('products.gallery.delete') }}",
                        type: 'POST',
                        data: {
                            "id": id,
                        },
                        success: function (){
                            // hide the div with data-id attribute 
                            $('#img-'+id).hide();
                        }
                    });
                });
            });
    </script>

@endpush
