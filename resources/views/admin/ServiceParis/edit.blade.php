@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __("Create Service Paris") }}
@endsection

{{-- Active Menu --}}
@section('serviceParis.create')
    active
@endsection

@push('vendor-css')
<link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/quill/css/quill.snow.css') }}">
@endpush

@push('js')
<script src="{{ asset('dashboard_assets/app-assets/quill/js/quill.min.js') }}"></script>
<script src="{{ asset('dashboard_assets/app-assets/quill/js/quill-image-resize.min.js') }}"></script>
@endpush

@push('page-js')
<script>
    $(document).ready(function (){
        (function(){
            if($(".custom-editor-wrapper").length){
                /* Initialize QUill editor */
                let quillEditor = new Quill('.custom-editor', {
                    modules: {
                        imageResize: {
                            displaySize: true
                        },
                        toolbar: [
                            [{ header: [1, 2, 3, 4, 5, 6,  false] }],
                            ['bold', 'italic', 'underline','strike'],
                            ['blockquote', 'code-block'],
                            ['image', 'video',],
                            ['link'],
                            [{ 'script': 'sub'}, { 'script': 'super' }],
                            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                            [{'color': []},{'background': []}],
                            [{ 'align': [] }],
                            ['clean']
                        ]
                    },
                    theme: 'snow'
                });
                
                /* Set QUill editor data into closest input */
                quillEditor.on('text-change', function(delta, source) {
                    getQuillEditorData();
                });
        
                /* Get QUill editor data function */
                function getQuillEditorData() {
                    let quillEditorData = quillEditor.root.innerHTML;
                    $(".custom-editor").closest(".custom-editor-wrapper").find(".custom-editor-input").val(quillEditorData);
                };
                getQuillEditorData();
            }
        })();
    })
</script>
@endpush

@push('css')

@endpush


{{-- Breadcrumb --}}
@section('breadcrumb')
    <h2 class="content-header-title float-left mb-0">{{ __("Create Yoga Class") }}</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">{{ __("Home") }}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('serviceParis.index') }}">{{ __("Service Paris") }}</a>
            </li>
            <li class="breadcrumb-item active">{{ __("Edit") }}</li>
        </ol>
    </div>
@endsection

{{-- Main Content --}}
@section('content')
    <div class="row justify-content-center">
        <div class="col-xxl-9">
            <form action="{{ route('serviceParis.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="class_title_fr">{{ __("Title") }} (FR)<small class="text-danger">*</small></label>
                                            {{ app()->setLocale('fr') }}
                                            <input type="text" class="form-control" id="class_title_fr" name="title[fr]" value="{{ $service->title }}" placeholder="{{ __("Title") }}">
                                            {{ app()->setLocale($current_locale) }}
                                        </div>
                                        @error('title.fr')
                                            <div class="alert alert-danger">
                                                <div class="alert-body">
                                                    {{ $message }}
                                                </div>
                                            </div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="class_title_en">{{ __("Title") }} (EN)</label>
                                            {{ app()->setLocale('en') }}
                                            <input type="text" class="form-control" value="{{ $service->title }}" id="class_title_en" name="title[en]" placeholder="{{ __("Title") }}">
                                            {{ app()->setLocale($current_locale) }}
                                        </div>
                                    </div>
                
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="short_description[fr]">{{ __("Short Description") }}(FR) <small class="text-danger">*</small></label>
                                            {{ app()->setLocale('fr') }}
                                            <textarea class="form-control" value="" id="short_description[fr]" name="short_description[fr]" placeholder='{{ __("Short Description") }}'>{{ $service->short_description }}</textarea>
                                            {{ app()->setLocale($current_locale) }}
                                        </div>
                                        @error('short_description.fr')
                                            <div class="alert alert-danger">
                                                <div class="alert-body">
                                                    {{ $message }}
                                                </div>
                                            </div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="short_description[en]">{{ __("Short Description") }} (EN)</label>
                                            {{ app()->setLocale('en') }}
                                            <textarea class="form-control" value="" id="short_description[en]" name="short_description[en]" placeholder="{{ __("Short Description") }}">{{ $service->short_description }}</textarea>
                                            {{ app()->setLocale($current_locale) }}
                                        </div>
                                    </div>
                
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="description[fr]">{{ __("Description") }}(FR) <small class="text-danger">*</small></label>
                                            {{ app()->setLocale('fr') }}
                                            <div>
                                                <input id="description[fr]" value="{{ $service->description }}" type="hidden" name="description[fr]">
                                                <trix-editor input="description[fr]" class="trix-content"></trix-editor>
                                            </div>
                                            {{ app()->setLocale($current_locale) }}
                                            @error('description.fr')
                                                <div class="alert alert-danger">
                                                    <div class="alert-body">
                                                        {{ $message }}
                                                    </div>
                                                </div>
                                            @enderror
                                        </div>

                
                                        <div class="form-group">
                                            <label for="description[en]">{{ __("Description") }} (EN)</label>
                                            {{ app()->setLocale('en') }}
                                            <div>
                                                <input id="description[en]" value="{{ $service->description }}" type="hidden" name="description[en]">
                                                <trix-editor input="description[en]" class="trix-content"></trix-editor>
                                            </div>
                                            {{ app()->setLocale($current_locale) }}
                                        </div>
                
                                    </div>                             

                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="map">{{ __("Map") }} <small class="text-info">({{ __('Please provide a iframe') }})</small></label>
                                    <textarea class="form-control" id="map" name="map" placeholder='{{ __("iframe") }}'>{{ $service->map }}</textarea>
                                </div>
                                @error('map')
                                    <div class="alert alert-danger">
                                        <div class="alert-body">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror

                                <div class="form-group">
                                    <label for="video">{{ __("Video") }} <span class="text-danger">*</span> <small class="text-info">({{ __('Please provide a ifram') }})</small></label>
                                    <textarea class="form-control"  id="video" name="video" placeholder='{{ __("iframe") }}'>{{ $service->video }}</textarea>
                                </div>
                                @error('video')
                                    <div class="alert alert-danger">
                                        <div class="alert-body">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <img class="mb-2 img-fluid" src="{{ asset('uploads/services') }}/{{ $service->image }}" alt="Thumbnail Image">
                                </div>
                                <div class="form-group">
                                    <label for="single_product_image">{{ __("Thumbnail Image") }} <small class="text-danger">*</small> <span class="text-info">(Resolution 1350x560 is preferred for best visualization)</span></label>
                                    <label class="custom__file">
                                        <input type="file" id="single_product_image" name="image" class="custom__file__input" accept="image/*" >
                                        <span class="custom__file__label">
                                            <span class="custom__file__label__btn">{{ __("Add Image") }}</span>
                                            <span class="custom__file__label__text">{{ __("Accepts all images") }}</span>
                                        </span>
                                    </label>
                                </div>
                                @error('image')
                                    <div class="alert alert-danger">
                                        <div class="alert-body">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror


                                <div class="form-group">
                                    <label for="file">{{ __("Document") }} @if($service->file != null) <a href="{{ asset('uploads/service_files') }}/{{ $service->file }}" download="">({{ __('Download') }})</a>  @endif </label>

                                    <label class="custom__file">
                                        <input type="file" name="file" id="file" class="custom__file__input">
                                        <span class="custom__file__label">
                                            <span class="custom__file__label__btn">{{ __("Add File") }}</span>
                                            <span class="custom__file__label__text">{{ __("Accepts all file") }}</span>
                                        </span>
                                    </label>
                                </div>
                                @error('file')
                                    <div class="alert alert-danger">
                                        <div class="alert-body">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="class_date">{{ __("Date") }} <small class="text-danger">*</small></label>
                                    <input type="date" value="{{ \Carbon\Carbon::parse($service->date)->format('Y-m-d') }}"  class="form-control flatpickr-human-friendly" id="class_date" name="date" placeholder="dd/mm/yyyy">
                                </div>
                                @error('date')
                                    <div class="alert alert-danger">
                                        <div class="alert-body">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror
                                <div class="form-group">
                                    <label for="class_time">{{ __("Time") }} <small class="text-danger">*</small></label>
                                    <input type="text" value="{{ $service->time }}" class="form-control" id="class_time" name="time" placeholder="1pm - 3pm">
                                </div>
                                @error('time')
                                    <div class="alert alert-danger">
                                        <div class="alert-body">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror

                                <div class="form-group">
                                    <label for="price">{{ __("Price") }} <small class="text-danger">*</small></label>
                                    <input type="text" value="{{ $service->price }}" class="form-control" id="price" name="price" placeholder="1pm - 3pm">
                                </div>
                                @error('price')
                                    <div class="alert alert-danger">
                                        <div class="alert-body">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror

                                {{-- <div class="form-group">
                                    <label for="trainer">{{ __("Select Trainer") }}</label>
                                    <select name="trainer[]" id="trainer" class="form-control select2" multiple >
                                        <option value=" ">-{{ __('Select') }}-</option>
                                        @foreach ($profesors as $profesor)
                                            @if (in_array($profesor->id,$service->getTrainers->pluck('trainer_id')->toArray()))
                                                <option selected value="{{ $profesor->id }}">{{ $profesor->name }}</option>
                                            @else
                                                <option value="{{ $profesor->id }}">{{ $profesor->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('hosting.fr')
                                        <div class="alert alert-danger">
                                            <div class="alert-body">
                                                {{ $message }}
                                            </div>
                                        </div>
                                    @enderror
                                </div> --}}

                                <div class="form-group">
                                    <label for="training_duration_fr">{{ __("Training duration") }} (FR)</label>
                                    {{ app()->setLocale('fr') }}
                                    <input type="text" value="{{ $service->training_duration }}" class="form-control" id="training_duration_fr" name="training_duration[fr]" placeholder="{{ __("Training duration") }}">
                                    {{ app()->setLocale($current_locale) }}
                                </div>
                                @error('training_duration.fr')
                                    <div class="alert alert-danger">
                                        <div class="alert-body">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror
        
                                <div class="form-group">
                                    <label for="training_duration_en">{{ __("Training duration") }} (EN)</label>
                                    {{ app()->setLocale('en') }}
                                    <input type="text" value="{{ $service->training_duration }}" class="form-control" id="training_duration_en" name="training_duration[en]" placeholder="{{ __("Training duration") }}">
                                    {{ app()->setLocale($current_locale) }}
                                </div>

                                <div class="form-group">
                                    <label for="group_size_fr">{{ __("Group size") }} (FR)</label>
                                    {{ app()->setLocale('fr') }}
                                    <input type="text" value="{{ $service->group_size }}" class="form-control" id="group_size_fr" name="group_size[fr]" placeholder="{{ __("Group size") }}">
                                    {{ app()->setLocale($current_locale) }}
                                </div>
                                @error('group_size.fr')
                                    <div class="alert alert-danger">
                                        <div class="alert-body">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror
        
                                <div class="form-group">
                                    <label for="group_size_en">{{ __("Group size") }} (EN)</label>
                                    {{ app()->setLocale('en') }}
                                    <input type="text" value="{{ $service->group_size }}" class="form-control" id="group_size_en" name="group_size[en]" placeholder="{{ __("Group size") }}">
                                    {{ app()->setLocale($current_locale) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 border-top py-1">
                        <button type="submit" class="btn btn-success w-100 w-sm-auto">
                            <span class="mr-25">{{ __("Submit") }}</span>
                            <i data-feather='send'></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function(){

        });
    </script>

@endpush
