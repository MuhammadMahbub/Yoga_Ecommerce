@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __("Shop") }}
@endsection

{{-- Active Menu --}}
@section('shop.index')
    active
@endsection

@push('css')

<style>
    .edit-thumb-preview{
        position: relative;
    }
    .edit-thumb-preview__btn{
        position: absolute;
        top: 10%;
        right: 10%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        border: 0;
        border-radius: 50%;
        color: #ffffff;
        background-color: #ea5455;
        transition: box-shadow 0.15s ease-in-out;
    }
    .edit-thumb-preview__img{
        max-width: 100%;
        max-height: 150px;
    }
    .edit-thumb-preview__btn:is(:hover, :active){
        box-shadow: 0 8px 25px -8px #ea5455;
    }
</style>

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
                {{ __("Shop") }}
            </li>
        </ol>
    </div>
@endsection

{{-- Main Content --}}
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-block d-sm-flex">
                <h4 class="card-title">{{ __("Shop List") }} ({{ $shops->count() }})</h4>
                <div class="button-group-spacing">
                    @if (havePermission('shop','import'))
                        <button class="btn btn-success waves-effect w-100 w-sm-auto" data-toggle="modal" data-target="#csvImportModal">+ {{ __("Import") }}</button>
                    @endif

                    @if (havePermission('shop','create'))
                        <button class="btn btn-warning waves-effect w-100 w-sm-auto" data-toggle="modal" data-target="#add_shop_modal">+ {{ __("Create Shop") }}</button>
                    @endif
                    <div id="all_actions" class="dropdown w-100 w-sm-auto d-none">
                        <button class="btn btn-info w-100 w-sm-auto dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __("All Action") }}
                        </button>
                        <div class="dropdown-menu dropdown-menu-right w-100">
                            @if (havePermission('shop','delete'))
                                <button class="dropdown-item" data-toggle="modal" data-target="#deleteModal">{{ __("Delete") }}</button>
                                @push('all_modals')
                                    <!-- Bulk Delete Modal -->
                                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                    <button id="delete_all" class="btn btn-danger waves-effect waves-float waves-light">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                                        </svg>
                                                        {{ __('Delete') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endpush
                            @endif

                            @if (havePermission('shop','export'))
                                <form action="#" method="POST">
                                    @csrf
                                    <input type="hidden" id="export_all" name="id">
                                    <button type="submit" class="dropdown-item">{{ __("Export") }}</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
                @push('all_modals')
                    <!-- Add Shop Modal -->
                    @if (havePermission('shop','create'))
                        <div class="modal fade" id="add_shop_modal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{ __("Add a Shop") }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('shop.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="category_id">{{ __("Category") }} <span class="text-danger">*</span></label>
                                                <select name="category_id" id="category_id" class="form-control">
                                                    <option selected disabled value="">{{ __("Select Category") }}</option>
                                                    @foreach (categories() as $cat)
                                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('category_id')
                                            <div class="alert alert-danger" role="alert">
                                                <div class="alert-body">
                                                    {{ $message }}
                                                </div>
                                            </div>
                                            @enderror
                                            <div class="form-group">
                                                <label for="name[fr]">{{ __("Name") }}(FR) <span class="text-danger">*</span></label>
                                                <input type="text" value="{{ old('name.fr') }}" name="name[fr]" id="name[fr]" class="form-control">
                                            </div>
                                            @error('name.fr')
                                            <div class="alert alert-danger" role="alert">
                                                <div class="alert-body">
                                                    {{ $message }}
                                                </div>
                                            </div>
                                            @enderror
                                            <div class="form-group">
                                                <label for="name[en]">{{ __("Name") }}(EN) </label>
                                                <input type="text" value="{{ old('name.en') }}" name="name[en]" id="name[en]" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="description[fr]">{{ __("Description") }}(FR) <span class="text-danger">*</span></label>
                                                <input type="hidden" name="description[fr]" id="description[fr]" class="form-control"  value="{{ old('description.fr') }}">
                                                <trix-editor input="description[fr]"></trix-editor>
                                            </div>
                                            @error('description.fr')
                                            <div class="alert alert-danger" role="alert">
                                                <div class="alert-body">
                                                    {{ $message }}
                                                </div>
                                            </div>
                                            @enderror
                                            <div class="form-group">
                                                <label for="description[en]">{{ __("Description") }} (EN)</label>
                                                <input type="hidden" name="description[en]" id="description[en]" class="form-control"  value="{{ old('description.en') }}">
                                                <trix-editor input="description[en]"></trix-editor>
                                            </div>

                                            <div class="form-group">
                                                <label for="thick">{{ __("Thick") }}(mm)<span class="text-danger">*</span></label>
                                                <input type="number" value="{{ old('thick') }}" name="thick" id="thick" class="form-control">
                                            </div>
                                            @error('thick')
                                            <div class="alert alert-danger" role="alert">
                                                <div class="alert-body">
                                                    {{ $message }}
                                                </div>
                                            </div>
                                            @enderror
                                            <div class="form-group">
                                                <label for="price">{{ __("Price") }}($)<span class="text-danger">*</span></label>
                                                <input type="number" value="{{ old('price') }}" name="price" id="price" class="form-control">
                                            </div>
                                            @error('price')
                                            <div class="alert alert-danger" role="alert">
                                                <div class="alert-body">
                                                    {{ $message }}
                                                </div>
                                            </div>
                                            @enderror

                                            <div class="form-group">
                                                <label for=""> {{ __('Choose Shop Image') }}<span class="text-danger">*</span> </label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="image" name="image">
                                                    <label class="custom-file-label" for="image">{{ __("Choose Shop Image") }}</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for=""> {{ __('Preview Image') }} </label>
                                                <img width="200" id="output">
                                            </div>
                                            @error('image')
                                            <div class="alert alert-danger" role="alert">
                                                <div class="alert-body">
                                                    {{ $message }}
                                                </div>
                                            </div>
                                            @enderror
                                            <div class="form-group">
                                                <label for=""> {{ __('Choose Thumb Images') }} <span class="text-danger">*</span>(size: 118*118px)</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="thumb_image" name="thumb_image[]" multiple>
                                                    <label class="custom-file-label" for="thumb_image">{{ __('Choose Thumb Images') }} </label>
                                                </div>
                                            </div>
                                            @error('thumb_image')
                                            <div class="alert alert-danger" role="alert">
                                                <div class="alert-body">
                                                    {{ $message }}
                                                </div>
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="meta_title"> {{ __("Meta Kitle") }} </label>
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
                                                <label for="meta_keyword"> {{ __("Meta Keywords") }}</label>
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
                                                <label for="meta_description"> {{ __("Meta Description") }} </label>
                                               <textarea class="form-control" name="meta_description" id="meta_description" cols="30" rows="5" placeholder="Blog Meta Description"></textarea>
                                            </div>
                                            @error('meta_description')
                                                <div class="alert alert-danger">
                                                    <div class="alert-body">
                                                        {{ $message }}
                                                    </div>
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __("Close") }}</button>
                                            <button type="submit" class="btn btn-primary">{{ __("Submit") }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                    <!-- CSV Import Modal -->
                    <div class="modal fade" id="csvImportModal" tabindex="-1" role="dialog" aria-labelledby="csvImportModalTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content position-relative">
                                <form action="#" method="POST" id="importShopForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">{{ __("Import Categories") }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group my-2">
                                            <p class="form-label">{{ __("Import Categories") }}</p> <span id="importError" class="text-danger"></span>
                                            <div class="custom-file cursor-pointer">
                                                <input type="file" name="file" id="importCategory"class="custom-file-input" required>
                                                <label class="custom-file-label">{{ __('Choose File') }} ...</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered"  width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    {{ __('Table Header ') }}
                                                                </th>
                                                                <th>
                                                                    {{ __('CSV Header') }}
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="categoryCsvHeader">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                                        <button type="submit" id="importSubmitButton" class="btn btn-primary">{{ __('Save Changes') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endpush
            </div>
            <div class="card-body">
                <form action="{{ route('shop.date.filter') }}" method="GET">
                    <div class="row align-items-end">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="start_date">{{ __("Start Date") }} <span class="text-danger">*</span></label>
                                <input type="date" name="start_date" @isset(request()->start_date) value="{{ \Carbon\Carbon::parse(request()->start_date)->format('Y-m-d') }}" @endisset id="start_date" class="form-control flatpickr-human-friendly" placeholder="dd/mm/yyyy">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="start_date">{{ __("End Date") }} <span class="text-danger">*</span></label>
                                <input type="date" @isset(request()->start_date) value="{{ \Carbon\Carbon::parse(request()->end_date)->format('Y-m-d') }}" @endisset name="end_date" id="end_date" class="form-control flatpickr-human-friendly" placeholder="dd/mm/yyyy">
                            </div>
                        </div>
                        <div class="col-md-auto">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success waves-effect w-100 w-sm-auto">{{ __("Filter") }}</button>
                                @if(Route::is('shop.date.filter'))
                                <a href="{{ route('shop.index') }}" class="btn btn-danger waves-effect mt-1 mt-sm-0 w-100 w-sm-auto">{{ __("Clear") }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-md-center">
                        <div class="col-md">
                            <div class="form-group mb-md-0">
                                <div class="input-group">
                                    <input type="search" class="form-control table_search" placeholder="Search Here">
                                    <div class="input-group-append">
                                      <span class="input-group-text">
                                        <i data-feather='search'></i>
                                      </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include( 'includes.pagination', ['variables' => $shops, 'pagination_col_class' => 'col-md-auto', 'data_variables' => ['start_date' => request()->start_date,'end_date' => request()->end_date]])
                    </div>
                </form>
                <div class="table-responsive mt-2">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input main_checkbox" id="all-select">
                                        <label class="custom-control-label" for="all-select"></label>
                                    </div>
                                </th>
                                <th>{{ __("Actions") }}</th>
                                <th>{{ __("Name") }}</th>
                                <th>{{ __("Category") }}</th>
                                <th>{{ __("Price") }}</th>
                                <th>{{ __("Thickness") }}</th>
                                <th>{{ __("Description") }}</th>
                                <th>{{ __("Shop Image") }}</th>
                                <th>{{ __("Created By") }}</th>
                                <th>{{ __("Updated By") }}</th>
                                <th>{{ __("Created At") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shops as $shop)
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input all_checkbox" name="select_individual[]" id="single-select-{{ $shop->id }}">
                                            <label class="custom-control-label" for="single-select-{{ $shop->id }}"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-icon btn-outline-secondary waves-effect dropdown-toggle hide-arrow" data-toggle="dropdown" data-boundary="viewport">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                @if (havePermission('shop','edit'))
                                                    <button data-toggle="modal" data-target="#edit_shop_{{ $shop->id }}" class="dropdown-item">
                                                        <i data-feather='edit'></i>
                                                        Edit
                                                    </button>
                                                @endif

                                                @if (havePermission('shop','delete'))
                                                    {{-- <form action="{{ route('banner.destroy', $banner->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item">
                                                            <i data-feather="trash" class="mr-50"></i>
                                                            Delete
                                                        </button>
                                                    </form> --}}
                                                    <a class="dropdown-item" data-toggle="modal" data-target="#deleteModal_{{ $shop->id }}" title="Delete">
                                                        <i data-feather="trash" class="mr-50"></i>
                                                        <span>{{ __('Delete') }}</span>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td><a href="{{ route('shop.show',  $shop->id) }}">{{ $shop->name }}</a></td>
                                    <td>{{ $shop->get_category->name }}</td>
                                    <td>${{ $shop->price }}</td>
                                    <td>{{ $shop->thick }}mm</td>
                                    <td>{!! Str::limit($shop->description, 60) !!}</td>
                                    <td>
                                        <a href="{{ route('shop.show',  $shop->id) }}"><img src="{{ asset('uploads/shops') }}/{{ $shop->image }}" alt="" width="200"></a>
                                    </td>
                                    @if($shop->created_by)
                                        <td>
                                            <div class="avatar mr-50" data-toggle="tooltip" title="{{ $shop->creator->name }}">
                                                <img src="{{ $shop->creator->profile_photo_url }}" alt="avatar" width="32" height="32">
                                            </div>
                                            {{ $shop->creator->name }}
                                        </td>
                                    @else
                                        <td>-</td>
                                    @endif
                                    @if($shop->updated_by)
                                        <td>
                                            <div class="avatar mr-50" data-toggle="tooltip" title="{{ $shop->modifier->name }}">
                                                <img src="{{ $shop->modifier->profile_photo_url }}" alt="avatar" width="32" height="32">
                                            </div>
                                            {{ $shop->modifier->name }}
                                        </td>
                                    @else
                                        <td>-</td>
                                    @endif
                                    <td>{{ $shop->created_at->diffForHumans() }}</td>
                                </tr>
                                @push('all_modals')
                                    <!--Edit Modal -->
                                    @if (havePermission('shop','edit'))
                                        <div class="modal fade" id="edit_shop_{{ $shop->id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">{{ __("Update Shop") }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('shop.update', $shop->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="category_id_edit">{{ __("Category") }} <span class="text-danger">*</span></label>
                                                            <select name="category_id_edit" id="category_id_edit" class="form-control">
                                                                <option selected disabled value="">{{ __("Select Category") }}</option>
                                                                @foreach (categories() as $category)
                                                                    <option value="{{ $category->id }}" {{ $shop->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        @error('category_id_edit')
                                                        <div class="alert alert-danger" role="alert">
                                                            <div class="alert-body">
                                                                {{ $message }}
                                                            </div>
                                                        </div>
                                                        @enderror
                                                        <div class="form-group">
                                                            <label for="name_edit[fr]">{{ __("Name") }}(FR)<span class="text-danger">*</span></label>
                                                            {{ app()->setLocale('fr') }}
                                                            <input type="text" value="{{ $shop->name }}" name="name_edit[fr]" id="name_edit[fr]" class="form-control">
                                                            {{ app()->setLocale($current_locale) }}
                                                        </div>
                                                        @error('name_edit.fr')
                                                        <div class="alert alert-danger" role="alert">
                                                            <div class="alert-body">
                                                                {{ $message }}
                                                            </div>
                                                        </div>
                                                        @enderror
                                                        <div class="form-group">
                                                            <label for="name_edit[en]">{{ __("Name") }} (EN)</label>
                                                            {{ app()->setLocale('en') }}
                                                            <input type="text" value="{{ $shop->name }}" name="name_edit[en]" id="name_edit[en]" class="form-control">
                                                            {{ app()->setLocale($current_locale) }}
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="description_edit[fr]">{{ __("Description") }} <span class="text-danger">*</span></label>
                                                            {{ app()->setLocale('fr') }}
                                                            <input type="hidden" name="description_edit[fr]" id="description_edit[fr]" class="form-control" value="{{ $shop->description }}">
                                                            <trix-editor input="description_edit[fr]"></trix-editor>
                                                            {{ app()->setLocale($current_locale) }}
                                                        </div>
                                                        @error('description_edit.fr')
                                                        <div class="alert alert-danger" role="alert">
                                                            <div class="alert-body">
                                                                {{ $message }}
                                                            </div>
                                                        </div>
                                                        @enderror
                                                        <div class="form-group">
                                                            <label for="description_edit[en]">{{ __("Description") }} <span class="text-danger">*</span></label>
                                                            {{ app()->setLocale('en') }}
                                                            <input type="hidden" name="description_edit[en]" id="description_edit[en]" class="form-control" value="{{ $shop->description }}">
                                                            <trix-editor input="description_edit[en]"></trix-editor>
                                                            {{ app()->setLocale($current_locale) }}
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="price_edit">{{ __("Price") }}<span class="text-danger">*</span></label>
                                                            <input type="text" value="{{ $shop->price }}" name="price_edit" id="price_edit" class="form-control">
                                                        </div>
                                                        @error('price_edit')
                                                        <div class="alert alert-danger" role="alert">
                                                            <div class="alert-body">
                                                                {{ $message }}
                                                            </div>
                                                        </div>
                                                        @enderror
                                                        <div class="form-group">
                                                            <label for="thick_edit">{{ __("Thick") }}<span class="text-danger">*</span></label>
                                                            <input type="text" value="{{ $shop->thick }}" name="thick_edit" id="thick_edit" class="form-control">
                                                        </div>
                                                        @error('thick_edit')
                                                        <div class="alert alert-danger" role="alert">
                                                            <div class="alert-body">
                                                                {{ $message }}
                                                            </div>
                                                        </div>
                                                        @enderror

                                                        <div class="form-group">
                                                            <label> {{ __('Previous Image') }} </label>
                                                            <img src="{{ asset('uploads/shops') }}/{{ $shop->image }}" alt="" width="200">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for=""> {{ __('Choose Shop Image') }} </label>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="image_edit" name="image_edit">
                                                                <label class="custom-file-label" for="image_edit">{{ __("Choose Shop Image") }}</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for=""> {{ __('Preview Image') }} </label>
                                                            <img width="200" id="output_edit">
                                                        </div>
                                                        @error('image_edit')
                                                        <div class="alert alert-danger" role="alert">
                                                            <div class="alert-body">
                                                                {{ $message }}
                                                            </div>
                                                        </div>
                                                        @enderror

                                                        <div class="form-group">
                                                            <label> {{ __('Previous Thumb Images') }} </label>
                                                            <div class="row">
                                                                @foreach ($shop->get_shop_thumb as $shop_thumb)
                                                                <div class="col-lg-3 col-md-4 col-sm-6">
                                                                    <div class="edit-thumb-preview">
                                                                        <button type="button" data-id="{{ $shop_thumb->id }}" class="edit-thumb-preview__btn shop_thumb_delete">
                                                                            <i data-feather="x"></i>
                                                                        </button>
                                                                        <img src="{{ asset('uploads/shops') }}/{{ $shop_thumb->thumb_image }}" alt="Previous Thumb" class="edit-thumb-preview__img">
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                            </div>
                                                        <div class="form-group">
                                                            <label for=""> {{ __('Choose Thumb Images') }} </label>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="thumb_image" name="thumb_image[]" multiple>
                                                                <label class="custom-file-label" for="thumb_image">{{ __('Choose Thumb Images') }} </label>
                                                            </div>
                                                        </div>
                                                        @error('thumb_image')
                                                            <div class="alert alert-danger">
                                                                <div class="alert-body">
                                                                    {{ $message }}
                                                                </div>
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="meta_title"> {{ __("Meta title") }} </label>
                                                            <input type="text" value="{{ $shop_thumb->meta_title }}" class="form-control" id="title" name="meta_title" placeholder="Blog Meta Title">
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
                                                            <label for="meta_keyword"> {{ __("Meta Keywords") }}</label>
                                                            <input type="text" value="{{ $shop_thumb->meta_keyword }}" class="form-control" id="keywords" name="meta_keyword" placeholder="Blog Meta keywords">
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
                                                            <label for="meta_description"> {{ __("Meta Description") }} </label>
                                                           <textarea class="form-control" name="meta_description" id="meta_description" cols="30" rows="5" placeholder="Blog Meta Description">{{ $shop_thumb->meta_description }}</textarea>
                                                        </div>
                                                        @error('meta_description')
                                                            <div class="alert alert-danger">
                                                                <div class="alert-body">
                                                                    {{ $message }}
                                                                </div>
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __("Close") }}</button>
                                                        <button type="submit" class="btn btn-primary">{{ __("Submit") }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                            </div>
                                        </div>

                                    @endif

                                    <!-- Single Delete Modal -->
                                    <div class="modal fade" id="deleteModal_{{ $shop->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form action="{{ route('shop.destroy', $shop->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('delete')
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
                                                        <button class="btn btn-danger waves-effect waves-float waves-light">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                                            </svg>
                                                            {{ __('Delete') }}
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endpush
                            @endforeach

                        </tbody>
                    </table>
                </div>
                @include('includes.pagination' , ['variables' => $shops, 'data_variables' => ['start_date' => request()->start_date,'end_date' => request()->end_date]])
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>

        $(document).ready(function(){
            var ids = [];
            @if($errors->has('category_id') || $errors->has('name.fr') || $errors->has('image') || $errors->has('thick') || $errors->has('description.fr') || $errors->has('price') || $errors->has('thumb_image'))
                $('#add_shop_modal').modal('show');
            @endif
            @if($errors->has('name_edit.fr') || $errors->has('thick_edit') || $errors->has('description_edit.fr') || $errors->has('price_edit'))
                $("#edit_shop_{{ session('id') }}").modal('show');
            @endif
            // Select All Checkbox Features
            $('#all-select').change(function(){
                 ids = [];
                 // Get all the id
                if($(this).is(":checked")){
                    $('.custom-control-input').prop('checked', true);


                    $('.all_checkbox').each(function(){
                        ids.push($(this).attr('id').split('-')[2]);
                    });

                    if(ids.length == 0){
                        $('#all_actions').removeClass('d-inline-block');
                        $('#all_actions').addClass('d-none');
                    }
                    else
                    {
                        $('#all_actions').removeClass(' d-none');
                        $('#all_actions').addClass('d-inline-block');
                        $('#export_all').val(ids);
                    }
                    // Delete all
                    $("#delete_all").on('click', function(){

                        $.ajax({
                        url: "{{ route('shop.mass_action') }}",
                        type: 'POST',
                        data: {
                            ids: ids,
                        },
                        success: function(data){
                            if(data.success == 'done'){
                                window.location.reload();
                            }
                        }
                    });

                });



                }else{
                    $('.custom-control-input').prop('checked', false);
                    $('#all_actions').addClass('d-none');
                    $('#all_actions').removeClass('d-inline-block');
                }
            });

            // Select Individual Checkbox Features
            $('.all_checkbox').change(function(){
                 ids = [];
                $('.all_checkbox').each(function(){
                    if($(this).is(":checked")){
                        ids.push($(this).attr('id').split('-')[2]);
                    }
                });
                if(ids.length == 0){
                    $('#all_actions').removeClass('d-inline-block');
                    $('#all_actions').addClass('d-none');
                }
                else
                {
                    $('#all_actions').removeClass(' d-none');
                    $('#all_actions').addClass('d-inline-block');
                    $('#export_all').val(ids);

                        // Delete trigger

                        $("#delete_all").on('click', function(){

                            $.ajax({
                                    url: "{{ route('shop.mass_action') }}",
                                    type: 'POST',
                                    data: {
                                        ids: ids,
                                    },
                                    success: function(data){
                                        if(data.success == 'done'){
                                            window.location.reload();
                                        }
                                    }
                            });

                        });
                }
            });

            // Category Import
            $('body').on('change','#importCategory',function(){
                var form_data = new FormData($('#importCategoryForm')[0]);

                $.ajax({
                    url: "{{ route('category.pre.import') }}",
                    type: "post",
                     data: form_data,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if(response.data){
                            $('#importSubmitButton').removeClass('d-none');
                            $('#importError').addClass('d-none');
                            $('#categoryCsvHeader').html(response.data);
                        }
                        if(response.error){
                            $('#importSubmitButton').addClass('d-none');
                            $('#importError').removeClass('d-none');
                            $('#importError').text(response.error);
                        }
                    },
                });
            });


            $('.table_search').on('input', function(){
                var tableSearchValue = $(this).val();
                $(this).closest(".card-body").find(".table tbody tr").each(function(){
                    if($(this).text().search(new RegExp(tableSearchValue, "i")) < 0){
                        $(this).hide();
                    }
                    else{
                        $(this).show();
                    }
                });
            });


            $('.shop_thumb_delete').on('click', function(){
                var shop_thumb_id = $(this).attr('data-id');
                // alert(shop_thumb_id)
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('shop_thumb_single_delete') }}",
                    type: 'POST',
                    data: {
                        shop_thumb_id: shop_thumb_id,
                    },
                    success: function(data){
                        if(data.success == 'done'){
                            toastr.error(data.message);
                            window.location.reload();
                        }
                    }
                });
            });
        });

    </script>

    <script>
        document.getElementById('image').onchange = function() {
            var src = URL.createObjectURL(this.files[0])
            document.getElementById('output').src = src
        };

        document.getElementById('image_edit').onchange = function() {
            var src = URL.createObjectURL(this.files[0])
            document.getElementById('output_edit').src = src
        }
    </script>


@endpush
