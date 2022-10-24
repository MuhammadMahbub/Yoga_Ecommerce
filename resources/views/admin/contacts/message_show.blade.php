@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __("Contact Message") }}
@endsection

{{-- Active Menu --}}
@section('message')
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
                {{ __("Contact Message") }}
            </li>
        </ol>
    </div>
@endsection

{{-- Main Content --}}
@section('content')

<div class="content-body">
    <!-- app e-commerce details start -->
    <section class="app-ecommerce-details">
        <div class="card">
            <!-- Product Details starts -->
            <div class="card-body">
                <div class="row my-2">

                    <div class="col-12 col-md-7">
                        <h4>{{ __("Name") }}: <small>{{ $message->name }}</small></h4>
                        <h4>{{ __("Email") }}: <small>{{ $message->email }}</small></h4>
                        <h4>{{ __("Phone") }}: <small>{{ $message->phone ?? 'N/A'}}</small></h4>
                        <h4>{{ __("Address") }}: <small>{{ $message->Address ?? 'N/A'}}</small></h4>


                        <hr />

                        <h4>{{ __("Message") }} </h4>
                        <hr />
                        <p class="card-text">
                            <div>
                                {!! $message->message !!}
                            </div>

                        </p>
                        <div class="d-flex flex-column flex-sm-row pt-1">

                            <form action="{{ route('message.destroy', $message->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger  mr-0 mr-sm-1 mb-1 mb-sm-0">
                                    <i data-feather="trash-2" class="mr-50"></i>
                                    <span>{{ __("Delete") }}</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- app e-commerce details end -->

</div>

@endsection

