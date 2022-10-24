<div class="details-page__card__body" style="padding-top: 0">
    <div class="form-group">
        <p class="form-label" style="padding-left: 0">{{ __('Departure') }}:</p>
        <div class="line-height"> 
            <span id="date-select__result">{{ \Carbon\Carbon::parse($pricing->arrive_date)->addDays($class->duration_in_days-1)->locale(app()->getLocale())->translatedFormat('l j F Y') }}</span>
            @if ($class->duration_in_days) 
                <span class="d-block">({{ $class->duration_in_days }} {{ __('days') }} / {{ $class->duration_in_days-1 }} {{ __('nights') }})</span>
            @endif 
        </div>
    </div> 
</div>
<p class="form-label">{{ __('Select an offer') }} :</p>
@foreach ($pricing->item as $price_item)     
    <label class="cusom-option">
        <input type="radio" name="class-by-person" class="cusom-option__input">
        <div class="cusom-option__content">
            <div class="cusom-option__content__header">
                <div class="cusom-option__content__header__left">
                    <strong class="cusom-option__content__header__left__title">{{ $price_item->person }} {{ __('person') }}</strong>
                    <p class="cusom-option__content__header__left__text">{{ $price_item->room_info }}</p>
                </div>
                <div class="cusom-option__content__header__right">
                    @if ($class->discount_last_date &&  \Carbon\Carbon::parse($class->discount_last_date) > \Carbon\Carbon::today())
                        @if (\Carbon\Carbon::parse($class->discount_last_date) >= \Carbon\Carbon::parse($pricing->arrive_date))
                            <strong class="cusom-option__content__header__right__title"> <span class="class_item__price">{{ $price_item->price -  ($price_item->price*$class->discount)/100 }}</span> €</strong> 
                        @else
                            <strong class="cusom-option__content__header__right__title"> <span class="class_item__price">{{ $price_item->price }}</span> €</strong>
                        @endif
                    @else
                        <strong class="cusom-option__content__header__right__title"> <span class="class_item__price">{{ $price_item->price }}</span> €</strong>
                    @endif 
                    <p class="cusom-option__content__header__right__text">{{ __('Total amount') }}</p>
                </div>
            </div>
            <div class="cusom-option__content__body">
                {{-- <p class="cusom-option__content__body__text">{{ $price_item->house_info }}</p> --}}
                {{-- <div class="cusom-option__content__body__footer">
                    <button type="button" class="cusom-option__content__body__footer__btn fullpage-modal-open fullpage-modal-open__button" data-target="classByPersonModal-1" data-person="{{ $price_item->person }}" data-date="{{ $class->pricing->first()->arrive_date }}">{{ __('Reservation request') }}</button>
                </div> --}}
                <div class="cusom-option__content__body">
                    <p class="cusom-option__content__body__text">{{ $price_item->house_info }}</p>
                    <div class="cusom-option__content__body__footer">
                        <button type="button" class="cusom-option__content__body__footer__btn fullpage-modal-open fullpage-modal-open__button" data-target="classByPersonModal-1" data-person="{{ $price_item->person }}" data-date="{{ $class->pricing->first()->arrive_date }}">{{ __("Reservation request") }}</button>
                        <button type="button" class="cusom-option__content__body__footer__btn fullpage-modal-open" data-target="pricingImage{{ $price_item->id }}">
                            {{ __("See Photos") }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </label>

    {{-- Fullpage Image Modal --}}
    <div class="fullpage-modal" id="pricingImage{{ $price_item->id }}">
        <button type="button" class="fullpage-modal__btn fullpage-modal-close">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="fullpage-modal__close__btn" viewBox="0 0 16 16">
                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
            </svg>
        </button>
        <div class="fullpage-modal__container">
            <div class="gallery">
                <div class="gallery__header">
                    <h3 class="gallery__title">{{ __("Photos") }} <small class="gallery__title__sm">({{ $price_item->getImages->count() }})</small></h3>
                </div>
                <div class="row">
                    @foreach ($price_item->getImages as $price_image)
                        <div class="col-md-6 gallery__item">
                            <a href="{{ asset('uploads/price_item_image') }}/{{ $price_image->image }}" data-fancybox="details-image-item{{ $price_item->id }}" class="gallery__item__link">
                                <img src="{{ asset('uploads/price_item_image') }}/{{ $price_image->image }}" alt="gallery image" class="gallery__image">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div> 
@endforeach 