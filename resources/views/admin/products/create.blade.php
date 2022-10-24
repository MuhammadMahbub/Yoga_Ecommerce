@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | Create Product
@endsection

{{-- Active Menu --}}
@section('productscreate')
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
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </div>
@endsection

{{-- Main Content --}}
@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create Product</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="product_name">Product title <small class="text-danger">*</small></label>
                                    <input type="text" value="{{ old('title') }}" class="form-control" id="product_name" name="title" placeholder="Product Name">
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
                                    <input type="text" value="{{ old('price') }}" class="form-control" id="product_price" name="price" placeholder="Product Price">
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
                                    <input value="{{ old('quantity') }}" type="text" class="form-control" id="product_quantity" name="quantity" placeholder="Product Quantity">
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
                                    <input type="text" class="form-control" value="{{ old('discount') }}" id="product_discount" name="discount" placeholder="Product discount">
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
                                    <input type="text" class="form-control" value="{{ old('sku') }}" id="product_sku" name="sku" placeholder="Product sku">
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
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                        <input id="short_description" value="{{ old('short_description') }}" type="hidden" name="short_description">
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
                                        <input id="long_description" value="{{ old('long_description') }}" type="hidden" name="long_description">
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
                                    <label for="single_product_image">Product Image <small class="text-danger">(Aspect ratio 7∶5 is preferred for best visualization)</small></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="single_product_image" name="image">
                                        <label class="custom-file-label" for="single_product_image">Choose Image</label>
                                    </div>
                                </div>
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
                                    <label for="multiple_product_image">Product Gallery <small class="text-danger">(Aspect ratio 7∶5 is preferred for best visualization)</small></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="multiple_product_image" name="gallery[]" multiple>
                                        <label class="custom-file-label" for="multiple_product_image">Choose Images</label>
                                    </div>
                                </div>
                                @error('gallery')
                                    <div class="alert alert-danger">
                                        <div class="alert-body">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="product_status">Product Status</label>
                                    <select class="form-control select2" id="product_status" name="status">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div> 
                            <div class="col-12">
                                <button type="submit" class="btn btn-success waves-effect waves-float waves-light w-100 w-sm-auto">Submit</button>
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

            $("#product_category").change(function(){
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

        });
    </script>

@endpush
