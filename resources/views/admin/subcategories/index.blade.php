@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __("Sub category") }}
@endsection

{{-- Active Menu --}}
@section('subcategories')
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
                {{ __("Sub category") }}
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
                <h4 class="card-title">{{ __("Sub category List") }} ({{ $subCategories->count() }})</h4>
                <div class="button-group-spacing">

                    @if (havePermission('sub_category','import'))
                        <button class="btn btn-success waves-effect w-100 w-sm-auto" data-toggle="modal" data-target="#csvImportModal">+ {{ __("Import") }}</button>
                    @endif

                    @if (havePermission('sub_category','create'))
                        <button class="btn btn-warning waves-effect w-100 w-sm-auto" data-toggle="modal" data-target="#add_category_modal">+ {{ __("Add a SubCategory") }}</button>
                    @endif

                    <div id="all_actions" class="dropdown w-100 w-sm-auto d-none">
                        <button class="btn btn-info w-100 w-sm-auto dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            All Action
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" >
                            <button data-toggle="modal" data-target="#deleteModal" type="button" class="dropdown-item">{{ __("Delete") }}</button>
                            @push('all_modals')
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
                            @if (havePermission('sub_category','export'))
                                <form action="{{ route('subcategories.mass_export') }}" method="POST">
                                    @csrf
                                    <input type="hidden" id="export_all" name="id">
                                    <button type="submit" class="dropdown-item" >{{ __("Export") }}</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
                @push('all_modals')
                    <!-- Add Category Modal -->
                    @if (havePermission('sub_category','create'))
                        <div class="modal fade" id="add_category_modal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{ __("Add a SubCategory") }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('subcategories.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="category_id">{{ __("Select catégorie") }} <span class="text-danger">*</span></label>
                                                    <select name="category_id" id="category_id" class="form-control select2" required>
                                                        <option value="">{{ __("Select catégorie") }}</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('category_id')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div class="form-group">
                                                    <label for="name">{{ __("Name") }} <span class="text-danger">*</span></label>
                                                    <input type="text" value="{{ old('name') }}" name="name" id="name" class="form-control">
                                                </div>
                                                @error('name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-primary">{{ __("Submit") }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- CSV Import Modal -->
                    @if (havePermission('sub_category','import'))
                        <div class="modal fade" id="csvImportModal" tabindex="-1" role="dialog" aria-labelledby="csvImportModalTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content position-relative">
                                    <form action="{{ route('subcategory.import') }}" method="POST" id="importCategoryForm" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">{{ __("Import Sub categories") }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group my-2">
                                                <p class="form-label">{{ __("Import Sub categories") }}</p> <span id="importError" class="text-danger"></span>
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
                                                                        {{ __('Table Header') }}
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
                    @endif
                @endpush
            </div>
            <div class="card-body">
                <form action="{{ route('subcategory.date.filter') }}" method="GET">
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
                                <button type="submit" class="btn btn-success waves-effect w-100 w-sm-auto">
                                    <i data-feather='filter'></i><span class="pl-50">{{ __("Filter") }}</span>
                                </button>
                                @if(Route::is('subcategory.date.filter'))
                                <a href="{{ route('subcategories.index') }}" class="btn btn-danger waves-effect w-100 w-sm-auto mt-50 mt-sm-0">
                                    <i data-feather='trash'></i><span class="pl-50">{{ __("Clear") }}</span>
                                </a>
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
                        @include('includes.pagination', ['variables' => $subCategories, 'pagination_col_class' => 'col-md-auto', 'data_variables' => ['start_date' => request()->start_date,'end_date' => request()->end_date]])
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
                                <th>{{ __("Nom") }}</th>
                                <th>{{ __("Created By") }}</th>
                                <th>{{ __("Updated By") }}</th>
                                <th>{{ __("Created At") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subCategories as $subcategory)
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input all_checkbox" name="select_individual[]" id="single-select-{{ $subcategory->id }}">
                                            <label class="custom-control-label" for="single-select-{{ $subcategory->id }}"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-icon btn-outline-secondary waves-effect dropdown-toggle hide-arrow" data-toggle="dropdown" data-boundary="viewport">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                @if (havePermission('sub_category','edit'))
                                                    <button data-toggle="modal" data-target="#edit_category_{{ $subcategory->id }}" class="dropdown-item">
                                                        <i data-feather='edit'></i>
                                                        {{ __("Edit") }}
                                                    </button>
                                                @endif

                                                @if (havePermission('sub_category','delete'))
                                                    <form action="{{ route('subcategories.destroy', $subcategory->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item">
                                                            <i data-feather="trash" class="mr-50"></i>
                                                            {{ __("Delete") }}
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $subcategory->name }}</td>
                                    @if($subcategory->created_by)
                                        <td>
                                            <div class="avatar mr-50" data-toggle="tooltip" title="{{ $subcategory->creator->name }}">
                                                <img src="{{ $subcategory->creator->profile_photo_url }}" alt="avatar" width="32" height="32">
                                            </div>
                                            {{ $subcategory->creator->name }}
                                        </td>
                                    @else
                                        <td>-</td>
                                    @endif
                                    @if($subcategory->updated_by)
                                        <td>
                                            <div class="avatar mr-50" data-toggle="tooltip" title="{{ $subcategory->modifier->name }}">
                                                <img src="{{ $subcategory->modifier->profile_photo_url }}" alt="avatar" width="32" height="32">
                                            </div>
                                            {{ $subcategory->modifier->name }}
                                        </td>
                                    @else
                                        <td>-</td>
                                    @endif
                                    <td>{{ $subcategory->created_at->diffForHumans() }}</td>
                                </tr>
                                    @push('all_modals')
                                        <!-- Modal -->
                                        @if (havePermission('sub_category','edit'))
                                            <div class="modal fade" id="edit_category_{{ $subcategory->id }}" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">{{ __("Add a SubCategory") }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('subcategories.update', $subcategory->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">

                                                                    {{-- Category --}}
                                                                    <div class="form-group">
                                                                        <label for="category">{{ __("Catégorie") }}</label>
                                                                        <select name="category_id" id="category" class="form-control select2">
                                                                            @foreach ($categories as $category)
                                                                                <option value="{{ $category->id }}" {{ $subcategory->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="subcategory_name">{{ __("Name") }} <span class="text-danger">*</span></label>
                                                                        <input type="text" value="{{ $subcategory->name ?? old('subcategory_name') }}" name="subcategory_name" id="subcategory_name" class="form-control">
                                                                    </div>
                                                                    @error('subcategory_name')
                                                                        <div class="alert alert-danger">
                                                                            <div class="alert-body">{{ $message }}</div>
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
                                    @endpush
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @include('includes.pagination' , ['variables' => $subCategories, 'data_variables' => ['start_date' => request()->start_date,'end_date' => request()->end_date]])
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>

        $(document).ready(function(){
            var ids = [];
            @if($errors->has('name'))
                $('#add_category_modal').modal('show');
            @endif

            @if($errors->has('subcategory_name'))
                $("#edit_category_{{ session('id')}}").modal('show');
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
                        url: "{{ route('subcategories.mass_action') }}",
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
                                    url: "{{ route('subcategories.mass_action') }}",
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
                    url: "{{ route('subcategory.pre.import') }}",
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

            // Table Search
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
        });

    </script>

@endpush
