@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __("Contact Page") }}
@endsection

{{-- Active Menu --}}
@section('contacts')
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
                {{ __("Contact Page") }}
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
                <h4 class="card-title">{{ __("Update Contact Page") }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('contacts.update', $contacts->id) }}" method="POST" enctype="multipart/form-data" class="form form-vertical">
                    @csrf
                    @method("PUT")
                    <div class="row">

                        <div class="col-12">
                            <div class="form-group">
                                <label for="banner_title[fr]">{{ __("Banner Title") }}(FR)<span class="text-danger">*</span></label>
                                {{ app()->setLocale('fr') }}
                                <input type="text" value="{{ $contacts->banner_title }}" name="banner_title[fr]" id="banner_title[fr]" class="form-control">
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
                                <label for="banner_title[en]">{{ __("Banner Title") }}(En)</label>
                                {{ app()->setLocale('en') }}
                                <input type="text" value="{{ $contacts->banner_title }}" name="banner_title[en]" id="banner_title[en]" class="form-control">
                                {{ app()->setLocale($current_locale) }}
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for=""> {{ __('Previous  Banner') }} </label>
                                <img src="{{ asset('uploads/contacts') }}/{{ $contacts->banner_image }}" alt="not found" width="200">
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
                            <div class="form-group">
                                <label for="title[fr]">{{ __("Contact Title") }}(FR)<span class="text-danger">*</span></label>
                                {{ app()->setLocale('fr') }}
                                <input type="text" value="{{ $contacts->title }}" name="title[fr]" id="title[fr]" class="form-control">
                                {{ app()->setLocale($current_locale) }}
                            </div>
                            @error('title.fr')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                            <div class="form-group">
                                <label for="title[en]">{{ __("Contact Title") }}(EN)</label>
                                {{ app()->setLocale('en') }}
                                <input type="text" value="{{ $contacts->title }}" name="title[en]" id="title[en]" class="form-control">
                                {{ app()->setLocale($current_locale) }}
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="email">{{ __("Email") }}</label>
                                <input type="email" value="{{ $contacts->email }}" name="email" id="email" class="form-control">
                            </div>
                            @error('email')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="phone">{{ __("Phone") }}</label>
                                <input type="text" value="{{ $contacts->phone }}" name="phone" id="phone" class="form-control">
                            </div>
                            @error('phone')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="address">{{ __("Address") }}<span class="text-danger">*</span></label>
                                <input type="text" value="{{ $contacts->address }}" name="address" id="address" class="form-control">
                            </div>
                            @error('address')
                                <div class="alert alert-danger">
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
