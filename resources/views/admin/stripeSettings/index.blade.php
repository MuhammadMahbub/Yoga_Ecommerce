@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __("Stripe Settings") }}
@endsection

{{-- Active Menu --}}
@section('stripe.index')
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
                {{ __("Stripe Settings") }}
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
                        <h4 class="card-title">{{ __("Stripe Settings") }}</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.stripe.store') }}" method="POST" class="form form-vertical">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="stripe_key">{{ __("Stripe Key") }}</label>
                                        <input type="text" name="stripe_key" value="{{ $stripe->stripe_key ?? old('stripe_key') }}" id="stripe_key" class="form-control"/>
                                        @error('stripe_key')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="stripe_secret">{{ __("Stripe Secret") }}</label>
                                        <input type="text" name="stripe_secret" value="{{ $stripe->stripe_secret ?? old('stripe_secret') }}" id="stripe_secret" class="form-control"/>
                                        @error('stripe_secret')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                @if (havePermission('stripe','edit'))
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary waves-effect waves-float waves-light w-100 w-sm-auto">{{ __("Update") }}</button>
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
@endsection
