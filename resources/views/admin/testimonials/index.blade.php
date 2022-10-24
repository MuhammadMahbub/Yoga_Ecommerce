@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __("Testimonials") }}
@endsection

{{-- Active Menu --}}
@section('testimonialslist')
    active
@endsection

@push('vendor-css')

@endpush

@push('theme-css')

@endpush

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
                {{ __("Testimonials") }}
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
                <h4 class="card-title">{{ __("Testimonials List") }} ({{ $testimonials->count() }})</h4>
                <div class="button-group-spacing">
                    @if (havePermission('testimonial','import'))
                        <button class="btn btn-success waves-effect w-100 w-sm-auto" data-toggle="modal" data-target="#csvImportModal">+ {{ __("Import") }}</button>
                    @endif

                    @if (havePermission('testimonial','export'))
                        <button class="btn btn-warning waves-effect w-100 w-sm-auto" data-toggle="modal" data-target="#add_testimonial_modal">+ {{ __("Add a Testimonials") }}</button>
                    @endif
                    <div id="all_actions" class="dropdown w-100 w-sm-auto d-none">
                        <button class="btn btn-info w-100 w-sm-auto dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __("All Action") }}
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" >
                            @if (havePermission('testimonial','delete'))
                                <button class="dropdown-item" data-toggle="modal" data-target="#deleteModal" >{{ __("Delete") }}</button>
                            @endif


                            @push('all_modals')
                                @if (havePermission('testimonial','delete'))
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
                                @endif
                            @endpush

                            @if (havePermission('testimonial','export'))
                                <form action="{{ route('testimonials.mass_export') }}" method="POST">
                                    @csrf
                                    <input type="hidden" id="export_all" name="id">
                                    <button type="submit" class="dropdown-item" >{{ __("Export") }}</button>
                                </form>
                            @endif

                        </div>
                    </div>
                </div>
                @push('all_modals')
                    <!-- Add testimonial Modal -->
                    @if (havePermission('testimonial','create'))
                        <div class="modal fade" id="add_testimonial_modal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ __("Add a Testimonials") }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="name">{{ __("Name") }} <span class="text-danger">*</span></label>
                                            <input type="text" value="{{ old('name') }}" name="name" id="name" class="form-control">
                                        </div>
                                        @error('name')
                                            <div class="alert alert-danger" role="alert">
                                                <div class="alert-body">
                                                    {{ $message }}
                                                </div>
                                            </div>
                                        @enderror

                                        <div class="form-group">
                                            <label for="designation[fr]">{{ __("Designation") }}(FR) <span class="text-danger">*</span></label>
                                            <input type="text" value="{{ old('designation.fr') }}" name="designation[fr]" id="designation[fr]" class="form-control">
                                        </div>
                                        @error('designation.fr')
                                            <div class="alert alert-danger" role="alert">
                                                <div class="alert-body">
                                                    {{ $message }}
                                                </div>
                                            </div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="designation[en]">{{ __("Designation") }}(EN)</label>
                                            <input type="text" value="{{ old('designation.en') }}" name="designation[en]" id="designation[en]" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="image">{{ __("Image") }}</label>
                                            <div class="custom-file">
                                                <input type="file" name="image" id="image" class="custom-file-input">
                                                <label class="custom-file-label" for="importtestimonial">{{ __('Choose Image') }}</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="description[fr]">{{ __("Testimonial") }}(FR) <span class="text-danger">*</span></label>
                                            <textarea name="description[fr]" id="description[fr]" rows="5" class="form-control" placeholder="{{ __("Testimonial") }}...">{{ old('description.fr') }}</textarea>
                                        </div>
                                        @error('description.fr')
                                            <div class="alert alert-danger" role="alert">
                                                <div class="alert-body">
                                                    {{ $message }}
                                                </div>
                                            </div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="description[en]">{{ __("Testimonial") }} (EN)</label>
                                            <textarea name="description[en]" id="description[en]" rows="5" class="form-control" placeholder="{{ __("Testimonial") }}...">{{ old('description.en') }}</textarea>
                                        </div>
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

                    @if (havePermission('testimonial','import'))
                        <div class="modal fade" id="csvImportModal" tabindex="-1" role="dialog" aria-labelledby="csvImportModalTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content position-relative">
                                    <form action="{{ route('testimonial.import') }}" method="POST" id="importtestimonialForm" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">{{ __("Import Testimonials") }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group my-2">
                                                <label class="form-label" for="importtestimonial">{{ __("Import Testimonials") }}</label> <span id="importError" class="text-danger"></span>
                                                <div class="custom-file">
                                                    <input type="file" name="file" id="importtestimonial" class="custom-file-input" required>
                                                    <label class="custom-file-label" for="importtestimonial">{{ __('Choose File') }}</label>
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
                                                            <tbody id="testimonialCsvHeader">

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
                <form action="{{ route('testimonial.date.filter') }}" method="GET">
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
                                @if(Route::is('testimonial.date.filter'))
                                <a href="{{ route('testimonials.index') }}" class="btn btn-danger waves-effect mt-50 mt-sm-0 w-100 w-sm-auto">{{ __("Clear") }}</a>
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
                        @include('includes.pagination', ['variables' => $testimonials, 'pagination_col_class' => 'col-md-auto', 'data_variables' => ['start_date' => request()->start_date,'end_date' => request()->end_date]])
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
                                <th>{{ __("Designation") }}</th>
                                <th>{{ __("Image") }}</th>
                                <th>{{ __("Comment") }}</th>
                                <th>{{ __("Created By") }}</th>
                                <th>{{ __("Updated By") }}</th>
                                <th>{{ __("Created At") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($testimonials as $testimonial)
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input all_checkbox" name="select_individual[]" id="single-select-{{ $testimonial->id }}">
                                            <label class="custom-control-label" for="single-select-{{ $testimonial->id }}"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-icon btn-outline-secondary waves-effect dropdown-toggle hide-arrow" data-toggle="dropdown" data-boundary="viewport">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                @if (havePermission('testimonial','edit'))
                                                    <button data-toggle="modal" data-target="#edit_testimonial_{{ $testimonial->id }}" class="dropdown-item">
                                                        <i data-feather='edit'></i>
                                                        {{ __("Edit") }}
                                                    </button>
                                                @endif

                                                @if (havePermission('testimonial','delete'))
                                                    <form action="{{ route('testimonials.destroy', $testimonial->id) }}" method="POST">
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
                                    <td>{{ $testimonial->name }}</td>
                                    <td>{{ $testimonial->designation }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/testimonials') }}/{{ $testimonial->image }}" alt="image" width="100">
                                    </td>
                                    <td>{{ Str::limit($testimonial->description, 100) }}</td>

                                    @if($testimonial->created_by)
                                        <td>
                                            <div class="avatar mr-50" data-toggle="tooltip" title="{{ $testimonial->creator->name }}">
                                                <img src="{{ $testimonial->creator->profile_photo_url }}" alt="avatar" width="32" height="32">
                                            </div>
                                            {{ $testimonial->creator->name }}
                                        </td>
                                    @else
                                        <td>-</td>
                                    @endif
                                    @if($testimonial->updated_by)
                                        <td>
                                            <div class="avatar mr-50" data-toggle="tooltip" title="{{ $testimonial->modifier->name }}">
                                                <img src="{{ $testimonial->modifier->profile_photo_url }}" alt="avatar" width="32" height="32">
                                            </div>
                                            {{ $testimonial->modifier->name }}
                                        </td>
                                    @else
                                        <td>-</td>
                                    @endif
                                    <td>{{ $testimonial->created_at->diffForHumans() }}</td>
                                </tr>
                                    @push('all_modals')
                                        <!--Edit Modal -->
                                        @if (havePermission('testimonial','edit'))
                                            <div class="modal fade" id="edit_testimonial_{{ $testimonial->id }}" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">{{ __("Edit Testimonial") }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="name">{{ __("Name") }} <span class="text-danger">*</span></label>
                                                                    <input type="text" value="{{ $testimonial->name ?? old('testimonial_name') }}" name="testimonial_name" id="name" class="form-control">
                                                                </div>
                                                                @error('testimonial_name')
                                                                    <div class="alert alert-danger" role="alert">
                                                                        <div class="alert-body">
                                                                            {{ $message }}
                                                                        </div>
                                                                    </div>
                                                                @enderror

                                                                <div class="form-group">
                                                                    <label for="testimonial_designation[fr]">{{ __("Designation") }}(FR) <span class="text-danger">*</span></label>
                                                                    {{ app()->setLocale('fr') }}
                                                                    <input type="text" value="{{ $testimonial->designation }}" name="testimonial_designation[fr]" id="testimonial_designation[fr]" class="form-control">
                                                                    {{ app()->setLocale($current_locale) }}
                                                                </div>
                                                                @error('testimonial_designation.fr')
                                                                    <div class="alert alert-danger" role="alert">
                                                                        <div class="alert-body">
                                                                            {{ $message }}
                                                                        </div>
                                                                    </div>
                                                                @enderror
                                                                <div class="form-group">
                                                                    <label for="testimonial_designation[en]">{{ __("Designation") }}(EN)</label>
                                                                    {{ app()->setLocale('en') }}
                                                                    <input type="text" value="{{ $testimonial->designation }}" name="testimonial_designation[en]" id="testimonial_designation[en]" class="form-control">
                                                                    {{ app()->setLocale($current_locale) }}
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="image">{{ __("Image") }}</label>
                                                                    <input type="file" name="testimonial_image" id="image" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <img src="{{ asset('uploads/testimonials') }}/{{ $testimonial->image }}" alt="image" width="100">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="testimonial_description">{{ __("Description") }} (FR)<span class="text-danger">*</span></label>
                                                                    {{ app()->setLocale('fr') }}
                                                                    <textarea name="testimonial_description[fr]" id="testimonial_description[fr]" cols="30" rows="5" class="form-control">{{ $testimonial->description }}</textarea>
                                                                    {{ app()->setLocale($current_locale) }}
                                                                </div>
                                                                @error('testimonial_description.fr')
                                                                    <div class="alert alert-danger" role="alert">
                                                                        <div class="alert-body">
                                                                            {{ $message }}
                                                                        </div>
                                                                    </div>
                                                                @enderror
                                                                <div class="form-group">
                                                                    <label for="testimonial_description[en]">{{ __("Description") }} (EN)</label>
                                                                    {{ app()->setLocale('en') }}
                                                                    <textarea name="testimonial_description[en]" id="testimonial_description[en]" cols="30" rows="5" class="form-control">{{ $testimonial->description }}</textarea>
                                                                    {{ app()->setLocale($current_locale) }}
                                                                </div>
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
                @include('includes.pagination' , ['variables' => $testimonials, 'data_variables' => ['start_date' => request()->start_date,'end_date' => request()->end_date]])
            </div>
        </div>
    </div>
</div>
@endsection

@push('page-js')

@endpush

@push('js')
    <script>

        $(document).ready(function(){
            var ids = [];
            @if($errors->has('name') || $errors->has('description.fr') || $errors->has('designation.fr'))
                $('#add_testimonial_modal').modal('show');
            @endif
            @if($errors->has('testimonial_name') || $errors->has('testimonial_designation.fr') || $errors->has('testimonial_description.fr'))
                $("#edit_testimonial_{{ session('id') }}").modal('show');
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
                        url: "{{ route('testimonials.mass_action') }}",
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
                                    url: "{{ route('testimonials.mass_action') }}",
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
            $('body').on('change','#importtestimonial',function(){
                var form_data = new FormData($('#importtestimonialForm')[0]);

                $.ajax({
                    url: "{{ route('testimonial.pre.import') }}",
                    type: "post",
                     data: form_data,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if(response.data){
                            $('#importSubmitButton').removeClass('d-none');
                            $('#importError').addClass('d-none');
                            $('#testimonialCsvHeader').html(response.data);
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

