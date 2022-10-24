@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __("Gallery") }}
@endsection

{{-- Active Menu --}}
@section('admin.gallery.index')
    active
@endsection


{{-- Active Menu --}}
@push('css')
<style>
    .tagify{
        border-radius: 0.357rem;
    }
    html:is(.dark-layout) .tagify{
        --tags-border-color: #404656;
        --tags-hover-border-color: #404656;
    }

    .image-container{
        position: relative;
        border: 1px solid #d8d6de;
        margin-bottom: 15px;
    }
    .image-container__image{
        max-height: 260px;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .image-container__btn{
        position: absolute;
        top: 5px;
        right: 5px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        border: 0;
        background-color: #ea5455;
        color: #ffffff;
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
                {{ __("Gallery") }}
            </li>
        </ol>
    </div>
@endsection

{{-- Main Content --}}
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __("Gallery Create") }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.gallery.update',$gallery->id) }}" method="post" enctype="multipart/form-data" class="form form-vertical">
                    @csrf
                    <div class="row">

                        <div class="col-12">
                            <div class="form-group">
                                <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ $gallery->title }}">
                            </div>
                            @error('title')
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6">

                            <img src="{{ asset($gallery->banner_image) }}" alt="Banner image" width="250" class="mb-1">
                            <div class="form-group">
                                <label for="banner_image">{{ __('Banner image') }} <small class="text-warning">Dimension: 1366 x 560</small>  <span class="text-danger">*</span></label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="banner_image" name="banner_image">
                                    <label class="custom-file-label" for="banner_image">{{ __("Choose Image") }} </label>
                                </div>
                            </div>
                            @error('banner_image')
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <img src="{{ asset($gallery->thumbnail) }}" alt="Banner image" width="100" class="mb-1">

                            <div class="form-group">
                                <label for="thumbnail">{{ __('Thumbnail') }}<span class="text-danger">*</span></label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail">
                                    <label class="custom-file-label" for="thumbnail">{{ __("Choose Image") }} </label>
                                </div>
                            </div>
                            @error('thumbnail')
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <label for="gallery_images">{{ __('Galley images') }} <span class="text-danger">*</span></label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="gallery_images" name="gallery_images[]" multiple>
                                    <label class="custom-file-label" for="gallery_images">{{ __("Choose Image") }} </label>
                                </div>
                            </div>
                            @error('gallery_images')
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="row">
                                @foreach ($gallery->getImages as $moreImage)
                                    <div class="col-lg-3 col-md-4 col-sm-6 image-container-wrapper">
                                        <div class="image-container">
                                            <img src="{{ asset($moreImage->image)}}" alt="preview image" class="image-container__image">
                                            <button type="button" class="image-container__btn" data-id="{{ $moreImage->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary mr-1">{{ __('Submit') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@push('js')
    <script>
        $(document).ready(function () {
            $(document).on("click", ".image-container__btn", function(){
                $(this).closest(".image-container-wrapper").fadeOut("normal", function(){
                    $(this).remove();
                })

                let id = $(this).attr('data-id');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('admin.gallery.image.delete') }}",
                    type: "post",
                    data: {
                        id:id,
                    },
                    success: function (response) {
                        
                    }
                });


            });
        });
    </script>
@endpush

