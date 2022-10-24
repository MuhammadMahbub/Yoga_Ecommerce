@extends('frontend.layouts.app')

@section('title')
    Class Details
@endsection

@section('classes')
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


<div class="pageHeader" style="background-image: url({{asset('uploads/class')}}/{{ $class->image }});">
    <h1>{{ __('Class Details') }}</h1>
</div>

<div class="contentWrap single-event">
    <div class="pagePanel clear">
        <a href="{{ route('classes') }}" class="backToBtn"><i></i> {{ __("Back to Classes") }}</a>
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
                            <a href="{{ asset('uploads/class_gallery') }}/{{ $class_image->image }}" class="details-page__header__gallery__item__link" data-fancybox="details-image-gallery" data-caption="8 personnes sont intéressées">
                                <img src="{{ asset('uploads/class_gallery') }}/{{ $class_image->image }}" alt="details image" class="details-page__header__gallery__item__image">
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
                            <a href="{{ asset('uploads/yoga_files') }}/{{ $class->file }}" download class="details-page__header__btn">
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
                            <p class="details-page__card__header__text">{{ $class->lable }}</p>
                            <h2 class="details-page__card__header__title">
                                {{ $class->subtitle }}
                            </h2>
                        </div>
                        <div class="details-page__card__body">
                            <div class="details-page__card__content">
                                @if ($class->expart_word != null)
                                    <blockquote>
                                        {{ $class->expart_word }}
                                    </blockquote>
                                @endif

                                {{ $class->short_description }}
                                <div>
                                    {!! $class->description !!}
                                </div>
                            </div>
                            <div class="details-page__card__footer">
                                <ul class="icon-list">
                                    @if ($class->training_duration != null)
                                        <li class="icon-list__item">
                                            <span class="icon-list__item__icon">
                                                <i class="bi bi-calendar4"></i>
                                            </span>
                                            <span class="icon-list__item__text">
                                            {{ $class->training_duration }}
                                            </span>
                                        </li>
                                    @endif

                                    @if ($class->other_language != null)
                                        <li class="icon-list__item">
                                            <span class="icon-list__item__icon">
                                                <i class="bi bi-chat-left-dots"></i>
                                            </span>
                                            <span class="icon-list__item__text">
                                                Autres langues parlées: {{ $class->other_language }}
                                            </span>
                                        </li>
                                    @endif

                                    @if ($class->group_size)
                                        <li class="icon-list__item">
                                            <span class="icon-list__item__icon">
                                                <i class="bi bi-people"></i>
                                            </span>
                                            <span class="icon-list__item__text">
                                                Taille du groupe: {{ $class->group_size }}
                                            </span>
                                        </li>
                                    @endif

                                </ul>
                            </div>
                        </div>
                    </div>


                    @if ($class->health_hygiene != null)
                        <div class="details-page__card">
                            <button class="details-page__card__header" type="button" data-toggle="collapse" data-expanded="true">
                                <h2 class="details-page__card__header__title">
                                    <span class="details-page__card__header__title__icon">
                                        <i class="bi bi-bandaid"></i>
                                    </span>
                                    Santé et hygiène
                                </h2>
                            </button>
                            <div class="details-page__card__body">
                                <div class="details-page__card__content">
                                   {!! $class->health_hygiene !!}
                                </div>
                            </div>
                        </div>
                    @endif



                    @if ($class->hosting != null)
                        <div class="details-page__card">
                            <button class="details-page__card__header" type="button" data-toggle="collapse" data-expanded="false">
                                <h2 class="details-page__card__header__title">
                                    <span class="details-page__card__header__title__icon">
                                        <i class="bi bi-minecart"></i>
                                    </span>
                                    Hébergement
                                </h2>
                            </button>
                            <div class="details-page__card__body hide">
                                <div class="details-page__card__content">
                                    {!! $class->hosting  !!}
                                </div>
                            </div>
                        </div>
                    @endif



                    @if (count($class->getTrainers) > 0 )
                        <div class="details-page__card">
                            <button class="details-page__card__header" type="button" data-toggle="collapse" data-expanded="true">
                                <h2 class="details-page__card__header__title">
                                    <span class="details-page__card__header__title__icon">
                                        <i class="bi bi-minecart"></i>
                                    </span>
                                    Professeurs 
                                </h2>
                            </button>
                            <div class="details-page__card__body">
                                <div class="user-details-list">

                                    @foreach ($class->getTrainers as $trainers)
                                        <div class="user-details-list__item">
                                            <div class="user-details-list__item__header">
                                                <div class="user-details-list__item__header__avatar">
                                                    <div class="user-details-list__item__header__avatar__image-wrapper">
                                                        <img src="{{ asset('uploads/teams') }}/{{ $trainers->getTrainerInfo->image }}" alt="avatar image" class="user-details-list__item__header__avatar__image">
                                                    </div>
                                                </div>
                                                <div class="user-details-list__item__header__details">
                                                    <h3 class="user-details-list__item__header__title">{{ $trainers->getTrainerInfo->name }}</h3>
                                                </div>
                                            </div>
                                            <div class="user-details-list__item__body">
                                                <ul class="certificate-list">
                                                    <li class="certificate-list__item">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="10" width="10" class="certificate-list__item__icon"><g fill-rule="evenodd" fill="none"><path fill-opacity=".2" d="M5 7.5L2.061 9.045l.561-3.272L.245 3.455l3.286-.478L5 0l1.47 2.977 3.285.478-2.377 2.318.56 3.272z" fill="#FF9B35"></path><path d="M6.44 3L2 8.91l2.862-1.377L7.764 8.91l-.379-2.955L9.551 3.5z" fill="#FFCD9A"></path><path d="M5 7.5L2.061 9.045l.561-3.272L.245 3.455l3.286-.478L5 0l1.47 2.977 3.285.478-2.377 2.318.56 3.272z" stroke="#FF9B35"></path></g></svg>
                                                        <span class="certificate-list__item__text">{{ $trainers->getTrainerInfo->designation }}</span>
                                                    </li>
                                                </ul>
                                                <div class="read-more">
                                                    <div class="read-more__content">
                                                        {!! $trainers->getTrainerInfo->description  !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                    {{-- <div class="user-details-list__item">
                                        <div class="user-details-list__item__header">
                                            <div class="user-details-list__item__header__avatar">
                                                <div class="user-details-list__item__header__avatar__image-wrapper">
                                                    <img src="https://i.pravatar.cc/30{{ random_int(1, 9) }}" alt="avatar image" class="user-details-list__item__header__avatar__image">
                                                </div>
                                            </div>
                                            <div class="user-details-list__item__header__details">
                                                <h3 class="user-details-list__item__header__title">Hélèn Pétry</h3>
                                            </div>
                                        </div>
                                        <div class="user-details-list__item__body">
                                            <div class="read-more">
                                                <div class="read-more__content">
                                                    Carline a 50 ans et a commencé le yoga suite à un accident à l’âge de 20 ans. Elle a expérimenté différents styles de yoga au cours des années, aujourd’hui après une formation de 4 ans à l’Institut Français du Yoga, elle enseigne et ce, depuis 2016. Le yoga qu’elle enseigne est la synthèse de sa vie de yogini et de femme, l’important est de toujours respecter son corps, synchroniser son souffle avec ses possibilités physiques. La pratique du yoga est pour elle une source d’inspiration toujours renouvelée tout en restant dans la tradition. Le yoga rend les êtres libres et se pratique partout en toute liberté.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="user-details-list__item">
                                        <div class="user-details-list__item__header">
                                            <div class="user-details-list__item__header__avatar">
                                                <div class="user-details-list__item__header__avatar__image-wrapper">
                                                    <img src="https://i.pravatar.cc/30{{ random_int(1, 9) }}" alt="avatar image" class="user-details-list__item__header__avatar__image">
                                                </div>
                                                <svg xmlns="http://www.w3.org/2000/svg" height="31" width="26" class="user-details-list__item__header__avatar__icon"><g fill-rule="evenodd" fill="none"><circle r="13" cy="13" cx="13" fill="#FFF"></circle><path d="M13.127 6.528l1.883 1.903 2.733-.186.253 3.053 1.848 1.288-1.848 2.1v2.664H15.38l-1.89 1.987-2.243-1.987-2.585.25-.197-2.914-2.056-1.753 1.88-1.635V8.43h2.292z" fill="#FFEFAE"></path><path d="M10.114 17.502v11.789l3.013-3.476 2.946 3.476.26-12.291-1.831.813-1.278 1.521-1.25-1.521L10.389 17z" fill="#FFCD9A"></path><path d="M12.01 17.733v9.536l-1.726 1.69V17.157z" fill="#FFF"></path><path d="M17.428 8.571l-5.635 8.642 1.547 1.985 1.976-1.985 2.592.229.264-2.905 1.672-1.662L17.908 11z" fill="#FFCB00"></path><path fill-rule="nonzero" d="M19.386 11.409a1.417 1.417 0 0 1-.89-.765c-.171-.37-.17-.794.002-1.164a1.402 1.402 0 0 0-.108-1.342 1.448 1.448 0 0 0-1.197-.65 1.52 1.52 0 0 0-.653.16 1.547 1.547 0 0 1-.653.155 1.463 1.463 0 0 1-1.371-.907 1.458 1.458 0 0 0-1.443-.893 1.441 1.441 0 0 0-1.397.977c-.216.578-.779.96-1.404.951a1.628 1.628 0 0 1-.594-.115 1.495 1.495 0 0 0-.607-.129 1.448 1.448 0 0 0-1.24.668c-.266.42-.291.946-.066 1.389.176.355.192.768.042 1.135-.149.367-.449.656-.826.793-.6.193-.999.752-.98 1.373.018.62.449 1.156 1.059 1.314.394.118.718.397.888.766.17.37.17.793 0 1.163-.196.436-.155.94.108 1.342.263.4.713.645 1.198.65h.221V31l3.748-4.249L16.938 31V18.017c.141.046.289.072.437.077.504.005.973-.248 1.24-.668.266-.42.292-.946.066-1.39a1.375 1.375 0 0 1-.062-1.155c.15-.376.459-.67.846-.805.576-.209.952-.757.934-1.361a1.411 1.411 0 0 0-1.013-1.306zm-3.754 16.126l-1.417-1.62-.992-1.137-.992 1.138-1.417 1.62V18.01a1.44 1.44 0 0 1 1.182.88c.184.458.598.787 1.09.869.087.022.177.035.268.038.094-.006.188-.02.28-.038a1.404 1.404 0 0 0 1.097-.932c.141-.4.458-.717.862-.862v9.57h.04zm3.37-14.66c-.74.27-1.326.842-1.607 1.568a2.611 2.611 0 0 0 .124 2.185c.02.027.02.063 0 .09a.183.183 0 0 1-.15.09h-.085a2.47 2.47 0 0 0-.352-.11h-.125l-.15-.031a3.168 3.168 0 0 0-.49-.052h-.476c-.12.02-.237.047-.353.084h-.071c-.079 0-.17.045-.248.077-.723.307-1.28.9-1.535 1.633 0 .058-.039.064-.052.07h-.124l-.052-.064a2.806 2.806 0 0 0-1.56-1.53l-.23-.064h-.045a2.815 2.815 0 0 0-.81-.129h-.202a1.015 1.015 0 0 0-.196 0 2.85 2.85 0 0 0-.724.18l-.131.058a.285.285 0 0 1-.091 0 .183.183 0 0 1-.15-.09v-.09a2.63 2.63 0 0 0 0-2.185 2.754 2.754 0 0 0-1.692-1.485c-.065 0-.104-.045-.104-.116 0-.07.033-.096.098-.122a2.741 2.741 0 0 0 1.606-1.568 2.611 2.611 0 0 0-.124-2.186v-.09a.183.183 0 0 1 .15-.09h.085c.714.304 1.525.3 2.237-.008a2.775 2.775 0 0 0 1.517-1.618s0-.096.163-.096a.15.15 0 0 1 .164.09 2.75 2.75 0 0 0 2.611 1.722c.433-.002.86-.1 1.247-.289a.179.179 0 0 1 .092 0 .183.183 0 0 1 .15.09v.084a2.649 2.649 0 0 0 0 2.192c.322.71.938 1.25 1.69 1.484.066 0 .105.045.105.116 0 .07-.013.174-.11.2z" fill="#000"></path></g></svg>
                                            </div>
                                            <div class="user-details-list__item__header__details">
                                                <h3 class="user-details-list__item__header__title">Noël Picard</h3>
                                            </div>
                                        </div>
                                        <div class="user-details-list__item__body">
                                            <ul class="certificate-list">
                                                <li class="certificate-list__item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="10" width="10" class="certificate-list__item__icon"><g fill-rule="evenodd" fill="none"><path fill-opacity=".2" d="M5 7.5L2.061 9.045l.561-3.272L.245 3.455l3.286-.478L5 0l1.47 2.977 3.285.478-2.377 2.318.56 3.272z" fill="#FF9B35"></path><path d="M6.44 3L2 8.91l2.862-1.377L7.764 8.91l-.379-2.955L9.551 3.5z" fill="#FFCD9A"></path><path d="M5 7.5L2.061 9.045l.561-3.272L.245 3.455l3.286-.478L5 0l1.47 2.977 3.285.478-2.377 2.318.56 3.272z" stroke="#FF9B35"></path></g></svg>
                                                    <span class="certificate-list__item__text">Institut d'Études Politiques de Paris</span>
                                                </li>
                                            </ul>
                                            <div class="read-more">
                                                <div class="read-more__content">
                                                    Carline a 50 ans et a commencé le yoga suite à un accident à l’âge de 20 ans. Elle a expérimenté différents styles de yoga au cours des années, aujourd’hui après une formation de 4 ans à l’Institut Français du Yoga, elle enseigne et ce, depuis 2016. Le yoga qu’elle enseigne est la synthèse de sa vie de yogini et de femme, l’important est de toujours respecter son corps, synchroniser son souffle avec ses possibilités physiques. La pratique du yoga est pour elle une source d’inspiration toujours renouvelée tout en restant dans la tradition. Le yoga rend les êtres libres et se pratique partout en toute liberté.
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($class->place_to_stay != null || $class->map != null)
                        <div class="details-page__card">
                            <button class="details-page__card__header" type="button" data-toggle="collapse" data-expanded="true">
                                <h2 class="details-page__card__header__title">
                                    <span class="details-page__card__header__title__icon">
                                        <i class="bi bi-geo-alt"></i>
                                    </span>
                                    Lieu du séjour 
                                </h2>
                            </button>
                            <div class="details-page__card__body">
                                <div class="details-page__card__content">
                                   {!! $class->place_to_stay !!}
                                   
                                   {!! $class->map !!}
                                </div>
                            </div>
                        </div>
                    @endif 
                </div>
                
                @if ($class->pricing->first())
                    <aside class="details-page__header__aside">
                        <div class="details-page__card">
                            <div class="details-page__card__body">
                                <input type="hidden" id="yogaCLassId" value="{{ $class->id }}">
                                @if ($class->duration_in_days)
                                    <h3 class="form-label">{{ $class->duration_in_days }} {{ __("days") }} / {{ $class->duration_in_days-1 }} {{ __("nights") }} </h3>
                                @endif
                                {{-- <p>à partir de <strong class="bold-text">US$696</strong></p> --}}
                                <br>
                                @if ($class->discount_last_date &&  \Carbon\Carbon::parse($class->discount_last_date) > \Carbon\Carbon::today())
                                    <div class="details-page__card__content">
                                        <h2>{{ __("Special discount") }}:</h2> 
                                        {{ __("The rates below include a last minute discount of") }} <strong>{{ $class->discount }}%</strong>  {{ __("on some rooms for arrival on") }} {{ \Carbon\Carbon::parse($class->discount_last_date)->locale(app()->getLocale())->translatedFormat('j F') }}. {{ __("To take advantage of this, book or book before the day of arrival!") }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="arrivalDateSelect" class="form-label">{{ __("Date of arrival") }}:</label>
                                    <select id="arrivalDateSelect" class="form-control">
                                        @foreach ($class->pricing as $pricing)
                                        <option {{ $loop->first ? 'selected':'' }} value="{{ $pricing->id }}">{{ \Carbon\Carbon::parse($pricing->arrive_date)->locale(app()->getLocale())->translatedFormat('l j F Y') }}</option>
                                        @endforeach 
                                    </select>
                                </div>  
                            </div>
                            <div class="form-group cusom-option-wrapper" id="pricingItemWrap">
                                <div class="details-page__card__body" style="padding-top: 0">
                                    <div class="form-group">
                                        <p class="form-label" style="padding-left: 0">{{ __("Departure") }}:</p> 
                                        <div class="line-height">
                                            @if ($class->pricing->first())
                                                <span id="date-select__result">{{ \Carbon\Carbon::parse($class->pricing->first()->arrive_date)->addDays($class->duration_in_days-1)->locale(app()->getLocale())->translatedFormat('l j F Y') }}</span>
                                                @if ($class->duration_in_days) 
                                                    <span class="d-block">({{ $class->duration_in_days }} {{ __("days") }} / {{ $class->duration_in_days-1 }} {{ __("nights") }})</span>
                                                @endif
                                            @endif
                                        </div>
                                    </div> 
                                </div> 
                                <p class="form-label">{{ __("Select an offer") }} :</p>
                                @foreach ($class->pricing->first()->item as $price_item)     
                                    <label class="cusom-option">
                                        <input type="radio" name="class-by-person" class="cusom-option__input">
                                        <div class="cusom-option__content">
                                            <div class="cusom-option__content__header">
                                                <div class="cusom-option__content__header__left">
                                                    <strong class="cusom-option__content__header__left__title">{{ $price_item->person }} {{ __("person") }}</strong>
                                                    <p class="cusom-option__content__header__left__text">{{ $price_item->room_info }}</p>
                                                </div>
                                                <div class="cusom-option__content__header__right">
                                                    @if ($class->discount_last_date &&  \Carbon\Carbon::parse($class->discount_last_date) > \Carbon\Carbon::today())
                                                        @if (\Carbon\Carbon::parse($class->discount_last_date) >= \Carbon\Carbon::parse($class->pricing->first()->arrive_date))
                                                            <strong class="cusom-option__content__header__right__title"> <span class="class_item__price">{{ $price_item->price -  ($price_item->price*$class->discount)/100 }}</span> €</strong> 
                                                        @else
                                                            <strong class="cusom-option__content__header__right__title"> <span class="class_item__price">{{ $price_item->price }}</span> €</strong>
                                                        @endif
                                                    @else
                                                        <strong class="cusom-option__content__header__right__title"> <span class="class_item__price">{{ $price_item->price }}</span> €</strong>
                                                    @endif
                                                    <p class="cusom-option__content__header__right__text">{{ __("Total amount") }}</p>
                                                </div>
                                            </div>
                                          
                                            <div class="cusom-option__content__body">
                                                <p class="cusom-option__content__body__text">{{ $price_item->house_info }}</p>
                                                <div class="cusom-option__content__body__footer">
                                                    <button type="button" class="cusom-option__content__body__footer__btn fullpage-modal-open fullpage-modal-open__button" data-target="classByPersonModal-1" data-person="{{ $price_item->person }}" data-date="{{ $class->pricing->first()->arrive_date }}">{{ __("Reservation request") }}</button>
                                                    <button type="button" class="cusom-option__content__body__footer__btn fullpage-modal-open" data-target="pricingImage{{ $price_item->id }}">
                                                        {{ __("See Photos") }}
                                                    </button>
                                                </div>
                                            </div>

                                            {{-- <div class="cusom-option__content__body" style="margin-top: 2px">
                                                <div class="cusom-option__content__body__footer">
                                                    <button type="button" class="cusom-option__content__body__footer__btn fullpage-modal-open fullpage-modal-open__button" data-target="classByPersonModal-1" data-person="{{ $price_item->person }}" data-date="{{ $class->pricing->first()->arrive_date }}">View Images</button>
                                                </div>
                                            </div> --}}
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
                            </div>  
                        </div>
                    </aside>
                @else 
                    <aside class="details-page__header__aside blur-parent">
                        <div class="blur-parent__content">
                            <strong class="text-danger">{{ __('Price comming soon') }}</strong>
                        </div>
                        <div class="details-page__card__body"> 
                        </div>  
                    </aside>
                @endif
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
                        {{-- <p>{{ Session::get('success') }}</p> --}}
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
                        <a href="{{ asset('uploads/class_gallery') }}/{{ $class_image->image }}" data-fancybox="details-image-gallery" class="gallery__item__link">
                            <img src="{{ asset('uploads/class_gallery') }}/{{ $class_image->image }}" alt="gallery image" class="gallery__image">
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
                <input type="hidden" name="person" id="classPersonNumber">
                <input type="hidden" name="date" id="classPricingDate">
                <input type="hidden" name="class_id" value="{{ $class->id }}">
                <input type="hidden" name="class_type" value="yoga_class">
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
                                {{ __("Pay Now") }} <span  id="payNowButton">{{ $class->price }}</span> €
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> 

@if ($next_class)
    <div class="nextEventBox" style="background-image: url({{asset('uploads/class')}}/{{ $next_class->image }}">
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

        $(document).on("click", ".fullpage-modal-open__button", function(){
            var price = $(this).closest('.cusom-option__content').find('.class_item__price').text();
            $("#classPersonNumber").val($(this).attr('data-person'));
            $("#classPricingDate").val($(this).attr('data-date'));
            $("#originalPrice").val(price);
            $("#DiscountPrice").val(price);
            $("#payNowButton").text(price);

        });

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
