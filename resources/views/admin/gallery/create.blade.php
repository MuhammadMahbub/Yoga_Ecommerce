@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __("Gallery") }}
@endsection

{{-- Active Menu --}}
@section('admin.gallery.index')
    active
@endsection


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
                <form action="{{ route('admin.gallery.store') }}" method="post" enctype="multipart/form-data" class="form form-vertical">
                    @csrf
                    <div class="row">

                        <div class="col-12">
                            <div class="form-group">
                                <label for="title">{{ __('Title') }} </label>
                                <input type="text" name="title" id="title" class="form-control">
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

