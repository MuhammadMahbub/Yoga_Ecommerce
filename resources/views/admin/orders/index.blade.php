@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __('Orders') }}
@endsection

{{-- Active Menu --}}
@section('orders.index')
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
                {{ __("Orders") }}
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
                <h4 class="card-title">{{ __("Order List") }} ({{ $orders->count() }})</h4>
                <div class="button-group-spacing">
                    <div id="all_actions" class="dropdown w-100 w-sm-auto d-none">
                        <button class="btn btn-info w-100 w-sm-auto dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __("All Action") }}
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
                                                    <form action="{{ route('order.bulk.delete') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="delete_id" id="delete_id">
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
                            <form action="{{ route('orders.mass_export') }}" method="POST">
                                @csrf
                                <input type="hidden" id="export_all" name="id">
                                <button type="submit" class="dropdown-item" >{{ __("Export") }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('order.date.filter') }}" method="GET">
                    <div class="row align-items-end">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="start_date">{{ __("Start Date") }} <span class="text-danger">*</span></label>
                                <input type="date" name="start_date" @isset(request()->start_date) value="{{ \Carbon\Carbon::parse(request()->start_date)->format('Y-m-d') }}" @endisset id="start_date" class="form-control flatpickr-human-friendly" placeholder="dd/mm/yyyy" required>
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
                                @if(Route::is('order.date.filter'))
                                    <a href="{{ route('orders.index') }}" class="btn btn-danger waves-effect w-100 w-sm-auto mt-50 mt-sm-0">
                                        <i data-feather='trash'></i><span class="pl-50">{{ __("Clear") }}</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
                <section id="ecommerce-searchbar" class="ecommerce-searchbar">
                    <div class="row mt-1">
                        <div class="col-sm">
                            <form action="{{ route('orders.search') }}" method="get" class="input-group">
                                <input type="text" class="form-control search-product" name="search" id="shop-search" placeholder="Search order... Type and hit Enter" />
                                <div class="input-group-append">
                                    <button type="submit" class="input-group-text">
                                        <i data-feather="search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        @if (Route::is("orders.search"))
                            <div class="col-sm-auto mt-50 mt-sm-0">
                                <a href="{{ route('orders.index') }}" class="btn btn-danger waves-effect waves-float waves-light w-100 w-sm-auto">
                                    <i data-feather='trash'></i><span class="pl-50">{{ __("Clear") }}</span>
                                </a>
                            </div>
                        @endif
                    </div>
                </section>
                @include('includes.pagination', ['variables' => $orders, 'pagination_col_class' => 'col-md-auto', 'data_variables' => ['start_date' => request()->start_date,'end_date' => request()->end_date, 'search' => request()->search]])
                <div class="table-responsive mt-2">
                    <table class="table table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input main_checkbox" id="all-select">
                                        <label class="custom-control-label" for="all-select"></label>
                                    </div>
                                </th>
                                <th>{{ __("Actions") }}</th>
                                <th>{{ __("Order Number") }}</th>
                                <th>{{ __("Class type") }}</th>
                                <th>{{ __("Order Date") }}</th>
                                <th>{{ __("Order Status") }}</th>
                                {{-- <th>Order type</th> --}}
                                <th>{{ __("Order Total") }}</th>
                                <th>{{ __("Refunded Amount") }}</th>
                                <th>{{ __("Payment Status") }}</th>
                                <th>{{ __("Payment Method") }}</th>
                                {{-- <th>Customer id</th>
                                <th>Customer note</th> --}}
                                <th>{{ __("Customer Ip") }}</th>
                                {{-- <th>Coupon name</th> --}}
                                <th>{{ __("Coupon Code") }}</th>
                                <th>{{ __("Coupon Discount") }}</th>
                                <th>{{ __("Join Class") }}</th>
                                <th>{{ __("Join Class Date") }}</th>
                                <th>{{ __("Join Person") }}</th>
                                <th>{{ __('Customer name') }}</th>
                                <th>{{ __('Customer email') }}</th>
                                <th>{{ __('Customer mobile') }}</th>
                                <th>{{ __('Customer address') }}</th>
                                {{-- <th>Shipping city</th>
                                <th>Shipping country</th>
                                <th>Shipping zip</th>
                                <th>Shipping note</th>
                                <th>Shipping method</th>
                                <th>Shipping cost</th>
                                <th>Shipping time</th> --}}
                                {{-- <th>Invoice id</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input all_checkbox" name="select_individual[]" id="single-select-{{ $order->id }}">
                                            <label class="custom-control-label" for="single-select-{{ $order->id }}"></label>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-icon btn-outline-secondary waves-effect dropdown-toggle hide-arrow" data-toggle="dropdown" data-boundary="viewport">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <form action="{{ route('order.status.change') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $order->id }}">
                                                    @if ($order->order_status == 'pending')
                                                        <button type="submit" name="status" value="confirm" class="dropdown-item">
                                                            <i data-feather='check'></i>
                                                            {{ __("Confirm Order") }}
                                                        </button>
                                                        <button type="submit" name="status" value="cancel" class="dropdown-item">
                                                            <i data-feather='x'></i>
                                                            {{ __("Cancel Order") }}
                                                        </button>
                                                    @elseif ($order->order_status == 'confirm')
                                                        <button type="submit" name="status" value="pending" class="dropdown-item">
                                                            <i data-feather='refresh-cw'></i>
                                                            {{ __("Move to pending") }}
                                                        </button>
                                                        <button type="submit" name="status" value="cancel" class="dropdown-item">
                                                            <i data-feather='check'></i>
                                                            {{ __("Cancel Order") }}
                                                        </button>
                                                    @else
                                                        <button type="submit" name="status" value="pending" class="dropdown-item">
                                                            <i data-feather='refresh-cw'></i>
                                                            {{ __("Move to Pending") }}
                                                        </button>
                                                    @endif
                                                    @if($order->order_total == $order->refund_amount)
                                                        <button type="button" value="refunded" class="dropdown-item">
                                                            <i data-feather='arrow-right'></i>
                                                            {{ __("Order refunded") }}
                                                        </button>
                                                    @elseif($order->refund_id == null)
                                                        <a data-target="#deleteModal_{{ $order->id }}" data-toggle="modal" class="dropdown-item">
                                                            <i data-feather='arrow-left'></i>
                                                            {{ __("Refund Order") }}
                                                        </a>
                                                        <a data-target="#partial_refund-{{ $order->id }}" data-toggle="modal" class="dropdown-item">
                                                            <i data-feather='arrow-up-left'></i>
                                                            {{ __("Refund Partial Order") }}
                                                        </a>
                                                    @elseif ($order->order_total > $order->refund_amount)
                                                        <a data-target="#partial_refund-{{ $order->id }}" data-toggle="modal" class="dropdown-item">
                                                            <i data-feather='arrow-up-left'></i>
                                                            {{ __("Refund Partial Order") }}
                                                        </a>
                                                    @endif
                                                  @push('all_modals')
                                                        <div class="modal fade" id="partial_refund-{{ $order->id }}" tabindex="-1" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">{{ __("Make partial refund") }}</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form action="{{ route('refund.partial') }}" method="POST">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                                <div class="form-group">
                                                                                    <input type="hidden" name="id" value="{{ $order->id }}">
                                                                                    <label for="name">{{ __("Amount") }} <span class="text-danger">*</span></label>
                                                                                    <input type="text" value="{{ old('amount') }}" name="amount" id="amount{{ $order->id }}" class="form-control" placeholder="Enter amount">
                                                                                    <div class="alert">
                                                                                        <div class="alert-body error">

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                @error('amount')
                                                                                    <div class="alert alert-danger">
                                                                                        <div class="alert-body">
                                                                                            {{ $message }}
                                                                                        </div>
                                                                                    </div>
                                                                                @enderror
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __("Fermer") }}</button>
                                                                            <button  type="button" data-refund="{{ $order->order_total - $order->refund_amount }}" data-id="{{ $order->id }}" class="btn btn-primary refund_submit">{{ __("Soumettre") }}</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                              <!-- Single Delete Modal -->
                                                            <div class="modal fade" id="deleteModal_{{ $order->id }}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                                                <a href="{{ route('refund.full', $order->id) }}" class="btn btn-danger waves-effect waves-float waves-light">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                                                    </svg>
                                                                                    {{ __('Refund Full Payment') }}
                                                                                </a>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                  @endpush

                                                </form>
                                                <form action="{{ route('orders.destroy') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $order->id }}">
                                                    <button type="submit" class="dropdown-item">
                                                        <i data-feather="trash" class="mr-50"></i>
                                                        {{ __("Delete") }}
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <strong>#{{ $order->order_number }}</strong>
                                    </td>
                                    
                                    <td>
                                        @if ($order->class_type == 'service_paris')
                                            <span class="badge badge-glow badge-warning">{{ __('Service paris') }}</span>
                                        @else
                                            <span class="badge badge-glow badge-info">{{ __('Yoga class') }}</span>
                                        @endif
                                    </td>

                                    <td>{{ \Carbon\Carbon::parse($order->created_at)->format('Y-m-d') }}</td>
                                    <td>
                                        @if ($order->order_status == 'pending')
                                            <div class="badge badge-warning">
                                                {{ $order->order_status }}
                                            </div>
                                        @elseif ($order->order_status == 'confirm')
                                            <div class="badge badge-success">
                                                {{ $order->order_status }}
                                            </div>
                                        @else
                                            <div class="badge badge-danger">
                                                {{ $order->order_status }}
                                            </div>
                                        @endif
                                    </td>
                                    <td>{{ $order->order_total }}.00 €</td>
                                    <td>
                                        @if($order->refund_amount)
                                            {{ $order->refund_amount }}.00 €
                                        @else
                                            0.00 €
                                        @endif
                                    </td>
                                    <td>
                                        <div class="badge badge-success">
                                            {{ $order->payment_status }}
                                        </div>
                                    </td>
                                    <td>{{ $order->payment_method }} </td>
                                    <td>{{ $order->customer_ip }} </td>
                                    <td>{{ $order->coupon_code }} </td>
                                    <td>{{ $order->coupon_discount }} </td>
                                    <td>{{ $order->getClass->title ?? '' }} </td>
                                    
                                    <td>
                                        @if ($order->class_date)
                                            {{ \Carbon\Carbon::parse($order->class_date)->format('Y-m-d') }} 
                                        @endif
                                    </td>
                                    <td>
                                        @if ($order->person)
                                            {{ $order->person }} {{ __('Person') }}
                                        @endif
                                    </td>
                                    <td>{{ $order->shipping_name }}</td>
                                    <td>{{ $order->shipping_email }}</td>
                                    <td>{{ $order->shipping_mobile }}</td>
                                    <td>{{ $order->shipping_address }}</td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                @include('includes.pagination' , ['variables' => $orders, 'data_variables' => ['start_date' => request()->start_date,'end_date' => request()->end_date, 'search' => request()->search]])
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
                        $('#delete_id').val(ids);
                    }

                }else{
                    $('.custom-control-input').prop('checked', false);
                    $('#all_actions').removeClass('d-inline-block');
                    $('#all_actions').addClass('d-none');
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
                    $('#delete_id').val(ids);
                }
            });

            $("body").on('click', '.refund_submit', function(e){
                e.preventDefault();
                // alert('hello')
                let refund_amount = $(this).data('refund');
                var id = $(this).data('id');

                let amount = $("#amount"+id).val();
                if(refund_amount < amount)
                {
                    $(this).closest('form').find(".error").html('Refund amount is greater than order amount');
                    $(this).closest('form').find(".error").addClass('alert-danger mt-1');
                    return false;
                }
                else
                {
                    $(this).closest('form')[0].submit();
                }


            });

        });
    </script>

@endpush
