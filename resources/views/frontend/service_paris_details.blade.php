@extends('frontend.layouts.app')

@section('title')
    Service paris details
@endsection

@section('service.paris.index')
    current-menu-item
@endsection

@section('body_class')
    home
@endsection

@section('plugin-css')
<link rel="stylesheet" href="{{ asset('frontend_assets/plugins/fancybox/css/jquery.fancybox.min.css') }}">
@endsection

@section('css')

<style>
    .download_button{
        position: absolute;
        bottom: 10px;
        right: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: fit-content;
        color: #222222;
        box-shadow: 0 4px 14px rgb(0 0 0 / 15%);
        background: #FFF;
        border: 0;
        border-radius: 6px;
        padding: 8px 12px;
        font-weight: 600;
        cursor: pointer;
    }
</style>

@endsection

@section('content')


<div class="pageHeader" style="background-image: url({{asset('uploads/services')}}/{{ $class->image }});">
    <h1>{{ __('Service paris details') }}</h1>
</div>

<div class="contentWrap single-event">
    <div class="pagePanel clear">
        <a href="{{ route('service.paris.index') }}" class="backToBtn"><i></i> {{ __("Back to List") }}</a>
    </div>
    <div class="details-page">
        <div class="details-container">
            <div class="details-page__header">
                <div class="details-page__header__gallery">

                    @foreach ($class->getImages as $class_image)
                        @if ($loop->index == 3) 
                                @break; 
                        @endif
                        <figure class="details-page__header__gallery__item">
                            <a href="{{ asset('uploads/service_gallery') }}/{{ $class_image->image }}" class="details-page__header__gallery__item__link" data-fancybox="details-image-gallery" data-caption="8 personnes sont intéressées">
                                <img src="{{ asset('uploads/service_gallery') }}/{{ $class_image->image }}" alt="details image" class="details-page__header__gallery__item__image">
                            </a>
                            {{-- <figcaption class="details-page__header__gallery__item__caption">8 {{ __("people are interested") }}</figcaption> --}}
                        </figure>
                    @endforeach



                    {{-- <figure class="details-page__header__gallery__item">
                        <a href="https://source.unsplash.com/featured/800x801?yoga" class="details-page__header__gallery__item__link" data-fancybox="details-image-gallery">
                            <img src="https://source.unsplash.com/featured/800x801?yoga" alt="details image" class="details-page__header__gallery__item__image">
                        </a>
                    </figure>


                    <figure class="details-page__header__gallery__item">
                        <a href="https://source.unsplash.com/featured/800x802?yoga" class="details-page__header__gallery__item__link" data-fancybox="details-image-gallery">
                            <img src="https://source.unsplash.com/featured/800x802?yoga" alt="details image" class="details-page__header__gallery__item__image">
                        </a>
                    </figure> --}}


                    <figure class="details-page__header__gallery__item">
                        <div class="embed-responsive">
                            {{-- <video autoplay controls>
                                <source src="{{ asset('frontend_assets/video/awesome-preloader.mp4') }}">
                            </video> --}}
                            {{-- <iframe width="560" height="315" src="https://www.youtube.com/embed/SedzswEwpPw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}

                            {!! $class->video !!}
                        </div>
                    </figure>


                    <button type="button" class="details-page__header__gallery__btn fullpage-modal-open" data-target="imageModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="details-page__header__gallery__btn__icon" viewBox="0 0 16 16">
                            <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                            <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
                        </svg>
                        {{ __("Tout voir") }}
                    </button>

                </div>
                <div class="details-page__header__details">
                    <h2 class="details-page__header__title">{{ $class->title }}</h2>
                    
                    <time datetime="{{ \Carbon\Carbon::parse($class->date)->format('Y-m-d') }}">{{ \Carbon\Carbon::parse($class->date)->format('F d, Y') }}, {{ $class->time }}</time>

                    @if ( $class->file != null)
                        <div class="details-page__header__btn-wrapper">
                            <a href="{{ asset('uploads/service_files') }}/{{ $class->file }}" download class="details-page__header__btn">
                                <strong>{{ __('Download PDF') }}</strong>
                            </a>
                        </div>
                    @endif
                </div>

            </div>
            <div class="details-page__row">

                <div class="details-page__header__body">

                    <div class="details-page__card">
                        <div class="details-page__card__header">
                            {{-- <p class="details-page__card__header__text">{{ $class->lable }}</p> --}}
                            {{-- <h2 class="details-page__card__header__title">
                                {{ $class->title }}
                            </h2> --}}
                        </div>
                        <div class="details-page__card__body">
                            <div class="details-page__card__content">

                                {{ $class->short_description }}
                                <div>
                                    {!! $class->description !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($class->map != null)
                        <div class="details-page__card">
                            <button class="details-page__card__header" type="button" data-toggle="collapse" data-expanded="true">
                                <h2 class="details-page__card__header__title">
                                    <span class="details-page__card__header__title__icon">
                                        <i class="bi bi-geo-alt"></i>
                                    </span>
                                    {{ __('Place of stay') }}
                                </h2>
                            </button>
                            <div class="details-page__card__body">
                                <div class="details-page__card__content">
                                {!! $class->map !!}
                                </div>
                            </div>
                        </div>
                    @endif

                </div>



                <aside class="details-page__header__aside">
                    <div class="details-page__card">
                        <div class="details-page__card__body">
                            <input type="hidden" id="yogaCLassId" value="{{ $class->id }}">
                            @if ($class->training_duration)
                                <h3 class="form-label">{{ $class->training_duration }} </h3>
                            @endif
                            <p>{{ $class->group_size }}</p>
                            <br>
                            <h3 class="form-label">{{ __("Price") }}: €{{ $class->price }}</h3> 
                            {{-- <div class="details-page__card__content">
                                <h3 class="form-label">{{ __("Date") }}: {{ \Carbon\Carbon::parse($class->discount_last_date)->locale(app()->getLocale())->translatedFormat('j F') }}</h3> 
                            </div> --}}
                            
                        
                            {{-- @if ($class->date &&  \Carbon\Carbon::parse($class->date) > \Carbon\Carbon::today())
                            @endif --}}
                            <button type="button" class="cusom-option__content__body__footer__btn fullpage-modal-open fullpage-modal-open__button" data-target="classByPersonModal-1" >{{ __("Reservation request") }}</button>
                        </div>
                    </div>
                </aside>

            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    
    <div class="wrapper">
        @if (Session::has('success'))
            <div class="alert alert-success my-5" role="alert">
                <button type="button" class="alert__close-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </button>
                <div class="alert-body">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="alert-body__icon" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                    </svg>
                    <div class="alert-body__content">
                        <h4 class="alert-body__title">{{ __("Congrats") }}</h4>
                        <p class="alert-body__text">{{ __("Your payment is successfully done.") }}</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>





{{-- Fullpage Image Modal --}}
<div class="fullpage-modal" id="imageModal">
    <button type="button" class="fullpage-modal__btn fullpage-modal-close">
        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="fullpage-modal__close__btn" viewBox="0 0 16 16">
            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
        </svg>
    </button>
    <div class="fullpage-modal__container">
        <div class="gallery">
            <div class="gallery__header">
                <h3 class="gallery__title">{{ __("Photos") }} <small class="gallery__title__sm">({{ $class->getImages->count() }})</small></h3>
            </div>
            <div class="row">
                @foreach ($class->getImages as $class_image)
                    <div class="col-md-6 gallery__item">
                        <a href="{{ asset('uploads/service_gallery') }}/{{ $class_image->image }}" data-fancybox="details-image-gallery" class="gallery__item__link">
                            <img src="{{ asset('uploads/service_gallery') }}/{{ $class_image->image }}" alt="gallery image" class="gallery__image">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

{{-- Class By Person Modal 1 --}}
<div class="fullpage-modal" id="classByPersonModal-1">
    <button type="button" class="fullpage-modal__btn fullpage-modal-close">
        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="fullpage-modal__close__btn" viewBox="0 0 16 16">
            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
        </svg>
    </button>
    <div class="fullpage-modal__container">
        <div class="gallery">
            <div class="gallery__header">
                <h3 class="gallery__title">{{ __("Payment Info") }}</h3>
            </div>
            <form role="form" action="{{ route('class.join.payment') }}" method="post" class="require-validation payment-form" data-cc-on-file="false" id="payment-form">
                @csrf
                <input type="hidden" name="originalPrice" id="originalPrice" value="{{ $class->price }}">
                <input type="hidden" name="price" id="DiscountPrice" value="{{ $class->price }}">
                <input type="hidden" name="date" id="classPricingDate" value="{{ \Carbon\Carbon::parse($class->date)->format('Y-m-d') }}">
                <input type="hidden" name="class_id" value="{{ $class->id }}">
                <input type="hidden" name="class_type" value="service_paris">
                <div class="form-row">
                    <div class="col-12">
                        <div class='form-group'>
                            <label class='control-label form-label'>{{ __("Coupon Code") }}</label>
                            <input class='form-control' type='text' id="couponCode">
                            <div id="CouponMessage" class="form-message hide"></div>
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class='form-group required'>
                                    <label class='control-label form-label'>{{ __("Cardholder Name") }} <span class="text-danger">*</span></label>
                                    <input class='form-control' type='text' name="name" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class='form-group required'>
                                    <label class='control-label form-label'>{{ __("Cardholder Email") }} <span class="text-danger">*</span></label>
                                    <input class='form-control' type='text'name="email" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class='form-group required'>
                                    <label class='control-label form-label'>{{ __("Cardholder Phone") }} <span class="text-danger">*</span></label>
                                    <input class='form-control' type='text' name="phone" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class='form-group required'>
                                    <label class='control-label form-label'>{{ __("Cardholder Address") }} <span class="text-danger">*</span></label>
                                    <input class='form-control' type='text' name="address" required>
                                </div>
                            </div>

                        </div>
                        
                        <div class='form-group card required'>
                            <label class='control-label form-label'>{{ __("Card Number") }} <span class="text-danger">*</span></label>
                            <input autocomplete='off' class='form-control card-number' size='20'type='text'>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class='form-group cvc required'>
                            <label class='control-label form-label'>CVC <span class="text-danger">*</span></label>
                            <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='3' type='text'>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class='form-group expiration required'>
                            <label class='control-label form-label'>{{ __("Expiration Month") }} <span class="text-danger">*</span></label>
                            <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class='form-group expiration required'>
                            <label class='control-label form-label'>{{ __("Expiration Year") }} <span class="text-danger">*</span></label>
                            <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                        </div>
                    </div>
                    <div class='col-12'>
                        <div class="form-group">
                            <div class='form-message form-message--danger error hide'>
                                <div class='error__text'>{{ __("Please correct the errors and try again.") }}</div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="learnMore" type="submit">
                                {{ __("Pay Now") }} <span> €{{ $class->price }}</span> 
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> 

@if ($next_class)
    <div class="nextEventBox" style="background-image: url({{asset('uploads/services')}}/{{ $next_class->image }}">
        <time class="eventItemTime" datetime="2015-02-01">{{ \Carbon\Carbon::parse($class->date)->format('F d, Y') }}, {{ $class->time }}</time>
        <h3>{{ $next_class->title }}</h3>
        <a href="{{ route('class.details', [\Str::slug($next_class->title), $next_class->id]) }}" class="nextEventBtn">{{ __("read next") }}</a>
    </div>
@endif


@endsection

@section('plugin-js')
<script src="{{  asset('frontend_assets/plugins/fancybox/js/jquery.fancybox.min.js')  }}"></script>
@endsection


@section('js')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
    $(function() {
        var $form = $(".require-validation");
        $('form.require-validation').bind('submit', function(e) {
            var $form         = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                                'input[type=text]', 'input[type=file]',
                                'textarea'].join(', '),
                $inputs       = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid         = true;
                $errorMessage.addClass('hide');

                $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
            var $input = $(el);
            if ($input.val() === '') {
                $input.parent().addClass('has-error');
                $errorMessage.removeClass('hide');
                e.preventDefault();
            }
            });

            if (!$form.data('cc-on-file')) {
            e.preventDefault();
            Stripe.setPublishableKey("{{ $stripe->stripe_key }}");
            Stripe.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
            }, stripeResponseHandler);
            }

        });

        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.error__text')
                    .text(response.error.message);
            } else {
                // token contains id, last4, and card type
                var token = response['id'];
                // insert the token into the form so it gets submitted to the server
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/> <input type='hidden' name='coupon' value='" + $('#couponCode').val() + "'/>");
                $form.get(0).submit();
            }
        }

        $('#couponCode').blur(function(){
            var value = $(this).val();
            if(value.trim() != ''){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('class.coupon.check') }}",
                    type: "POST",
                    data: {
                        coupon: value,
                        price : $("#originalPrice").val(),
                    },
                    success: function(response){
                         if(response.error){ 
                            $("#CouponMessage").removeClass('hide');
                            $("#CouponMessage").removeClass('form-message--success');
                            $("#CouponMessage").addClass('form-message--danger');
                            $("#CouponMessage").text(response.error);
                            $("#DiscountPrice").val($("#originalPrice").val());
                            $("#payNowButton").text($("#originalPrice").val());
                            $('#couponCode').val('');
                        }else{ 
                            $("#CouponMessage").removeClass('hide');
                            $("#CouponMessage").removeClass('form-message--danger');
                            $("#CouponMessage").addClass('form-message--success');
                            $('#CouponMessage').text(response.success);
                            $("#DiscountPrice").val(response.price);
                            $("#payNowButton").text(response.price);
                         }
                    },

                });
            }
        });

        $(".payment-form-toggler").on("click", function(){
            $(".payment-form-wrapper").slideDown();
        })

    });

    $(document).ready(function () {
        if($(".details-page__header__gallery .details-page__header__gallery__item").length < 4){
            $(".details-page__header__gallery").addClass("details-page__header__gallery--" + $(".details-page__header__gallery .details-page__header__gallery__item").length)
        }

        /*  Fancybox Init */
	    $('[data-fancybox]').fancybox();

        /* Fullpage Function */
        $(document).on("click", ".fullpage-modal-open", function(){
            let currentModalTarget = $(this).attr("data-target");
            $("html").addClass("overflow-hidden");
            $("#"+currentModalTarget).addClass("show");
        });

        // $(document).on("click", ".fullpage-modal-open__button", function(){
        //     var price = $(this).closest('.cusom-option__content').find('.class_item__price').text();
        //     $("#classPersonNumber").val($(this).attr('data-person'));
        //     $("#classPricingDate").val($(this).attr('data-date'));
        //     $("#originalPrice").val(price);
        //     $("#DiscountPrice").val(price);
        //     $("#payNowButton").text(price);

        // });

        $(document).on("click", '.fullpage-modal-close', function(){
            $("html").removeClass("overflow-hidden");
            $(this).closest(".fullpage-modal").removeClass("show");
        });

        /* Accordion Collapse Function */
        $(document).on("click", '[data-toggle="collapse"]', function(){
            let currentCollapseCard = $(this).closest(".details-page__card");
            let expandedStatus = $(this).attr("data-expanded");

            if(expandedStatus == "true"){
                currentCollapseCard.find(".details-page__card__body").slideUp();
                $(this).attr("data-expanded", "false");
            }
            else{
                currentCollapseCard.find(".details-page__card__body").slideDown();
                $(this).attr("data-expanded", "true");
            }
        });
        $(document).on("change", '#arrivalDateSelect', function(){
            var id = $(this).val(); 
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
           $.ajax({
            url : "{{ route('class.date.change') }}", 
            type: "post",
            data: {
                id : id,
                class_id : $("#yogaCLassId").val(),
            }, 
            success: function(response){
                $('#pricingItemWrap').html(response);
            }
           }); 
        });

    });
</script>
@endsection
