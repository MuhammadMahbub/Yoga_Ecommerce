@extends('frontend.layouts.app')

@section('title')
{{ __("Gallery") }}
@endsection

{{-- Active Menu --}}
@section('gallery', 'current-menu-item')

@section('body_class')
    home
@endsection

@section('css')

@endsection

@section('content')


    <div class="pageHeader" style="background-image: url({{ asset($banner->image)}});">
        <h1>{{ $banner->title }}</h1>
    </div>

    <section class="gallery">
        <div class="gallery__container">
            <div class="gallery__album__grid">
                @foreach ($galleries as $gallery)
                    <a href="{{ route('gallery.details',$gallery->slug) }}" class="gallery__album__grid__item">
                        <div class="gallery__album__grid__item__figure">
                            <img src="{{ $gallery->thumbnail }}" alt="{{ $gallery->title }}" class="gallery__album__grid__item__figure__image" loading="lazy">
                        </div>
                        <div class="gallery__album__grid__item__content">{{ $gallery->title }}</div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>


    {{-- <section class="gallery">
        <div class="gallery__container">
            <div class="gallery__album__grid">
                @for ($i = 1; $i <= 5; $i++)
                <a href="{{ route('gallery.details') }}" class="gallery__album__grid__item">
                    <div class="gallery__album__grid__item__figure">
                        <img src="https://source.unsplash.com/random/500x60{{ $i }}/?yoga" alt="gallery image {{ $i }}" class="gallery__album__grid__item__figure__image" loading="lazy">
                    </div>
                    <div class="gallery__album__grid__item__content">Gallery Name {{ $i }}</div>
                </a>
                @endfor
            </div>
        </div>
    </section> --}}


@endsection


@section('js')

@endsection
