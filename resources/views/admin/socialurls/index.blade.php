@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __("Social Urls") }}
@endsection

{{-- Active Menu --}}
@section('socialurls')
    active
@endsection


{{-- Breadcrumb --}}
@section('breadcrumb')
    <h2 class="content-header-title float-left mb-0">{{ __("Admin Dashboard") }}</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">{{ __("Home") }}</a>
            </li>
            <li class="breadcrumb-item active">
                {{ __("Social Urls") }}
            </li>
        </ol>
    </div>
@endsection

{{-- Page Content --}}
@section('content')
    <section>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __("Social Urls") }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('socialurls.update', $socialurls->id) }}" method="POST" class="form form-vertical">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="custom-control custom-control-success custom-switch">
                                            <label for="facebookUrl" class="mr-2">{{ __("Fb Url") }}</label>
                                            <input type="checkbox" {{ $socialurls->fb_status == 'show' ? 'checked':'' }} class="custom-control-input socialStatusSwitch" data-id="fb_status" id="facebookUrl">
                                            <label class="custom-control-label" for="facebookUrl"></label>
                                        </div>
                                        <input type="text" name="fb_url" value="{{ socialurls()->fb_url }}" id="fb_url" class="form-control"/>
                                        @error('fb_url')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="custom-control custom-control-success custom-switch">
                                            <label for="instagram_url" class="mr-2">{{ __("Instagram Url") }}</label>
                                            <input type="checkbox" {{ $socialurls->instagram_status == 'show' ? 'checked':'' }} class="custom-control-input socialStatusSwitch" data-id="instagram_status" id="instagram_url">
                                            <label class="custom-control-label" for="instagram_url"></label>
                                        </div>
                                        <input type="text" name="instagram_url" value="{{ socialurls()->instagram_url }}" id="instagram_url" class="form-control"/>
                                        @error('instagram_url')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="custom-control custom-control-success custom-switch">
                                            <label for="youtube_url" class="mr-2">{{ __("Youtube Url") }}</label>
                                            <input type="checkbox" {{ $socialurls->youtube_status == 'show' ? 'checked':'' }} class="custom-control-input socialStatusSwitch" data-id="youtube_status" id="youtube_url">
                                            <label class="custom-control-label" for="youtube_url"></label>
                                        </div>
                                        <input type="text" name="youtube_url" value="{{ socialurls()->youtube_url }}" id="youtube_url" class="form-control"/>
                                        @error('youtube_url')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="custom-control custom-control-success custom-switch">
                                            <label for="linkedin_url" class="mr-2">{{ __("LinkedIn Url") }}</label>
                                            <input type="checkbox" {{ $socialurls->linkedin_status == 'show' ? 'checked':'' }} class="custom-control-input socialStatusSwitch" data-id="linkedin_status" id="linkedin_url">
                                            <label class="custom-control-label" for="linkedin_url"></label>
                                        </div>
                                        <input type="text" name="linkedin_url" value="{{ socialurls()->linkedin_url }}" id="linkedin_url" class="form-control"/>
                                        @error('linkedin_url')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="custom-control custom-control-success custom-switch">
                                            <label for="twitter_url" class="mr-2">{{ __("Twitter Url") }}</label>
                                            <input type="checkbox" {{ $socialurls->twitter_status == 'show' ? 'checked':'' }} class="custom-control-input socialStatusSwitch" data-id="twitter_status" id="twitter_url">
                                            <label class="custom-control-label" for="twitter_url"></label>
                                        </div>
                                        <input type="text" name="twitter_url" value="{{ socialurls()->twitter_url }}" id="twitter_url" class="form-control"/>
                                        @error('twitter_url')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary waves-effect waves-float waves-light w-100 w-sm-auto">{{ __("Submit") }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('.socialStatusSwitch').click(function(){
                if($(this).is(':checked')){
                    var status = 'show';
                }else{
                    var status = 'hide';
                }
                $.ajax({
                    type : "post",
                    url  : "{{ route('social.status.change') }}",
                    data : {
                        column : $(this).attr('data-id'),
                        status : status,
                    },
                    success : function(response){
                        toastr.success(response);
                    },
                    error : function(error){
                    }
                });
            });

        });
    </script>
@endsection
