@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __("Users") }}
@endsection

{{-- Active Menu --}}
@section('usersList')
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
                {{ __("Users") }}
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
                <h4 class="card-title">{{ __("User List") }}</h4>
                <a href="{{ route('role.index') }}" class="btn btn-success">Role</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered data_table">
                        <thead>
                            <tr>
                                <th>{{ __("Sl") }}</th>
                                <th>{{ __("Name") }}</th>
                                <th>{{ __("Email") }}</th>
                                <th>{{ __("Role") }}</th>
                                <th>{{ __("Actions") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->getRole->name ?? "No Role" }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-icon btn-outline-secondary waves-effect dropdown-toggle hide-arrow" data-toggle="dropdown" data-boundary="viewport">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('users.edit', $user->id) }}">
                                                <i data-feather="edit" class="mr-50"></i>
                                                {{ __("Edit") }}
                                            </a>
                                            <a class="dropdown-item" href="{{ route('users.details', $user->id) }}">
                                                <i data-feather="eye" class="mr-50"></i>
                                                {{ __("Details") }}
                                            </a>
                                            <a class="dropdown-item" href="{{ route('users.destroy', $user->id) }}">
                                                <i data-feather="trash" class="mr-50"></i>
                                                {{ __("Delete") }}
                                            </a>
                                        </div>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
