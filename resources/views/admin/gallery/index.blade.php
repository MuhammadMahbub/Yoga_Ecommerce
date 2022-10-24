@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __("Gallery") }}
@endsection

{{-- Active Menu --}}
@section('admin.gallery.index')
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
                {{ __("Gallery") }}
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
                <h4 class="card-title">{{ __("Gallery List") }}</h4>
                <div>
                    <a href="{{ route('admin.gallery.create') }}" class="btn btn-success">+ Add new</a>
                    <button class="btn btn-primary waves-effect w-100 w-sm-auto" data-toggle="modal" data-target="#banner_setting" >
                        <i data-feather='settings'></i>
                        <span class="pl-50">{{ __("Banner setting") }}</span>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered data_table">
                        <thead>
                            <tr>
                                <th>{{ __("Sl") }}</th>
                                <th>{{ __("Actions") }}</th>
                                <th>{{ __("Title") }}</th>
                                <th>{{ __("Thumbnail") }}</th>
                                <th>{{ __("Banner image") }}</th>
                                <th>{{ __("Total image") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($galleries as $gallery)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>

                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-icon btn-outline-secondary waves-effect dropdown-toggle hide-arrow" data-toggle="dropdown" data-boundary="viewport">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{ route('admin.gallery.edit', $gallery->id) }}">
                                                    <i data-feather="edit" class="mr-50"></i>
                                                    {{ __("Edit") }}
                                                </a>
                                                <a class="dropdown-item" href="{{ route('admin.gallery.details',$gallery->id) }}">
                                                    <i data-feather="eye" class="mr-50"></i>
                                                    {{ __("View") }}
                                                </a>
                                                <button type="button" class="dropdown-item" data-toggle="modal" data-target="#deleteModal{{ $gallery->id }}">
                                                    <i data-feather="trash" class="mr-50"></i>
                                                    {{ __("Delete") }}
                                                </button>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <a href="{{ route('admin.gallery.details',$gallery->id) }}">
                                            {{ $gallery->title }}
                                        </a>
                                    </td>

                                    <td>
                                        <img src="{{ asset($gallery->thumbnail) }}" alt="Thumbnail image" width="100">
                                    </td>

                                    <td>
                                        <img src="{{ asset($gallery->banner_image) }}" alt="Thumbnail image" width="150">
                                    </td>

                                    <td>
                                        {{ $gallery->getImages->count() ?? 0 }}
                                    </td>
                                   
                                </tr>

                                @push('all_modals')
                                    <div class="modal fade" id="deleteModal{{ $gallery->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body text-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" style="font-size: 100px" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle text-danger">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <line x1="12" y1="8" x2="12" y2="12"></line>
                                                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                                    </svg>
                                                    <h2 class="font-weight-normal mt-1">{{ __('Are you sure?') }}?</h2>
                                                    <h4 class="font-weight-light mb-0">{{ __("You won't be able to revert this!") }}</h4>
                                                </div>
                                                <div class="modal-footer border-top-0 justify-content-center">
                                                    <button type="button" class="btn btn-outline-secondary waves-effect" data-dismiss="modal">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                                        </svg>
                                                        {{ __('Close') }}
                                                    </button>
                                                    <form action="{{ route('admin.gallery.delete', $gallery->id) }}" method="post">
                                                        @csrf
                                                        <button id="delete_all" class="btn btn-danger waves-effect waves-float waves-light">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                                            </svg>
                                                            {{ __('Delete') }}
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endpush
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

    @push('all_modals')
        <div class="modal fade" id="banner_setting" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un nouveau</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('admin.banner.update',$banner->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="title[en]">{{ __("Title") }} (EN) <small class="text-danger">*</small></label>
                                {{ app()->setLocale('en') }}
                                <input type="text" class="form-control" id="title[en]" name="title[en]" value="{{ $banner->title }}" >
                                {{ app()->setLocale(app()->getLocale()) }}
                            </div>
                            @error('title.en')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                            <div class="form-group">
                                <label for="title[fr]">{{ __("Title") }} (FR) <small class="text-danger">*</small></label>
                                {{ app()->setLocale('fr') }}
                                <input type="text" class="form-control" id="title[fr]" name="title[fr]" value="{{ $banner->title }}" >
                                {{ app()->setLocale(app()->getLocale()) }}
                            </div>
                            @error('title.fr')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                            
                            <div class="form-group">
                                <label for="image">{{ __("Image") }} <span class="text-warning">(Dimensions:1366 x 560)</span> <small class="text-danger">*</small></label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">{{ __("Choose Image") }}</label>
                                </div>
                            </div>
                            @error('image')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror

                            <img src="{{ asset($banner->image) }}" alt="Banner image" height="150">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Soumettre</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endpush
@endsection


@push('js')
    <script>
        @if($errors->has('title.fr') && $error->has('image'))
            $('#banner_setting').modal('show');
        @endif
    </script>
@endpush

