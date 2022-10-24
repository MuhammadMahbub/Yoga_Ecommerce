@extends('frontend.layouts.app')

@section('title')
{{ __("Gallery") }}
@endsection

{{-- Active Menu --}}
@section('gallery', 'current-menu-item')

@section('body_class')
    home
@endsection

@section('plugin-css')
<link rel="stylesheet" href="{{ asset('frontend_assets/plugins/fancybox/css/jquery.fancybox.min.css') }}">
@endsection

@section('css')

@endsection

@section('content')


<div class="pageHeader" style="background-image: url({{ asset($gallery->banner_image)}});">
    <h1>{{ $gallery->title }}</h1>
</div>

<section class="gallery">
    <div class="gallery__single__container">
        <div class="gallery__single__grid">
            @foreach ($gallery->getImages as $image)
                <a href="{{ asset($image->image) }}" class="gallery__single__grid__item" data-fancybox="single-image-gallery">
                    <div class="gallery__single__grid__item__figure">
                        <img src="{{ asset($image->image) }}" alt="Gallery image" class="gallery__single__grid__item__figure__image" loading="lazy">
                    </div>
                    <div class="gallery__single__grid__item__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>


@endsection

@section('plugin-js')
<script src="{{  asset('frontend_assets/plugins/fancybox/js/jquery.fancybox.min.js')  }}"></script>
@endsection


@section('js')
<script>
    $(document).ready(function(){
        /*  Fancybox Init */
	    $('[data-fancybox]').fancybox();
    });
</script>
@endsection
