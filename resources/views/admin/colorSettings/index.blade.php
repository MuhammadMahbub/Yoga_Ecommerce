@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __("Color Settings") }}
@endsection

{{-- Active Menu --}}
@section('colorSettings')
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
                {{ __("Color Settings") }}
            </li>
        </ol>
    </div>
@endsection

{{-- Page Content --}}
@section('content')
    <section id="basic-vertical-layouts">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __("Color Settings") }}</h4>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('colorSettings.update', $colorSettings->id) }}" method="POST" class="form form-vertical">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="menu_text_color">{{ __("Theme Color") }}/ {{ ("Menu Text Color") }}</label>
                                        <input type="color" name="menu_text_color" value="{{ colorSettings()->menu_text_color }}" id="menu_text_color" class="form-control"/>
                                        @error('menu_text_color')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="body_title_color">{{ __("Body Title Color") }}</label>
                                        <input type="color" name="body_title_color" value="{{ colorSettings()->body_title_color }}" id="body_title_color" class="form-control"/>
                                        @error('body_title_color')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="body_text_color">{{ __("Body Text Color") }}</label>
                                        <input type="color" name="body_text_color" value="{{ colorSettings()->body_text_color }}" id="body_text_color" class="form-control"/>
                                        @error('body_text_color')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="button_color">{{ __("Button Color") }}</label>
                                        <input type="color" name="button_color" value="{{ colorSettings()->button_color }}" id="button_color" class="form-control"/>
                                        @error('button_color')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="button_hover_color">{{ __("Button Hover Color") }}</label>
                                        <input type="color" name="button_hover_color" value="{{ colorSettings()->button_hover_color }}" id="button_hover_color" class="form-control"/>
                                        @error('button_hover_color')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="bg_color">{{ __("Background Color") }}</label>
                                        <input type="color" name="bg_color" value="{{ colorSettings()->bg_color }}" id="bg_color" class="form-control"/>
                                        @error('bg_color')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="secondary_bg_color">{{ __("Secondary Background Color") }}</label>
                                        <input type="color" name="secondary_bg_color" value="{{ colorSettings()->secondary_bg_color }}" id="secondary_bg_color" class="form-control"/>
                                        @error('secondary_bg_color')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary waves-effect waves-float waves-light w-100 w-sm-auto">{{ __("Update") }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
