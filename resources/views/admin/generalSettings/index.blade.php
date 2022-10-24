@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __("General Settings") }}
@endsection

{{-- Active Menu --}}
@section('generalSettings')
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
                {{ __("General Settings") }}
            </li>
        </ol>
    </div>
@endsection

{{-- Page Content --}}
@section('content')
    <section >
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __("General Settings") }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('generalSettings.update', $generalSettings->id) }}" method="POST" class="form form-vertical" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="avatar avatar-xl">
                                            <img src="{{ asset('uploads/generalSettings') }}/{{ generalSettings()->logo }}" alt="avatar">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="logo">{{ __("Logo After Scroll") }}  </label>
                                        <div class="custom-file">
                                            <input type="file" name="logo" class="custom-file-input" id="logo">
                                            <label class="custom-file-label" for="logo">{{ __("Choose file") }}</label>
                                        </div>
                                        @error('logo')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="avatar avatar-xl">
                                            <img src="{{ asset('uploads/generalSettings') }}/{{ generalSettings()->logo_dark }}" alt="avatar">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="logo_dark">{{ __("Logo Before Scroll") }} </label>
                                        <div class="custom-file">
                                            <input type="file" name="logo_dark" class="custom-file-input" id="logo_dark">
                                            <label class="custom-file-label" for="logo_dark">{{ __("Choose File") }}</label>
                                        </div>
                                        @error('logo_dark')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="avatar avatar-xl">
                                            <img src="{{ asset('uploads/generalSettings') }}/{{ generalSettings()->favicon }}" alt="avatar">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="favicon">{{ __("Favicon") }} </label>
                                        <div class="custom-file">
                                            <input type="file" name="favicon" class="custom-file-input" id="favicon">
                                            <label class="custom-file-label" for="favicon">{{ __("Choose File") }}</label>
                                        </div>
                                        @error('favicon')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="address">{{ __("Address") }} <span class="text-danger">*</span></label>
                                        <input type="text" name="address" value="{{ generalSettings()->address }}" id="address" class="form-control" placeholder="{{ __("Enter Address") }}"/>
                                        @error('address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email">{{ __("Email address ") }}<span class="text-danger">*</span></label>
                                        <input type="text" name="email" value="{{ generalSettings()->email }}" id="email" class="form-control" placeholder="Enter email address"/>
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="phone">{{ __("Phone") }} <span class="text-danger">*</span></label>
                                        <input type="text" name="phone" value="{{ generalSettings()->phone }}" id="phone" class="form-control" placeholder="Enter phone number"/>
                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="copyright">{{ __("Copyright") }} <span class="text-danger">*</span></label>
                                        <input type="text" name="copyright" value="{{ generalSettings()->copyright }}" id="copyright" class="form-control" placeholder="Enter copyright"/>
                                        @error('copyright')
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
