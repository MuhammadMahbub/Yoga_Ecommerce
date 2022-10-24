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
{{-- Quill Editor CSS link --}}
<link rel="stylesheet" href="{{ asset('dashboard_assets/app-assets/css/plugins/forms/form-quill-editor.css') }}">
<link rel="stylesheet" href="{{ asset('dashboard_assets/app-assets/quill/css/quill.snow.css') }}">
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
            <li class="breadcrumb-item active">{{ __("Create") }}</li>
        </ol>
    </div>
@endsection

{{-- Main Content --}}
@section('content')
    <div class="row justify-content-center">
        <div class="col-xxl-9">
            <form action="{{ route('serviceParis.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="class_title_fr">{{ __("Title") }} (FR)<small class="text-danger">*</small></label>
                                            <input type="text" value="{{ old('title.fr') }}" class="form-control" id="class_title_fr" name="title[fr]" placeholder="{{ __("Title") }}">
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
                                            <input type="text" value="{{ old('title.en') }}" class="form-control" id="class_title_en" name="title[en]" placeholder="{{ __("Title") }}">
                                        </div>
                                    </div>
                
                                    {{-- <div class="col-12">
                
                                        <div class="form-group">
                                            <label for="lable_fr">{{ __("Label") }} (FR)</label>
                                            <input type="text" value="{{ old('lable.fr') }}" class="form-control" id="lable_fr" name="lable[fr]" placeholder="{{ __("Lable") }}">
                                        </div>
                                        @error('lable.fr')
                                            <div class="alert alert-danger">
                                                <div class="alert-body">
                                                    {{ $message }}
                                                </div>
                                            </div>
                                        @enderror
                
                                        <div class="form-group">
                                            <label for="lable_en">{{ __("Label") }} (EN)</label>
                                            <input type="text" value="{{ old('lable.en') }}" class="form-control" id="lable_en" name="lable[en]" placeholder="{{ __("Lable") }}">
                                        </div>
                
                                    </div>
                
                                    <div class="col-12">
                
                                        <div class="form-group">
                                            <label for="subtitle_fr">{{ __("Subtitle") }} (FR)</label>
                                            <input type="text" value="{{ old('subtitle.fr') }}" class="form-control" id="subtitle_fr" name="subtitle[fr]" placeholder="{{ __("Subtitle") }}">
                                        </div>
                                        @error('subtitle.fr')
                                            <div class="alert alert-danger">
                                                <div class="alert-body">
                                                    {{ $message }}
                                                </div>
                                            </div>
                                        @enderror
                
                                        <div class="form-group">
                                            <label for="subtitle_en">{{ __("Subtitle") }} (EN)</label>
                                            <input type="text" value="{{ old('subtitle.en') }}" class="form-control" id="subtitle_en" name="subtitle[en]" placeholder="{{ __("Subtitle") }}">
                                        </div>
                
                                    </div>
                
                                    <div class="col-12">
                
                                        <div class="form-group">
                                            <label for="expart_word_fr">{{ __("Expart`s word") }} (FR)</label>
                                            <input type="text" value="{{ old('expart_word.fr') }}" class="form-control" id="expart_word_fr" name="expart_word[fr]" placeholder="{{ __("Expart`s word") }}">
                                        </div>
                                        @error('expart_word.fr')
                                            <div class="alert alert-danger">
                                                <div class="alert-body">
                                                    {{ $message }}
                                                </div>
                                            </div>
                                        @enderror
                
                                        <div class="form-group">
                                            <label for="expart_word_en">{{ __("Expart`s word") }} (EN)</label>
                                            <input type="text" value="{{ old('expart_word.en') }}" class="form-control" id="expart_word_en" name="expart_word[en]" placeholder="{{ __("Expart`s word") }}">
                                        </div>
                
                                    </div> --}}
                            
                                    {{-- <div class="col-12">
                                        <div class="form-group">
                                            <label for="product_price">{{ __("Price") }} <small class="text-danger">*</small></label>
                                            <input type="text" value="{{ old('price') }}" class="form-control" id="product_price" name="price" placeholder="{{ __("Price") }}">
                                        </div>
                                        @error('price')
                                            <div class="alert alert-danger">
                                                <div class="alert-body">
                                                    {{ $message }}
                                                </div>
                                            </div>
                                        @enderror
                                    </div> --}}
                
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="short_description[fr]">{{ __("Short Description") }}(FR) <small class="text-danger">*</small></label>
                                            <textarea class="form-control" value="" id="short_description[fr]" name="short_description[fr]" placeholder='{{ __("Short Description") }}'>{{ old('short_description.fr') }}</textarea>
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
                                            <textarea class="form-control" value="" id="short_description[en]" name="short_description[en]" placeholder="{{ __("Short Description") }}">{{ old('short_description.en') }}</textarea>
                                        </div>
                                    </div>
                
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>{{ __("Description") }}(FR) <small class="text-danger">*</small></label>
                                            <div class="custom-editor-wrapper">
                                                <div class="custom-editor">
                                                    {!! old('description.fr') !!}
                                                </div>
                                                <input type="hidden" name="description[fr]" class="custom-editor-input">
                                            </div>
                                            @error('description.fr')
                                                <div class="alert alert-danger">
                                                    <div class="alert-body">
                                                        {{ $message }}
                                                    </div>
                                                </div>
                                            @enderror
                                        </div>
                
                                        {{-- <div class="form-group">
                                            <label class="form-label">{{ __("Description") }}(FR) <small class="text-danger">*</small></label>
                                            <div class="custom-editor-wrapper">
                                                <div class="custom-editor">{!! old('description.fr') !!}</div>
                                                <input type="hidden" name="description[fr]" class="custom-editor-input">
                                            </div>
                                            @error('description.fr')
                                                <div class="alert alert-danger">
                                                    <div class="alert-body">{{ $message }}</div>
                                                </div>
                                            @enderror
                                        </div>
                
                                        <div class="form-group">
                                            <label for="description[en]">{{ __("Description") }} (EN)</label>
                                            <div class="custom-editor-wrapper">
                                                <div class="custom-editor">{!! old('description.en') !!}</div>
                                                <input type="hidden" name="description[en]" class="custom-editor-input">
                                            </div>
                                        </div> --}}
                
                                        <div class="form-group">
                                            <label for="description[en]">{{ __("Description") }} (EN)</label>
                                            <div class="custom-editor-wrapper">
                                                <div class="custom-editor">
                                                    {!! old('description.en') !!}
                                                </div>
                                                <input type="hidden" name="description[en]" class="custom-editor-input">
                                            </div>
                                        </div>
                
                                    </div>                             
{{--                 
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="other_language_fr">{{ __("Other Language") }} (FR)</label>
                                            <input type="text" value="{{ old('other_language.fr') }}" class="form-control" id="other_language_fr" name="other_language[fr]" placeholder="{{ __("Other Language") }}">
                                        </div>
                                        @error('other_language.fr')
                                            <div class="alert alert-danger">
                                                <div class="alert-body">
                                                    {{ $message }}
                                                </div>
                                            </div>
                                        @enderror
                
                                        <div class="form-group">
                                            <label for="other_language_en">{{ __("Other Language") }} (EN)</label>
                                            <input type="text" value="{{ old('other_language.en') }}" class="form-control" id="other_language_en" name="other_language[en]" placeholder="{{ __("Other Language") }}">
                                        </div>
                                    </div>
                                
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="health_hygiene[fr]">{{ __("Health & Hygiene") }}(FR) </label>
                                            <div>
                                                <input id="health_hygiene[fr]" value="{{ old('health_hygiene.fr') }}" type="hidden" name="health_hygiene[fr]">
                                                <trix-editor input="health_hygiene[fr]" class="trix-content"></trix-editor>
                                            </div>
                                            @error('health_hygiene.fr')
                                                <div class="alert alert-danger">
                                                    <div class="alert-body">
                                                        {{ $message }}
                                                    </div>
                                                </div>
                                            @enderror
                                        </div>
                
                                        <div class="form-group">
                                            <label for="health_hygiene[en]">{{ __("Health & Hygiene") }} (EN)</label>
                                            <div>
                                                <input id="health_hygiene[en]" value="{{ old('health_hygiene.en') }}" type="hidden" name="health_hygiene[en]">
                                                <trix-editor input="health_hygiene[en]" class="trix-content"></trix-editor>
                                            </div>
                                        </div>
                
                                    </div>
                
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="hosting[fr]">{{ __("Hosting") }}(FR) </label>
                                            <div>
                                                <input id="hosting[fr]" value="{{ old('hosting.fr') }}" type="hidden" name="hosting[fr]">
                                                <trix-editor input="hosting[fr]" class="trix-content"></trix-editor>
                                            </div>
                                            @error('hosting.fr')
                                                <div class="alert alert-danger">
                                                    <div class="alert-body">
                                                        {{ $message }}
                                                    </div>
                                                </div>
                                            @enderror
                                        </div>
                
                                        <div class="form-group">
                                            <label for="hosting[en]">{{ __("Hosting") }} (EN)</label>
                                            <div>
                                                <input id="hosting[en]" value="{{ old('hosting.en') }}" type="hidden" name="hosting[en]">
                                                <trix-editor input="hosting[en]" class="trix-content"></trix-editor>
                                            </div>
                                        </div>
                
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="place_to_stay[fr]">{{ __("Place to stay") }}(FR) </label>
                                            <div>
                                                <input id="place_to_stay[fr]" value="{{ old('place_to_stay.fr') }}" type="hidden" name="place_to_stay[fr]">
                                                <trix-editor input="place_to_stay[fr]" class="trix-content"></trix-editor>
                                            </div>
                                            @error('place_to_stay.fr')
                                                <div class="alert alert-danger">
                                                    <div class="alert-body">
                                                        {{ $message }}
                                                    </div>
                                                </div>
                                            @enderror
                                        </div>
                
                                        <div class="form-group">
                                            <label for="place_to_stay[en]">{{ __("Place to stay") }} (EN)</label>
                                            <div>
                                                <input id="place_to_stay[en]" value="{{ old('place_to_stay.en') }}" type="hidden" name="place_to_stay[en]">
                                                <trix-editor input="place_to_stay[en]" class="trix-content"></trix-editor>
                                            </div>
                                        </div>
                
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="map">{{ __("Map") }} <small class="text-info">({{ __('Please provide a iframe') }})</small></label>
                                    <textarea class="form-control" id="map" name="map" placeholder='{{ __("iframe") }}'>{{ old('map') }}</textarea>
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
                                    <textarea class="form-control"  id="video" name="video" placeholder='{{ __("iframe") }}'>{{ old('video') }}</textarea>
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
                                <div class="form-group">
                                    <label for="single_product_image">{{ __("Thumbnail Image") }} <small class="text-danger">*</small> <span class="text-info">(Resolution 1350x560 is preferred for best visualization)</span></label>
                                    <label class="custom__file">
                                        <input type="file" id="single_product_image" name="image" class="custom__file__input" accept="image/*" required>
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
                                    <label for="galery_image">{{ __("Gallery Image") }} <small class="text-danger">*</small></label>
                                    <label class="custom__file">
                                        <input type="file" id="galery_image" name="galery_image[]" class="custom__file__input" accept="image/*" required multiple>
                                        <span class="custom__file__label">
                                            <span class="custom__file__label__btn">{{ __("Add Image") }}</span>
                                            <span class="custom__file__label__text">{{ __("Accepts all images") }}</span>
                                        </span>
                                    </label>
                                </div>
                                @error('galery_image')
                                    <div class="alert alert-danger">
                                        <div class="alert-body">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror

                                <div class="form-group">
                                    <label for="file">{{ __("Document") }} </label>

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
                                    <input type="date" value="{{ old('date') }}"  class="form-control flatpickr-human-friendly" id="class_date" name="date" placeholder="dd/mm/yyyy">
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
                                    <input type="text" value="{{ old('time') }}" class="form-control" id="class_time" name="time" placeholder="1pm - 3pm">
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
                                    <input type="text" value="{{ old('price') }}" class="form-control" id="price" name="price" placeholder="1pm - 3pm">
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
                                            <option value="{{ $profesor->id }}">{{ $profesor->name }}</option>
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
                                    <input type="text" value="{{ old('training_duration.fr') }}" class="form-control" id="training_duration_fr" name="training_duration[fr]" placeholder="{{ __("Training duration") }}">
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
                                    <input type="text" value="{{ old('training_duration.en') }}" class="form-control" id="training_duration_en" name="training_duration[en]" placeholder="{{ __("Training duration") }}">
                                </div>

                                <div class="form-group">
                                    <label for="group_size_fr">{{ __("Group size") }} (FR)</label>
                                    <input type="text" value="{{ old('group_size.fr') }}" class="form-control" id="group_size_fr" name="group_size[fr]" placeholder="{{ __("Group size") }}">
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
                                    <input type="text" value="{{ old('group_size.en') }}" class="form-control" id="group_size_en" name="group_size[en]" placeholder="{{ __("Group size") }}">
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
{{-- Quill Editor JS link --}}
<script src="{{ asset('dashboard_assets/app-assets/quill/js/quill.min.js') }}"></script>
<script src="{{ asset('dashboard_assets/app-assets/quill/js/quill-image-resize.min.js') }}"></script>

{{-- Quill Editor JS --}}
<script>
    $(document).ready(function () {
        if($(".custom-editor-wrapper").length){
            $(".custom-editor-wrapper").each(function (index, element) {
                let quillEditor = new Quill(element.children[0], {
                    modules: {
                        imageResize: {
                            displaySize: true
                        },
                        toolbar: [
                            [{ header: [1, 2, 3, 4, 5, 6, false] }],
                            ["bold", "italic", "underline", "strike"],
                            ["blockquote", "code-block"],
                            ["image", "video"],
                            ["link"],
                            [{ script: "sub" }, { script: "super" }],
                            [{ list: "ordered" }, { list: "bullet" }],
                            [{ color: [] }, { background: [] }],
                            [{ align: [] }],
                            ["clean"]
                        ]
                    },
                    theme: "snow"
                });
                quillEditor.on("text-change", function (delta, source) {
                    $(element).find(".custom-editor-input").val(quillEditor.root.innerHTML);
                });
            });
        }
    });
</script>
@endpush
