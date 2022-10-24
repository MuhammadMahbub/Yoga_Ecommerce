@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __('Create Order') }}
@endsection

{{-- Active Menu --}}
@section('orderscreate')
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
    <h2 class="content-header-title float-left mb-0">{{ (__"Admin Dashboard") }}</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">{{ (__"Home") }}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('orders.index') }}">{{ (__"Orders") }}</a>
            </li>
            <li class="breadcrumb-item active">
                {{ (__"Create") }}
            </li>
        </ol>
    </div>
@endsection

{{-- Main Content --}}
@section('content')
<div class="row">
    <div class="col-12">
        <form action="{{ route('products.store') }}" method="POST" class="invoice-repeater" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __("Create Orders") }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div data-repeater-list="invoice">
                                <div data-repeater-item>
                                    <div class="row d-flex align-items-end">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="product_id">{{ __("Item Name") }}</label>
                                                <select name="product_id" id="product_id" class="form-control">
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="itemquantity">{{ __("Quantity") }}</label>
                                                <input type="number" class="form-control" id="itemquantity" aria-describedby="itemquantity" placeholder="1" />
                                            </div>
                                        </div>

                                        {{-- <div class="col-md-2 col-12">
                                            <div class="form-group">
                                                <label for="staticprice">Price</label>
                                                <input type="text" readonly class="form-control-plaintext" id="staticprice" value="$0" />
                                            </div>
                                        </div> --}}

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                                    <i data-feather="x" class="mr-25"></i>
                                                    <span>{{ __("Delete") }}</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />
                                </div>
                            </div>
                        </div>

                        <div class="col-12 text-right mt-2">
                            <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                <i data-feather="plus" class="mr-25"></i>
                                <span>{{ __("Add a New") }}</span>
                            </button>
                        </div>

                        <div id="dynamic_product">

                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="order_date">{{ __("Order Date") }} <small class="text-danger">*</small></label>
                                <input type="date" name="order_date" id="order_date" class="form-control flatpickr-human-friendly" placeholder="dd/mm/yyyy">
                            </div>
                            @error('order_date')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="order_status">{{ __("Order Status") }} <small class="text-danger">*</small></label>
                                <select class="select2" name="order_status" id="order_status">
                                    <option value="pending">{{ __("Pending") }}</option>
                                    <option value="processing">{{ __("Processing") }}</option>
                                    <option value="completed">{{ __("Completed") }}</option>
                                    <option value="declined">{{ __("Declined") }}</option>
                                </select>
                            </div>
                            @error('order_status')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="order_type">{{ __("Type") }} <small class="text-danger">*</small></label>
                                <select class="select2" name="order_type" id="order_type">
                                    <option value="manual">{{ __("Manual") }}</option>
                                </select>
                            </div>
                            @error('order_type')
                            <div class="alert alert-danger">
                                <div class="alert-body">
                                    {{ $message }}
                                </div>
                            </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="order_type">{{ __("Order Total") }} <small class="text-danger">*</small></label>
                                <input type="number" class="form-control" name="order_total" placeholder="Order Total....">
                            </div>
                            @error('order_type')
                            <div class="alert alert-danger">
                                <div class="alert-body">
                                    {{ $message }}
                                </div>
                            </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="payment_status">{{ __("Payment Status") }} <small class="text-danger">*</small></label>
                                <select class="select2" name="payment_status" id="payment_status">
                                    <option value="pending">{{ __("Pending") }}</option>
                                    <option value="processing">{{ __("Processing") }}</option>
                                    <option value="completed">{{ __("Completed") }}</option>
                                    <option value="declined">{{ __("Declined") }}</option>
                                </select>
                            </div>
                            @error('payment_status')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="payment_method">{{ __("Payment Method") }} <small class="text-danger">*</small></label>
                                <select class="select2" name="payment_method" id="payment_method">
                                    <option value="cash">{{ __("Cash") }}</option>
                                    <option value="card">{{ __("Card") }}</option>
                                    <option value="stripe">{{ __("Stripe") }}</option>
                                </select>
                            </div>
                            @error('payment_status')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="customer_id">{{ __("Customer") }} <small class="text-danger">*</small></label>
                                <select class="select2" name="customer_id" id="customer_id">
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('payment_status')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="customer_note">{{ __("Customer Note") }}<small class="text-danger">*</small></label>
                                <textarea name="customer_note" id="customer_note" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            @error('customer_note')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <input type="hidden" name="customer_ip" value="{{ request()->ip() }}">

                        <div class="col-12">
                            <div class="form-group">
                                <label for="coupon_name">{{ __("Coupon Name") }} </label>
                              <select name="coupon_name" class="select2" id="coupon_name">
                                    <option value="1">Select Coupon</option>
                                    @foreach ($coupons as $coupon)
                                        <option value="{{ $coupon->code }}">{{ $coupon->code }}</option>
                                    @endforeach
                              </select>
                            </div>
                            @error('coupon_name')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="coupon_discount">{{ __("Coupon Discount") }}</label>
                                <input type="text" disabled class="form-control" id="coupon_discount" name="coupon_discount" placeholder="Coupon discount....">
                            </div>
                            @error('coupon_discount')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="coupon_code">{{ __("Coupon Code") }}</label>
                                <input type="text" disabled class="form-control" id="coupon_code" name="coupon_code" placeholder="Coupon code....">
                            </div>
                            @error('coupon_code')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">{{ __("Same as Customer Address") }}</label>
                                </div>
                            </div>
                            <div class="form-group" id="shipping_name_div">
                                <label for="shipping_name">{{ __("Shipping Name") }}</label>
                                <input type="text"  class="form-control" id="shipping_name" name="shipping_name" placeholder="Shipping name....">
                            </div>
                            @error('shipping_name')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group" id="shipping_email_div">
                                <label for="shipping_email">{{ __("Shipping Email") }}</label>
                                <input type="text"  class="form-control" id="shipping_email" name="shipping_email" placeholder="{{ __("Shipping Email") }}....">
                            </div>
                            @error('shipping_email')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group" id="shipping_mobile_div">
                                <label for="shipping_mobile">{{ __("Phone") }}</label>
                                <input type="text"  class="form-control" id="shipping_mobile" name="shipping_mobile" placeholder="{{ __("Shipping Phone") }}....">
                            </div>
                            @error('shipping_mobile')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group" id="shipping_address_div">
                                <label for="shipping_address">{{ __("Shipping Address") }}</label>
                                <input type="text"  class="form-control" id="shipping_address" name="shipping_address" placeholder="{{ __("Shipping Address") }}....">
                            </div>
                            @error('shipping_address')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group" id="shipping_city_div">
                                <label for="shipping_city">{{ __("Shipping City") }}</label>
                                <input type="text"  class="form-control" id="shipping_city" name="shipping_city" placeholder="{{ __("Shipping City") }}....">
                            </div>
                            @error('shipping_city')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group" id="shipping_country_div">
                                <label for="shipping_country">{{ __("Shipping Country") }}</label>
                                <input type="text"  class="form-control" id="shipping_country" name="shipping_country" placeholder="{{ __("Shipping Country") }}....">
                            </div>
                            @error('shipping_country')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group" id="shipping_zip_div">
                                <label for="shipping_zip">{{ __("Shipping Zip") }}</label>
                                <input type="text"  class="form-control" id="shipping_zip" name="shipping_zip" placeholder="{{ __("Shipping Zip") }}....">
                            </div>
                            @error('shipping_zip')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group" id="shipping_note_div">
                                <label for="shipping_note">{{ __("Shipping Note") }}</label>
                                <input type="text"  class="form-control" id="shipping_note" name="shipping_note" placeholder="{{ __("Shipping Note") }}....">
                            </div>
                            @error('shipping_note')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-success waves-effect waves-float waves-light w-100 w-sm-auto">{{ __("Submit") }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('page-js')

@endpush

@push('js')

    <script src="{{ asset('dashboard_assets/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
    <script src="{{ asset('dashboard_assets/app-assets/js/scripts/forms/form-repeater.js')}}"></script>

    <script>
        $(document).ready(function(){

            $("#coupon_name").change(function(){

                var coupon_name = $(this).val();
                $("#coupon_code").val(coupon_name);

                $.ajax({
                    url: "{{ route('coupon.check') }}",
                    type: "POST",
                    data: {
                        coupon_name: coupon_name,
                    },
                    success: function (data) {
                        $("#coupon_discount").val(data.coupon_discount);
                        if(data.coupon_discount == 0.00)
                        {
                            $("#coupon_code").val('No coupon selected');
                        }
                    },
                });
            });

            $("#customCheck1").click(function(){
                if($(this).is(":checked")){
                    $("#shipping_name_div").addClass('d-none');
                    $("#shipping_email_div").addClass('d-none');
                    $("#shipping_mobile_div").addClass('d-none');
                    $("#shipping_address_div").addClass('d-none');
                    $("#shipping_city_div").addClass('d-none');
                    $("#shipping_country_div").addClass('d-none');
                    $("#shipping_zip_div").addClass('d-none');
                    $("#shipping_note_div").addClass('d-none');
                }
                else{
                    $("#shipping_name_div").removeClass('d-none');
                    $("#shipping_email_div").removeClass('d-none');
                    $("#shipping_mobile_div").removeClass('d-none');
                    $("#shipping_address_div").removeClass('d-none');
                    $("#shipping_city_div").removeClass('d-none');
                    $("#shipping_country_div").removeClass('d-none');
                    $("#shipping_zip_div").removeClass('d-none');
                    $("#shipping_note_div").removeClass('d-none');
                }
            });
        });
    </script>

@endpush
