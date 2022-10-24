@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __("Users") }}
@endsection

{{-- Active Menu --}}
@section('usersCreate')
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
            <li class="breadcrumb-item ">{{ __("Users") }}</li>
            <li class="breadcrumb-item active">{{ __("Create") }}</li>
        </ol>
    </div>
@endsection

@section('content')
   <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __("Create User") }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.store') }}" class="form form-vertical" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">{{ __("Name") }} <span class="text-danger">*</span></label>
                                    <input type="text" id="name" class="form-control" name="name" placeholder="{{ __("Name") }}" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email">{{ __("Email") }} <span class="text-danger">*</span></label>
                                    <input type="text" id="email" class="form-control" name="email" placeholder="{{ __("Email") }}" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="password">{{ __("Password") }} <span class="text-danger">*</span></label>
                                    <input type="text" id="password" class="form-control" name="password" placeholder="{{ __("Password") }}" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="password">{{ __("Role") }} <span class="text-danger">*</span></label>
                                    <select name="role_id" id="role_id" class="form-control select2">
                                        <option value="">-Select-</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary waves-effect waves-float waves-light w-100 w-sm-auto">{{ __("Submit") }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
   </div>
@endsection
