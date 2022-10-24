@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __("Seo Settings Page") }}
@endsection

{{-- Active Menu --}}
@section('seo.index')
    active
@endsection

@push('css')

@endpush


{{-- Breadcrumb --}}
@section('breadcrumb')
    <h2 class="content-header-title float-left mb-0">{{ __("Admin Dashboard") }}</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb bred_crumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">{{ __("Home") }}</a>
            </li>
            <li class="breadcrumb-item active">
                {{ __("Seo Settings Page") }}
            </li>
        </ol>
    </div>
@endsection

@section('content')

<section id="accordion">
    <div class="row">
        <div class="col-sm-12">
            <div id="accordionWrapa1" role="tablist" aria-multiselectable="true">
                <div class="card collapse-icon">
                    <div class="card-header">
                        <h4 class="card-title">{{ __("Update Seo Settings") }}</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ __("You may want to open one item at a time, for that you can use accordion.") }}</p>
                        <div class="collapse-default">
                            <div class="card">
                                <div id="heading1" class="card-header" data-toggle="collapse" role="button" data-target="#accordion1" aria-expanded="{{ (session('section_name') == 'home' || session('section_name') == null) ? 'true' : 'false'}}" aria-controls="accordion1">
                                    <span class="lead collapse-title">{{ __("Home Page Seo Settings") }} </span>
                                </div>
                                <div id="accordion1" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading1" class="collapse {{ (session('section_name') == 'home' || session('section_name') == null) ? 'show' : ''}}">
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('home_seo_setting', $home->id) }}">
                                            @csrf
                                            @method('PUT')

                                            <input type="hidden" name="name" value="{{ $home->page_name }}">

                                            <div class="form-group row">
                                                <div class="col-6">
                                                    <label for="" class="col-form-label">{{ __("Page Name") }}</label>
                                                    <input type="text" disabled class="form-control" placeholder="{{ __("Page Name") }}" value="{{ ucwords($home->page_name) }}">
                                                </div>

                                                <div class="col-6">
                                                    <label for="meta_title" class="col-form-label">{{ __("Meta Title") }}</label>
                                                    <input type="text" class="form-control" placeholder="{{ __("Meta Title") }}" name="meta_title" value="{{ $home->meta_title }}">
                                                </div>

                                                <div class="col-6">
                                                    <label for="meta_description" class="col-form-label">{{ __("Meta Description") }}</label>
                                                    <input type="text" class="form-control" placeholder="{{ __("Meta Description") }}" name="meta_description" value="{{ $home->meta_description }}">
                                                </div>

                                                <div class="col-6">
                                                    <label for="meta_keywords" class="col-form-label">{{ __("Meta Keywords") }}</label>
                                                    <input type="text" class="form-control" placeholder="{{ __("Meta Keywords") }}" name="meta_keywords" value="{{ $home->meta_keywords }}">
                                                </div>

                                                <div class="col-6">
                                                    <label for="fb_url" class="col-form-label">{{ __("FB Url") }}</label>
                                                    <input type="text" class="form-control" placeholder="FB Url" name="fb_url" value="{{ $home->fb_url }}">
                                                </div>

                                                <div class="col-6">
                                                    <label for="fb_title" class="col-form-label">{{ __("FB Title") }}</label>
                                                    <input type="text" class="form-control" placeholder="FB Title" name="fb_title" value="{{ $home->fb_title }}">
                                                </div>

                                                <div class="col-12">
                                                    <label for="fb_description" class="col-form-label">{{ __("FB Description") }}</label>
                                                    <textarea name="fb_description" class="form-control" id="fb_description" cols="30" rows="5">{{ $home->fb_description }}</textarea>
                                                </div>

                                                <div class="col-6">
                                                    <label for="twitter_url" class="col-form-label">{{ __("Twitter Url") }}</label>
                                                    <input type="text" class="form-control" placeholder="Twitter Url" name="twitter_url" value="{{ $home->twitter_url }}">
                                                </div>

                                                <div class="col-6">
                                                    <label for="twitter_title" class="col-form-label">{{ __("Twitter Title") }}</label>
                                                    <input type="text" class="form-control" placeholder="Twitter Title" name="twitter_title" value="{{ $home->twitter_title }}">
                                                </div>

                                                <div class="col-12">
                                                    <label for="twitter_desciption" class="col-form-label">{{ __("Twitter Description") }}</label>
                                                    <textarea name="twitter_desciption" class="form-control" id="twitter_desciption" cols="30" rows="5">{{ $home->twitter_desciption }}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">{{ __("Update") }}</button>
                                            </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div id="heading2" class="card-header" data-toggle="collapse" role="button" data-target="#accordion2" aria-expanded="{{ (session('section_name') == 'about') ? 'true' : 'false'}}" aria-controls="accordion2">
                                    <span class="lead collapse-title"> {{ __("About Page Seo Settings") }}</span>
                                </div>
                                <div id="accordion2" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading2" class="collapse {{ (session('section_name') == 'about') ? 'show' : ''}}" aria-expanded="false">
                                    <div class="card-body">

                                        <form method="POST" action="{{ route('about_seo_setting', $about->id) }}">
                                            @csrf
                                            @method('PUT')

                                            <input type="hidden" name="name" value="{{ $about->page_name }}">

                                            <div class="form-group row">
                                                <div class="col-6">
                                                    <label for="" class="col-form-label">{{ __("Page Name") }}</label>
                                                    <input type="text" disabled class="form-control" placeholder="{{ __("Page Name") }}" value="{{ ucwords($about->page_name) }}">
                                                </div>

                                                <div class="col-6">
                                                    <label for="meta_title" class="col-form-label">{{ __("Meta Title") }}</label>
                                                    <input type="text" class="form-control" placeholder="{{ __("Meta Title") }}" name="meta_title" value="{{ $about->meta_title }}">
                                                </div>

                                                <div class="col-6">
                                                    <label for="meta_description" class="col-form-label">{{ __("Meta Description") }}</label>
                                                    <input type="text" class="form-control" placeholder="{{ __("Meta Description") }}" name="meta_description" value="{{ $about->meta_description }}">
                                                </div>

                                                <div class="col-6">
                                                    <label for="meta_keywords" class="col-form-label">{{ __("Meta Keywords") }}</label>
                                                    <input type="text" class="form-control" placeholder="{{ __("Meta Keywords") }}" name="meta_keywords" value="{{ $about->meta_keywords }}">
                                                </div>

                                                <div class="col-6">
                                                    <label for="fb_url" class="col-form-label">{{ __("FB Url") }}</label>
                                                    <input type="text" class="form-control" placeholder="FB Url" name="fb_url" value="{{ $about->fb_url }}">
                                                </div>

                                                <div class="col-6">
                                                    <label for="fb_title" class="col-form-label">{{ __("FB Title") }}</label>
                                                    <input type="text" class="form-control" placeholder="FB Title" name="fb_title" value="{{ $about->fb_title }}">
                                                </div>

                                                <div class="col-12">
                                                    <label for="fb_description" class="col-form-label">{{ __("FB Description") }}</label>
                                                    <textarea name="fb_description" class="form-control" id="fb_description" cols="30" rows="5">{{ $about->fb_description }}</textarea>
                                                </div>

                                                <div class="col-6">
                                                    <label for="twitter_url" class="col-form-label">{{ __("Twitter Url") }}</label>
                                                    <input type="text" class="form-control" placeholder="{{ __("Twitter Url") }}" name="twitter_url" value="{{ $about->twitter_url }}">
                                                </div>

                                                <div class="col-6">
                                                    <label for="twitter_title" class="col-form-label">{{ __("Twitter Title") }}</label>
                                                    <input type="text" class="form-control" placeholder="{{ __("Twitter Title") }}" name="twitter_title" value="{{ $about->twitter_title }}">
                                                </div>

                                                <div class="col-12">
                                                    <label for="twitter_desciption" class="col-form-label">{{ __("Twitter Description") }}</label>
                                                    <textarea name="twitter_desciption" class="form-control" id="twitter_desciption" cols="30" rows="5">{{ $about->twitter_desciption }}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">{{ __("Update") }}</button>
                                            </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div id="heading3" class="card-header" data-toggle="collapse" role="button" data-target="#accordion3" aria-expanded="{{ (session('section_name') == 'contact') ? 'true' : 'false'}}" aria-controls="accordion3">
                                    <span class="lead collapse-title"> {{ __("Contact Page Seo Settings") }} </span>
                                </div>
                                <div id="accordion3" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading3" class="collapse {{ (session('section_name') == 'contact') ? 'show' : ''}}" aria-expanded="false">
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('contact_seo_setting', $contact->id) }}">
                                            @csrf
                                            @method('PUT')

                                            <input type="hidden" name="name" value="{{ $contact->page_name }}">

                                            <div class="form-group row">
                                                <div class="col-6">
                                                    <label for="" class="col-form-label">{{ __("Page Name") }}</label>
                                                    <input type="text" disabled class="form-control" placeholder="{{ __("Page Name") }}" value="{{ ucwords($contact->page_name) }}">
                                                </div>

                                                <div class="col-6">
                                                    <label for="meta_title" class="col-form-label">{{ __("Meta Title") }}</label>
                                                    <input type="text" class="form-control" placeholder="{{ __("Meta Title") }}" name="meta_title" value="{{ $contact->meta_title }}">
                                                </div>

                                                <div class="col-6">
                                                    <label for="meta_description" class="col-form-label">{{ __("Meta Description") }}</label>
                                                    <input type="text" class="form-control" placeholder="{{ __("Meta Description") }}" name="meta_description" value="{{ $contact->meta_description }}">
                                                </div>

                                                <div class="col-6">
                                                    <label for="meta_keywords" class="col-form-label">{{ __("Meta Keywords") }}</label>
                                                    <input type="text" class="form-control" placeholder="{{ __("Meta Keywords") }}" name="meta_keywords" value="{{ $contact->meta_keywords }}">
                                                </div>

                                                <div class="col-6">
                                                    <label for="fb_url" class="col-form-label">{{ __("FB Url") }}</label>
                                                    <input type="text" class="form-control" placeholder="{{ __("FB Url") }}" name="fb_url" value="{{ $contact->fb_url }}">
                                                </div>

                                                <div class="col-6">
                                                    <label for="fb_title" class="col-form-label">{{ __("FB Title") }}</label>
                                                    <input type="text" class="form-control" placeholder="{{ __("FB Title") }}" name="fb_title" value="{{ $contact->fb_title }}">
                                                </div>

                                                <div class="col-12">
                                                    <label for="fb_description" class="col-form-label">{{ __("FB Description") }}</label>
                                                    <textarea name="fb_description" class="form-control" id="fb_description" cols="30" rows="5">{{ $contact->fb_description }}</textarea>
                                                </div>

                                                <div class="col-6">
                                                    <label for="twitter_url" class="col-form-label">{{ __("Twitter Url") }}</label>
                                                    <input type="text" class="form-control" placeholder="{{ __("Twitter Url") }}" name="twitter_url" value="{{ $contact->twitter_url }}">
                                                </div>

                                                <div class="col-6">
                                                    <label for="twitter_title" class="col-form-label">{{ __("Twitter Title") }}</label>
                                                    <input type="text" class="form-control" placeholder="{{ __("Twitter Title") }}" name="twitter_title" value="{{ $contact->twitter_title }}">
                                                </div>

                                                <div class="col-12">
                                                    <label for="twitter_desciption" class="col-form-label">{{ __("Twitter Description") }}</label>
                                                    <textarea name="twitter_desciption" class="form-control" id="twitter_desciption" cols="30" rows="5">{{ $contact->twitter_desciption }}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">{{ __("Update") }}</button>
                                            </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{ session()->forget('section_name') }}
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
