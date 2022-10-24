@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __("Coupons") }}
@endsection

{{-- Active Menu --}}
@section('coupons.index')
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
                {{ __("Coupons") }}
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
                <h4 class="card-title">{{ __("Coupon List") }} ({{ $coupons->count() }})</h4>
                <div class="button-group-spacing">
                    @if (havePermission('coupons','import'))
                        <button class="btn btn-success waves-effect w-100 w-sm-auto" data-toggle="modal" data-target="#csvImportModal">+ {{ __("Import") }}</button>
                    @endif
                    @if (havePermission('coupons','create'))
                        <button class="btn btn-warning waves-effect w-100 w-sm-auto" data-toggle="modal" data-target="#add_coupon_modal">+ {{ __("Add a Coupons") }}</button>
                    @endif
                    <div id="all_actions" class="dropdown w-100 w-sm-auto d-none">
                        <button class="btn btn-info w-100 w-sm-auto dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            All Action
                        </button>
                        <div class="dropdown-menu dropdown-menu-right w-100">
                            @if (havePermission('coupons','delete'))
                                <button class="dropdown-item" data-toggle="modal" data-target="#deleteModal">{{ __("Delete") }}</button>
                            @endif
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
                            @if (havePermission('coupons','export'))
                                <form action="{{ route('coupons.mass_export') }}" method="POST">
                                    @csrf
                                    <input type="hidden" id="export_all" name="id">
                                    <button type="submit" class="dropdown-item">{{ __("Export") }}</button>
                                </form>
                            @endif
                            {{-- <a class="dropdown-item" href="#">Something else here</a> --}}
                        </div>
                    </div>
                </div>
                @push('all_modals')
                    <!-- Add Category Modal -->
                    <div class="modal fade" id="add_coupon_modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ __("Add a coupon") }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('coupons.store') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                        <div class="form-group">
                                            <label for="name">{{ __("Name") }} <span class="text-danger">*</span></label>
                                            <input type="text" value="{{ old('code') }}" name="code" id="name" class="form-control">
                                        </div>
                                        @error('code')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <div class="form-group">
                                            <label for="type">{{ __("Type") }} <span class="text-danger">*</span></label>
                                            <select name="type" id="type" class="form-control">
                                                <option value="flat">{{ __("Flat") }}</option>
                                                <option value="percent">{{ __("Percentage") }}</option>
                                            </select>
                                        </div>
                                        @error('type')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <div class="form-group">
                                            <label for="value">{{ __("Coupon Amount") }} <span class="text-danger">*</span></label>
                                            <input type="text" value="{{ old('value') }}" name="value" id="value" class="form-control">
                                        </div>
                                        @error('value')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <div class="form-group">
                                            <label for="expiry_date">{{ __("Expiry Date") }} <span class="text-danger">*</span></label>
                                            <input type="date" value="{{ old('expiry_date') }}" name="expiry_date" id="expiry_date" min="{{ \Carbon\Carbon::today()->format('Y-m-d') }}"  class="form-control flatpickr-human-friendly" placeholder="dd/mm/yyyy">
                                        </div>
                                        @error('expiry_date')
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
                    <!-- CSV Import Modal -->
                    <div class="modal fade" id="csvImportModal" tabindex="-1" role="dialog" aria-labelledby="csvImportModalTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content position-relative">
                                <form action="{{ route('coupon.import') }}" method="POST" id="importCouponForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">{{ __("Import coupons") }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group my-2">
                                            <p class="form-label">{{ __("Import coupons") }}</p> <span id="importError" class="text-danger"></span>
                                            <div class="custom-file cursor-pointer">
                                                <input type="file" name="file" id="importCoupon"class="custom-file-input" required>
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
                                                        <tbody id="couponCsvHeader">

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
                <form action="{{ route('coupon.date.filter') }}" method="GET">
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
                        <div class="col-md">
                            <div class="form-group">
                                <label for="status">{{ __("Status") }}<span class="text-danger">*</span></label>
                                <select name="status" id="status" class="form-control select2">
                                    <option value="all">All</option>
                                    <option value="active">Active</option>
                                    <option value="expired">Expired</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-auto">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success waves-effect w-100 w-sm-auto">{{ __("Filter") }}</button>
                                @if(Route::is('coupon.date.filter'))
                                <a href="{{ route('coupons.index') }}" class="btn btn-danger waves-effect mt-1 mt-sm-0 w-100 w-sm-auto">{{ __("Clear") }}</a>
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
                        @include( 'includes.pagination', ['variables' => $coupons, 'pagination_col_class' => 'col-md-auto', 'data_variables' => ['start_date' => request()->start_date,'end_date' => request()->end_date, 'status' => request()->status]])
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
                                <th>{{ __("Code") }}</th>
                                <th>{{ __("Type") }}</th>
                                <th>{{ __("Value") }}</th>
                                <th>{{ __("Expiry Date") }}</th>
                                <th>{{ __("Created By") }}</th>
                                <th>{{ __("Updated By") }}</th>
                                <th>{{ __("Created At") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coupons as $coupon)
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input all_checkbox" name="select_individual[]" id="single-select-{{ $coupon->id }}">
                                            <label class="custom-control-label" for="single-select-{{ $coupon->id }}"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-icon btn-outline-secondary waves-effect dropdown-toggle hide-arrow" data-toggle="dropdown" data-boundary="viewport">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                @if (havePermission('coupons','edit'))
                                                    <button data-toggle="modal" data-target="#edit_coupon_{{ $coupon->id }}" class="dropdown-item">
                                                        <i data-feather='edit'></i>
                                                        {{ __("Edit") }}
                                                    </button>
                                                @endif
                                                @if (havePermission('coupons','delete'))
                                                    <form action="{{ route('coupons.destroy', $coupon->id) }}" method="POST">
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
                                    <td>{{ $coupon->code }}</td>
                                    <td>{{ $coupon->type }}</td>
                                    <td>{{ $coupon->value }} {{ ($coupon->type == 'flat') ? '€' : '%' }} </td>
                                    <td>
                                        {{ $coupon->expiry_date }}
                                        @if($coupon->expiry_date < \Carbon\Carbon::now()->format('Y-m-d'))
                                            <span class="badge badge-danger">{{ __("Expired") }}</span>
                                        @else
                                            <span class="badge badge-success">{{ __("Active") }}</span>
                                        @endif
                                    </td>
                                    @if($coupon->created_by)
                                        <td>
                                            <div class="avatar mr-50" data-toggle="tooltip" title="{{ $coupon->creator->name }}">
                                                <img src="{{ $coupon->creator->profile_photo_url }}" alt="avatar" width="32" height="32">
                                            </div>
                                            {{ $coupon->creator->name }}
                                        </td>
                                    @else
                                        <td>-</td>
                                    @endif
                                    @if($coupon->updated_by)
                                        <td>
                                            <div class="avatar mr-50" data-toggle="tooltip" title="{{ $coupon->modifier->name }}">
                                                <img src="{{ $coupon->modifier->profile_photo_url }}" alt="avatar" width="32" height="32">
                                            </div>
                                            {{ $coupon->modifier->name }}
                                        </td>
                                    @else
                                        <td>-</td>
                                    @endif
                                    <td>{{ $coupon->created_at->diffForHumans() }}</td>
                                </tr>
                                    @push('all_modals')
                                        <!-- Modal -->
                                        <div class="modal fade" id="edit_coupon_{{ $coupon->id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">{{ __("Add a Category") }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('coupons.update', $coupon->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="coupon_name">{{ __("Name") }} <span class="text-danger">*</span></label>
                                                            <input type="text" value="{{ $coupon->code ?? old('coupon_code') }}" name="coupon_code" id="coupon_name" class="form-control">
                                                        </div>
                                                        @error('coupon_code')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                        <div class="form-group">
                                                            <label for="coupon_type">{{ __("Type") }} <span class="text-danger">*</span></label>
                                                            <select name="coupon_type" id="coupon_type" class="form-control">
                                                                <option value="flat" {{ ($coupon->type == 'flat') ? 'selected' : '' }}>{{ __("Flat") }}</option>
                                                                <option value="percent" {{ ($coupon->type == 'percent') ? 'selected' : '' }}>{{ __("Percentage") }}</option>
                                                            </select>
                                                        </div>
                                                        @error('coupon_type')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                        <div class="form-group">
                                                            <label for="coupon_value">{{ __("Coupon Amount") }} <span class="text-danger">*</span></label>
                                                            <input type="text" value="{{ $coupon->value ?? old('coupon_value') }}" name="coupon_value" id="coupon_value" class="form-control">
                                                        </div>
                                                        @error('coupon_value')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                        <div class="form-group">
                                                            <label for="coupon_expiry_date">{{ __("Expiry Date") }} <span class="text-danger">*</span></label>
                                                            <input type="date" value="{{ $coupon->expiry_date ?? old('coupon_expiry_date') }}" name="coupon_expiry_date" id="coupon_expiry_date" min="{{ \Carbon\Carbon::today()->format('Y-m-d') }}"  class="form-control flatpickr-human-friendly" placeholder="dd/mm/yyyy">
                                                        </div>
                                                        @error('coupon_expiry_date')
                                                            <small class="text-danger">{{ $message }}</small>
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
                                    @endpush
                            @endforeach

                        </tbody>
                    </table>
                </div>
                @include('includes.pagination' , ['variables' => $coupons, 'data_variables' => ['start_date' => request()->start_date,'end_date' => request()->end_date,'status' => request()->status]])
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>

        $(document).ready(function(){

            var ids = [];
            @if($errors->has('code') || $errors->has('type') || $errors->has('value') || $errors->has('expiry_date'))
                $('#add_coupon_modal').modal('show');
            @endif
            @if($errors->has('coupon_code') || $errors->has('coupon_type') || $errors->has('coupon_value') || $errors->has('coupon_expiry_date'))
                $("#edit_coupon_{{ session('id') }}").modal('show');
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
                        url: "{{ route('coupons.mass_action') }}",
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
                                    url: "{{ route('coupons.mass_action') }}",
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
            $('body').on('change','#importCoupon',function(){
                var form_data = new FormData($('#importCouponForm')[0]);

                $.ajax({
                    url: "{{ route('coupon.pre.import') }}",
                    type: "post",
                     data: form_data,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if(response.data){
                            $('#importSubmitButton').removeClass('d-none');
                            $('#importError').addClass('d-none');
                            $('#couponCsvHeader').html(response.data);
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
        });

    </script>

@endpush
