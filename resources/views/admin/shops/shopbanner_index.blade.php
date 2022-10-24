@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __("Banner") }}
@endsection

{{-- Active Menu --}}
@section('shopbanner.index')
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
            <li class="breadcrumb-item active">
                {{ __("Banner") }}
            </li>
        </ol>
    </div>
@endsection

{{-- Main Content --}}
@section('content')

<div class="row">
    <div class="col-md-12 col-12 m-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __("Update Banner") }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('shopbanner.update', $shopbanner->id) }}" method="POST" enctype="multipart/form-data" class="form form-vertical">
                    @csrf
                    @method("PUT")
                    <div class="row">

                        <div class="col-12">
                            <div class="form-group">
                                <label for="banner_title[fr]">{{ __("Banner Title") }}(FR)<span class="text-danger">*</span></label>
                                {{ app()->setLocale('fr') }}
                                <input type="text" value="{{ $shopbanner->banner_title }}" name="banner_title[fr]" id="banner_title[fr]" class="form-control">
                                {{ app()->setLocale($current_locale) }}
                            </div>
                            @error('banner_title.fr')
                            <div class="alert alert-danger" role="alert">
                                <div class="alert-body">
                                    {{ $message }}
                                </div>
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="banner_title[en]">{{ __("Banner Title") }}(EN)</label>
                                {{ app()->setLocale('en') }}
                                <input type="text" value="{{ $shopbanner->banner_title }}" name="banner_title[en]" id="banner_title[en]" class="form-control">
                                {{ app()->setLocale($current_locale) }}
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for=""> {{ __('Previous  Banner') }} </label>
                                <img src="{{ asset('uploads/shops') }}/{{ $shopbanner->banner_image }}" alt="not found" width="200">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for=""> {{ __('Choose Banner Image') }} </label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="banner_image" name="banner_image">
                                    <label class="custom-file-label" for="banner_image">{{ __("Choose Banner Image") }} </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for=""> {{ __('Preview Photo') }} </label>
                                <img width="200" id="output">
                            </div>
                            @error('banner_image')
                            <div class="alert alert-danger" role="alert">
                                <div class="alert-body">
                                    {{ $message }}
                                </div>
                            </div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary mr-1">{{ __('Update') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
    <script>
        document.getElementById('banner_image').onchange = function() {
            var src = URL.createObjectURL(this.files[0])
            document.getElementById('output').src = src
        }
    </script>
@endsection
