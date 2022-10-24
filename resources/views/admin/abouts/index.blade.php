@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __("About Us") }}
@endsection

{{-- Active Menu --}}
@section('about.index')
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
                {{ __("About Us") }}
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
                <h4 class="card-title">{{ __("Update About us") }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('about.update', $about->id) }}" method="POST" enctype="multipart/form-data" class="form form-vertical">
                    @csrf
                    @method("PUT")
                    <div class="row">

                        <div class="col-12">
                            <div class="form-group">
                                <label for="banner_title[fr]">{{ __("Banner Title") }}(FR)<span class="text-danger">*</span></label>
                                {{ app()->setLocale('fr') }}
                                <input type="text" value="{{ $about->banner_title }}" name="banner_title[fr]" id="banner_title[fr]" class="form-control">
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
                                <input type="text" value="{{ $about->banner_title }}" name="banner_title[en]" id="banner_title[en]" class="form-control">
                                {{ app()->setLocale($current_locale) }}
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for=""> {{ __('Previous  Banner') }} </label>
                                <img src="{{ asset('uploads/abouts') }}/{{ $about->banner_image }}" alt="not found" width="200">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="banner_image" name="banner_image">
                                    <label class="custom-file-label" for="banner_image">{{ __("Choose Banner Image") }} </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for=""> {{ __('Preview Photo') }} </label>
                                <img width="200" id="output_banner">
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
                            <div class="form-group">
                                <label for="title[fr]">{{ __("About Us Title") }}(FR)<span class="text-danger">*</span></label>
                                {{ app()->setLocale('fr') }}
                                <input type="text" value="{{ $about->title }}" name="title[fr]" id="title[fr]" class="form-control">
                                {{ app()->setLocale($current_locale) }}
                            </div>
                            @error('title.fr')
                            <div class="alert alert-danger" role="alert">
                                <div class="alert-body">
                                    {{ $message }}
                                </div>
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="title[en]">{{ __("About Us Title") }}(EN)</label>
                                {{ app()->setLocale('en') }}
                                <input type="text" value="{{ $about->title }}" name="title[en]" id="title[en]" class="form-control">
                                {{ app()->setLocale($current_locale) }}
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="description[fr]">{{ __("Description") }}(FR)<span class="text-danger">*</span></label>
                                {{ app()->setLocale('en') }}
                                <input type="hidden" name="description[fr]" id="description[fr]" class="form-control"  value="{{ $about->description }}">
                                <trix-editor input="description[fr]"></trix-editor>
                                {{ app()->setLocale($current_locale) }}
                            </div>
                            @error('description.fr')
                            <div class="alert alert-danger" role="alert">
                                <div class="alert-body">
                                    {{ $message }}
                                </div>
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="description[en]">{{ __("Description") }}(EN)</label>
                                {{ app()->setLocale('en') }}
                                <input type="hidden" name="description[en]" id="description[en]" class="form-control"  value="{{ $about->description }}">
                                <trix-editor input="description[en]"></trix-editor>
                                {{ app()->setLocale($current_locale) }}
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for=""> {{ __('Previous Photo') }} </label>
                                <img src="{{ asset('uploads/abouts') }}/{{ $about->image }}" alt="not found" width="200">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">{{ __("Choose About Us Image") }} </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for=""> {{ __('Preview Photo') }} </label>
                                <img width="200" id="output">
                            </div>
                            @error('image')
                            <div class="alert alert-danger" role="alert">
                                <div class="alert-body">
                                    {{ $message }}
                                </div>
                            </div>
                            @enderror
                        </div>
                        {{-- <div class="col-12">
                            <div class="form-group">
                                <label for="meta_title"> Meta title </label>
                                <input type="text" value="{{ old('meta_title') }}" class="form-control" id="title" name="meta_title" placeholder="Blog Meta Title">
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
                                <label for="meta_keyword"> Meta keywords</label>
                                <input type="text" value="{{ old('meta_keyword') }}" class="form-control" id="keywords" name="meta_keyword" placeholder="Blog Meta keywords">
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
                                <label for="meta_description"> Meta description </label>
                               <textarea class="form-control" name="meta_description" id="meta_description" cols="30" rows="10" placeholder="Blog Meta Description"></textarea>
                            </div>
                            @error('meta_description')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div> --}}

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
        document.getElementById('image').onchange = function() {
            var src = URL.createObjectURL(this.files[0])
            document.getElementById('output').src = src
        },
        document.getElementById('banner_image').onchange = function() {
            var src = URL.createObjectURL(this.files[0])
            document.getElementById('output_banner').src = src
        }
    </script>
@endsection
