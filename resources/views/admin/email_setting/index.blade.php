@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __("About Us") }}
@endsection

{{-- Active Menu --}}
@section('admin.email.setting.index')
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
                <h4 class="card-title">{{ __("Update Email setting") }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.email.setting', $mail->id) }}" method="POST" enctype="multipart/form-data" class="form form-vertical">
                    @csrf
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mailer">{{ __("Mailer") }} <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $mail->mailer }}" name="mailer" id="mailer" class="form-control">
                            </div>
                            @error('mailer')
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="host">{{ __("Host") }} <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $mail->host }}" name="host" id="host" class="form-control">
                            </div>
                            @error('host')
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="port">{{ __("Port") }} <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $mail->port }}" name="port" id="port" class="form-control">
                            </div>
                            @error('port')
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">{{ __("User name") }} <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $mail->username }}" name="username" id="username" class="form-control">
                            </div>
                            @error('username')
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">{{ __("Password") }} <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $mail->password }}" name="password" id="password" class="form-control">
                            </div>
                            @error('password')
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="encryption">{{ __("Encryption") }} <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $mail->encryption }}" name="encryption" id="encryption" class="form-control">
                            </div>
                            @error('encryption')
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="from_email">{{ __("Email from address") }} <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $mail->from_email }}" name="from_email" id="from_email" class="form-control">
                            </div>
                            @error('from_email')
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="from_name">{{ __("Email from name") }} <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $mail->from_name }}" name="from_name" id="from_name" class="form-control">
                            </div>
                            @error('from_name')
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
