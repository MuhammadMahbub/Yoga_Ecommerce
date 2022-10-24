@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __("Create Yoga Pricing") }}
@endsection

{{-- Active Menu --}}
@section('yogaclassList')
    active
@endsection


@push('css')

<style>
    .image-container{
        position: relative;
        border: 1px solid #d8d6de;
        margin-bottom: 15px;
    }
    .image-container__image{
        max-height: 260px;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .image-container__btn{
        position: absolute;
        top: 5px;
        right: 5px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        border: 0;
        background-color: #ea5455;
        color: #ffffff;
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
            <li class="breadcrumb-item">
                <a href="{{ route('yogaclass.index') }}">{{ __("Yoga Class") }}</a>
            </li>
            <li class="breadcrumb-item active">{{ __("Pricing") }}</li>
        </ol>
    </div>
@endsection

{{-- Main Content --}}
@section('content')
    <div class="row">
        <div class="col-12"> 
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __("Yoga class pricing") }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('class.pricing.info.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $class->id }}">
                        <div class="form-group">
                            <label for="duration_in_days">{{ __('Class duration in days') }}</label> 
                            <div class="input-group">
                                <input type="number" min="1" value="{{ $class->duration_in_days }}" class="form-control" name="duration_in_days"  id="duration_in_days" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">{{ __('Days') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="discountDate">{{ __('Discount') }} (%)</label>
                            <input type="number" name="discount"  value="{{ $class->discount }}" class="form-control" id="discountDate">
                        </div>
                        <div class="form-group">
                            <label for="discountLastDate">{{ __('Discount last date') }}</label>
                            <input type="date" name="discount_last_date" value="{{ $class->discount_last_date }}" class="form-control flatpickr-human-friendly" id="discountLastDate" placeholder="dd/mm/yyyy">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="ml-auto btn btn-success">{{ __('Save changes') }}</button>
                            @if ($class->duration_in_days)
                                <button type="button" class="ml-auto btn btn-primary" data-toggle="modal" data-target="#classPricing">{{ __('Add pricing') }}</button>
                            @endif
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ __("Sl") }}</th>
                                    <th>{{ __("Date") }}</th> 
                                    <th>{{ __("Actions") }}</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach ($class->pricing as $pricing)
                                    <tr>
                                        <td>#</td>
                                        <td>{{ \Carbon\Carbon::parse($pricing->arrive_date)->format('d-m-Y') }}</td> 
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-icon btn-outline-secondary waves-effect dropdown-toggle hide-arrow" data-toggle="dropdown" data-boundary="viewport">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#!" data-toggle="modal" data-target="#classPricingAdd{{ $pricing->id }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart mr-50"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                                        {{ __("Add More Price") }}
                                                    </a>
                                                    <a class="dropdown-item" href="#!" data-toggle="modal" data-target="#classPricingDetails{{ $pricing->id }}">
                                                        <i data-feather="eye" class="mr-50"></i>
                                                        {{ __("Details") }}
                                                    </a>
                                                    <form action="{{ route('class.pricing.delete') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $pricing->id }}">
                                                        <button type="submit" class="dropdown-item">
                                                            <i data-feather="trash" class="mr-50"></i>
                                                            {{ __("Delete") }}
                                                        </button>
                                                    </form>
                                                </div> 
                                            </div>
                                        </td>
                                    </tr> 

                                    @push('all_modals')
                                        <div class="modal fade" id="classPricingDetails{{ $pricing->id }}" tabindex="-1"  aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">{{ __("Class Pricing item") }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            @forelse ($pricing->item as $item)
                                                                <div class="col-12">
                                                                    <div class="card">
                                                                        <div class="card-header">
                                                                            <div class="dropdown ml-auto">
                                                                                <button type="button" class="btn btn-icon btn-outline-secondary waves-effect dropdown-toggle hide-arrow" data-toggle="dropdown" data-boundary="viewport">
                                                                                    <i data-feather="more-vertical"></i>
                                                                                </button>
                                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                                    <a class="dropdown-item" href="#!" class="close" data-dismiss="modal" data-toggle="modal" data-target="#classPricingItemUdpate{{ $item->id }}">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 mr-50"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                                                        {{ __("Edit") }}
                                                                                    </a> 
                                                                                    <form action="{{ route('class.pricing.item.delete') }}" method="POST">
                                                                                        @csrf
                                                                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                                                                        <button type="submit" class="dropdown-item">
                                                                                            <i data-feather="trash" class="mr-50"></i>
                                                                                            {{ __("Delete") }}
                                                                                        </button>
                                                                                    </form>
                                                                                    
                                                                                </div> 
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-body text-center"> 
                                                                            <div class="avatar bg-light-info p-50 m-0">
                                                                                <div class="avatar-content">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users font-medium-5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg> 
                                                                                </div>
                                                                            </div>
                                                                            <h2 class="fw-bolder mt-1">{{ $item->person }} {{ __("Persons") }}</h2>
                                                                            <p class="card-text">{{ $item->price }} €</p>
                                                                            <p class="card-text">{{ $item->room_info }}</p>
                                                                            <p class="card-text">{{ $item->house_info }}</p>
                                                                        </div> 

                                                                        <div class="row">
                                                                            @foreach ($item->getImages as $moreImage)
                                                                                <div class="col-lg-3 col-md-4 col-sm-6 image-container-wrapper">
                                                                                    <div class="image-container">
                                                                                        <img src="{{ asset('uploads/price_item_image')}}/{{ $moreImage->image }}" alt="preview image" class="image-container__image">
                                                                                        <button type="button" class="image-container__btn" data-id="{{ $moreImage->id }}">
                                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                                                            </svg>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @push('all_modals')
                                                                    <div class="modal fade" id="classPricingItemUdpate{{ $item->id }}" tabindex="-1"  aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title">{{ __("Class Pricing") }}</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form action="{{ route('class.pricing.update.more') }}" method="POST" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        <input type="hidden" name="id" value="{{ $item->id }}">   
                                                                                        <div class="form-group">
                                                                                            <h3 class="modal-title">{{ __("Pricing Item") }}</h3>
                                                                                        </div> 
                                                                                        <div class="form-group">
                                                                                            <label>{{ __("Person") }} <small class="text-danger">*</small></label>
                                                                                            <input type="number" name="person" value="{{ $item->person }}" min="1" class="form-control" required> 
                                                                                        </div> 
                                                                                        <div class="form-group">
                                                                                            <label>{{ __("Price") }} <small class="text-danger">*</small></label>
                                                                                            <input type="number" step="any" min="1" value="{{ $item->price }}" name="price" class="form-control" required>
                                                                                        </div>  
                                                                                        <div class="form-group">
                                                                                            <label>{{ __("Room information") }} (FR)<small class="text-danger">*</small></label>
                                                                                            {{ app()->setLocale('fr') }}
                                                                                            <input type="text" name="room_info[fr]" value="{{ $item->room_info }}"  class="form-control" required>
                                                                                            {{ app()->setLocale($locale) }}
                                                                                        </div> 
                                                                                        <div class="form-group">
                                                                                            <label>{{ __("Room information") }} (EN)</label>
                                                                                            {{ app()->setLocale('en') }}
                                                                                            <input type="text" name="room_info[en]" value="{{ $item->room_info }}"  class="form-control">
                                                                                            {{ app()->setLocale($locale) }}
                                                                                        </div> 
                                                                                        <div class="form-group">
                                                                                            <label>{{ __("Information about the house") }} (FR)<small class="text-danger">*</small></label>
                                                                                            {{ app()->setLocale('fr') }}
                                                                                                <input type="text" name="house_info[fr]" value="{{ $item->house_info }}" class="form-control" required>
                                                                                            {{ app()->setLocale($locale) }}
                                                                                        </div>  
                                                                                        <div class="form-group">
                                                                                            <label>{{ __("Information about the house") }} (EN)</label>
                                                                                            {{ app()->setLocale('en') }}
                                                                                                <input type="text" name="house_info[en]" value="{{ $item->house_info }}" class="form-control">
                                                                                            {{ app()->setLocale($locale) }}
                                                                                        </div>  
                                                                                        <div class="form-group">
                                                                                            <label>{{ __("Image") }}</label>
                                                                                            <input type="file" name="image[]" class="form-control" multiple>
                                                                                        </div>
                                                                                        <div class="text-right">
                                                                                            <button type="submit" class="btn btn-success">{{ __("Save changes") }}</button>
                                                                                        </div>
                                                                                    </form>  
                                                                                </div> 
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endpush
                                                            @empty
                                                                <div class="col-12">
                                                                    <h3 class="text-center my-5">{{ __('No Item Found') }}</h3>
                                                                </div>
                                                            @endforelse 
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="classPricingAdd{{ $pricing->id }}" tabindex="-1"  aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">{{ __("Class Pricing") }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('class.pricing.add.more') }}" method="POST" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $pricing->id }}">  
                                                            <div id="priceItem__more"> 
                                                                <div class="form-group">
                                                                    <h3 class="modal-title">{{ __("Pricing Item") }}</h3>
                                                                </div> 
                                                                <div class="form-group">
                                                                    <label>{{ __("Person") }} <small class="text-danger">*</small></label>
                                                                    <input type="number" name="person[]" min="1" class="form-control" required>
                                                                    <input type="hidden" name="count[]" value="1">
                                                                </div> 
                                                                <div class="form-group">
                                                                    <label>{{ __("Price") }} <small class="text-danger">*</small></label>
                                                                    <input type="number" step="any" min="1" name="price[]" class="form-control" required>
                                                                </div> 
                                                                <div class="form-group">
                                                                    <label>{{ __("Room information") }} (FR)<small class="text-danger">*</small></label>
                                                                    <input type="text" name="room_info[fr][]" class="form-control" required>
                                                                </div> 
                                                                <div class="form-group">
                                                                    <label>{{ __("Room information") }} (EN)</label>
                                                                    <input type="text" name="room_info[en][]" class="form-control">
                                                                </div> 
                                                                <div class="form-group">
                                                                    <label>{{ __("Information about the house") }} (FR)<small class="text-danger">*</small></label>
                                                                    <input type="text" name="house_info[fr][]" class="form-control" required>
                                                                </div>  
                                                                <div class="form-group">
                                                                    <label>{{ __("Information about the house") }} (EN)</label>
                                                                    <input type="text" name="house_info[en][]" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>{{ __("Image") }} <small class="text-danger">*</small></label>
                                                                    <input type="file" name="image[1][]" class="form-control" required multiple>
                                                                </div>  
                                                            </div>
                                                        </div> 
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success">{{ __("Save changes") }}</button>
                                                            <button type="button" class="btn btn-primary" id="addMorePriceItem__more">{{ __("Add More Item") }}</button>
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
                </div>
            </div> 
        </div>
    </div>

    <div class="modal fade" id="classPricing" tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __("Class Pricing") }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('class.pricing.date.store') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id" value="{{ $class->id }}"> 
                        <div class="form-group">
                            <label for="arriveDate">{{ __("Date of arrival") }}<small class="text-danger">*</small></label>
                            <input type="date" name="arrive_date" class="form-control flatpickr-human-friendly__min_date"
                            @if($class->pricing->count()>0)
                                data-min-date="{{ \Carbon\Carbon::parse($class->pricing->last()->arrive_date)->addDays($class->duration_in_days)->format('Y-m-d') }}"
                            @else
                                data-min-date="{{ \Carbon\Carbon::today()->format('Y-m-d') }}"
                            @endif
                              id="arriveDate" placeholder="dd/mm/yyyy" required>
                        </div> 
                        <div id="priceItem"> 
                            <div class="form-group">
                                <h3 class="modal-title">{{ __("Pricing Item") }}</h3>
                            </div> 
                            <div class="form-group">
                                <label>{{ __("Person") }} <small class="text-danger">*</small></label>
                                <input type="number" name="person[]" min="1" class="form-control" required>
                                <input type="hidden" name="count[]" value="1">
                            </div> 
                            <div class="form-group">
                                <label>{{ __("Price") }} <small class="text-danger">*</small></label>
                                <input type="number" step="any" min="1" name="price[]" class="form-control" required>
                            </div> 
                            <div class="form-group">
                                <label>{{ __("Room information") }} (FR)<small class="text-danger">*</small></label>
                                <input type="text" name="room_info[fr][]" class="form-control" required>
                            </div> 
                            <div class="form-group">
                                <label>{{ __("Room information") }} (EN)</label>
                                <input type="text" name="room_info[en][]" class="form-control">
                            </div> 
                            <div class="form-group">
                                <label>{{ __("Information about the house") }} (FR)<small class="text-danger">*</small></label>
                                <input type="text" name="house_info[fr][]" class="form-control" required>
                            </div>  
                            <div class="form-group">
                                <label>{{ __("Information about the house") }} (EN)</label>
                                <input type="text" name="house_info[en][]" class="form-control">
                            </div>  
                            <div class="form-group">
                                <label>{{ __("Image") }}<small class="text-danger">*</small></label>
                                <input type="file" name="image[1][]" class="form-control" required multiple>
                            </div>  
                        </div>
                    </div> 
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">{{ __("Save changes") }}</button>
                        <button type="button" class="btn btn-primary" id="addMorePriceItem">{{ __("Add More Item") }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




@endsection

@push('js')
    <script>
        let count = 1;
        $(document).ready(function(){ 
           $(".flatpickr-human-friendly__min_date").flatpickr({
                altInput: true,
                altFormat: 'd/m/Y',
                dateFormat: 'Y-m-d',
                minDate : $('.flatpickr-human-friendly__min_date').attr('data-min-date'),
            }); 

            $('#addMorePriceItem').click(function(){
                count = count + 1;

                var data = `<div class="new__div" style="display:none">
                                <div class="form-group d-flex align-items-center justify-content-between flex-wrap">
                                    <h3 class="modal-title">Pricing Item</h3> <button type="button" class="btn btn-icon btn-outline-danger new__div__remover"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                </div> 
                                <div class="form-group">
                                    <label>{{ __("Person") }} <small class="text-danger">*</small></label>
                                    <input type="number" name="person[]" min="1" class="form-control" required>
                                    <input type="hidden" name="count[]" value="`+count+`">
                                </div> 
                                <div class="form-group">
                                    <label>{{ __("Price") }} <small class="text-danger">*</small></label>
                                    <input type="number" step="any" min="1" name="price[]" class="form-control" required>
                                </div> 
                                <div class="form-group">
                                    <label>{{ __("Room information") }} (FR)<small class="text-danger">*</small></label>
                                    <input type="text" name="room_info[fr][]" class="form-control" required>
                                </div> 
                                <div class="form-group">
                                    <label>{{ __("Room information") }} (EN)</label>
                                    <input type="text" name="room_info[en][]" class="form-control">
                                </div> 
                                <div class="form-group">
                                    <label>{{ __("Information about the house") }} (FR)<small class="text-danger">*</small></label>
                                    <input type="text" name="house_info[fr][]" class="form-control" required>
                                </div>  
                                <div class="form-group">
                                    <label>{{ __("Information about the house") }} (EN)</label>
                                    <input type="text" name="house_info[en][]" class="form-control">
                                </div>   
                                <div class="form-group">
                                    <label>{{ __('Image') }} <small class="text-danger">*</small></label>
                                    <input type="file" name="image[`+count+`][]" class="form-control" required multiple>
                                </div> 
                            </div>`;
                $('#priceItem').append(data);
                $('.new__div').slideDown();
                    
            });
            $('#addMorePriceItem__more').click(function(){
                count = count + 1;

                var data = `<div class="new__div" style="display:none">
                                <div class="form-group d-flex align-items-center justify-content-between flex-wrap">
                                    <h3 class="modal-title">Pricing Item</h3> <button type="button" class="btn btn-icon btn-outline-danger new__div__remover"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                </div> 
                                <div class="form-group">
                                    <label>{{ __("Person") }} <small class="text-danger">*</small></label>
                                    <input type="number" name="person[]" min="1" class="form-control" required>
                                    <input type="hidden" name="count[]" value="`+count+`">
                                </div> 
                                <div class="form-group">
                                    <label>{{ __("Price") }} <small class="text-danger">*</small></label>
                                    <input type="number" step="any" min="1" name="price[]" class="form-control" required>
                                </div> 
                                <div class="form-group">
                                    <label>{{ __("Room information") }} (FR)<small class="text-danger">*</small></label>
                                    <input type="text" name="room_info[fr][]" class="form-control" required>
                                </div> 
                                <div class="form-group">
                                    <label>{{ __("Room information") }} (EN)</label>
                                    <input type="text" name="room_info[en][]" class="form-control">
                                </div> 
                                <div class="form-group">
                                    <label>{{ __("Information about the house") }} (FR)<small class="text-danger">*</small></label>
                                    <input type="text" name="house_info[fr][]" class="form-control" required>
                                </div>  
                                <div class="form-group">
                                    <label>{{ __("Information about the house") }} (EN)</label>
                                    <input type="text" name="house_info[en][]" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Image') }} <small class="text-danger">*</small></label>
                                    <input type="file" name="image[`+count+`][]" class="form-control" required multiple>
                                </div> 
                            </div>`;
                $('#priceItem__more').append(data);
                $('.new__div').slideDown();
                    
            });

            $(document).on('click', '.new__div__remover', function(){
                $(this).closest('.new__div').slideUp('normal', function(){
                    $(this).remove()
                });
            });
        });
    </script>


    <script>
        $(document).ready(function () {
            $(document).on("click", ".image-container__btn", function(){
                $(this).closest(".image-container-wrapper").fadeOut("normal", function(){
                    $(this).remove();
                })

                let id = $(this).attr('data-id');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('class.pricing.item.image.delete') }}",
                    type: "post",
                    data: {
                        id:id,
                    },
                    success: function (response) {
                        
                    }
                });


            });
        });
    </script>

@endpush

