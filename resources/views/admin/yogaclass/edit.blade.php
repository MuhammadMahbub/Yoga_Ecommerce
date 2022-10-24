@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __("Edit Yoga Class") }}
@endsection

{{-- Active Menu --}}
@section('yogaclassList')
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
    <h2 class="content-header-title float-left mb-0">{{ __("Admin Dashboard") }}</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">{{ __("Home") }}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('yogaclass.index') }}">{{ __("Yoga Class") }}</a>
            </li>
            <li class="breadcrumb-item active">
                {{ __("Edit") }} {{ $class->title }}
            </li>
        </ol>
    </div>
@endsection

{{-- Main Content --}}
@section('content')
<div class="row">
    <div class="col-12">
        <form action="{{ route('yogaclass.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __("Edit Yoga Class") }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-12">
                            <div class="form-group">
                                <label for="title[fr]">{{ __("Title") }}(FR) <small class="text-danger">*</small></label>
                                {{ app()->setLocale('fr') }}
                                <input type="text" value="{{ $class->title }}" class="form-control" id="title[fr]" name="title[fr]">
                                <input type="hidden" name="id" value="{{ $class->id }}">
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
                                <label for="class_title[en]">{{ __("Title") }}(EN)</label>
                                {{ app()->setLocale('en') }}
                                <input type="text" value="{{ $class->title }}" class="form-control" id="class_title[en]" name="title[en]">
                                <input type="hidden" name="id" value="{{ $class->id }}">
                                {{ app()->setLocale($current_locale) }}
                            </div>
                        </div>


                        <div class="col-12">

                            <div class="form-group">
                                <label for="lable_fr">{{ __("Label") }} (FR)</label>
                                {{ app()->setLocale('fr') }}
                                <input type="text" value="{{ $class->lable }}" class="form-control" id="lable_fr" name="lable[fr]" placeholder="{{ __("Lable") }}">
                                {{ app()->setLocale($current_locale) }}
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
                                {{ app()->setLocale('en') }}
                                <input type="text" value="{{ $class->lable }}" class="form-control" id="lable_en" name="lable[en]" placeholder="{{ __("Lable") }}">
                                {{ app()->setLocale($current_locale) }}
                            </div>

                        </div>


                        <div class="col-12">

                            <div class="form-group">
                                <label for="subtitle_fr">{{ __("Subtitle") }} (FR)</label>
                                {{ app()->setLocale('fr') }}
                                <input type="text" value="{{ $class->subtitle }}" class="form-control" id="subtitle_fr" name="subtitle[fr]" placeholder="{{ __("Subtitle") }}">
                                {{ app()->setLocale($current_locale) }}
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
                                {{ app()->setLocale('en') }}
                                <input type="text" value="{{ $class->subtitle }}" class="form-control" id="subtitle_en" name="subtitle[en]" placeholder="{{ __("Subtitle") }}">
                                {{ app()->setLocale($current_locale) }}
                            </div>

                        </div>


                        <div class="col-12">

                            <div class="form-group">
                                <label for="expart_word_fr">{{ __("Expart`s word") }} (FR)</label>
                                {{ app()->setLocale('fr') }}
                                <input type="text" value="{{ $class->expart_word }}" class="form-control" id="expart_word_fr" name="expart_word[fr]" placeholder="{{ __("Expart`s word") }}">
                                {{ app()->setLocale($current_locale) }}
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
                                {{ app()->setLocale('en') }}
                                <input type="text" value="{{ $class->expart_word }}" class="form-control" id="expart_word_en" name="expart_word[en]" placeholder="{{ __("Expart`s word") }}">
                                {{ app()->setLocale($current_locale) }}
                            </div>

                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <label for="class_date">{{ __("Date") }} <small class="text-danger">*</small></label>
                                <input type="date" value="{{ $class->date ?? old('date') }}" class="form-control flatpickr-human-friendly" id="class_date" name="date">
                            </div>
                            @error('date')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <label for="class_time">{{ __("Time") }} <small class="text-danger">*</small></label>
                                <input type="text" value="{{ $class->time ?? old('time') }}" class="form-control" id="class_time" name="time" placeholder="1pm - 3pm">
                            </div>
                            @error('time')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        {{-- <div class="col-12">
                            <div class="form-group">
                                <label for="product_price">{{ __("Price") }} <small class="text-danger">*</small></label>
                                <input type="text" value="{{ $class->price ?? old('price') }}" class="form-control" id="product_price" name="price" placeholder="Price">
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
                                {{ app()->setLocale('fr') }}
                                <textarea class="form-control" value="" id="short_description[fr]" name="short_description[fr]">{{ $class->short_description }}</textarea>
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
                                <label for="short_description[en]">{{ __("Short Description") }}(EN)</label>
                                {{ app()->setLocale('en') }}
                                <textarea class="form-control" value="" id="short_description[en]" name="short_description[en]">{{ $class->short_description }}</textarea>
                                {{ app()->setLocale($current_locale) }}
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <label>{{ __("Description") }}(FR) <small class="text-danger">*</small></label>
                                <div class="custom-editor-wrapper">
                                    {{ app()->setLocale('fr') }}
                                    <div class="custom-editor">
                                        {!! $class->description !!}
                                    </div>
                                    <input type="hidden" value="{{ $class->description }}" name="description[fr]" class="custom-editor-input">
                                    {{ app()->setLocale($current_locale) }}
                                </div>
                            </div>
                            @error('description.fr')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                            <div class="form-group">
                                <label>{{ __("Description") }} (En)</label>
                                <div class="custom-editor-wrapper">
                                    {{ app()->setLocale('en') }}
                                    <div class="custom-editor">
                                        {!! $class->description !!}
                                    </div>
                                    <input type="hidden" value="{{ $class->description }}" name="description[en]" class="custom-editor-input">
                                    {{ app()->setLocale($current_locale) }}
                                </div>
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <label for="training_duration_fr">{{ __("Training duration") }} (FR)</label>
                                {{ app()->setLocale('en') }}
                                <input type="text" value="{{ $class->training_duration }}" class="form-control" id="training_duration_fr" name="training_duration[fr]" placeholder="{{ __("Training duration") }}">
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
                                <input type="text" value="{{ $class->training_duration }}" class="form-control" id="training_duration_en" name="training_duration[en]" placeholder="{{ __("Training duration") }}">
                                {{ app()->setLocale($current_locale) }}
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <label for="other_language_fr">{{ __("Other Language") }} (FR)</label>
                                {{ app()->setLocale('en') }}
                                <input type="text" value="{{ $class->other_language }}" class="form-control" id="other_language_fr" name="other_language[fr]" placeholder="{{ __("Other Language") }}">
                                {{ app()->setLocale($current_locale) }}
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
                                {{ app()->setLocale('en') }}
                                <input type="text" value="{{ $class->other_language }}" class="form-control" id="other_language_en" name="other_language[en]" placeholder="{{ __("Other Language") }}">
                                {{ app()->setLocale($current_locale) }}
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <label for="group_size_fr">{{ __("Group size") }} (FR)</label>
                                {{ app()->setLocale('en') }}
                                <input type="text" value="{{ $class->group_size }}" class="form-control" id="group_size_fr" name="group_size[fr]" placeholder="{{ __("Group size") }}">
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
                                <input type="text" value="{{ $class->group_size }}" class="form-control" id="group_size_en" name="group_size[en]" placeholder="{{ __("Group size") }}">
                                {{ app()->setLocale($current_locale) }}
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <label>{{ __("Health & Hygiene") }}(FR)</label>
                                <div class="custom-editor-wrapper">
                                    {{ app()->setLocale('en') }}
                                    <div class="custom-editor">
                                        {!! $class->health_hygiene !!}
                                    </div>
                                    <input type="hidden" value="{{ $class->health_hygiene }}" name="health_hygiene[fr]" class="custom-editor-input">
                                    {{ app()->setLocale($current_locale) }}
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
                                <label>{{ __("Health & Hygiene") }} (EN)</label>
                                {{ app()->setLocale('en') }}
                                <div class="custom-editor-wrapper">
                                    <div class="custom-editor">
                                        {!! $class->health_hygiene !!}
                                    </div>
                                    <input type="hidden" value="{{ $class->health_hygiene }}" name="health_hygiene[en]" class="custom-editor-input">
                                </div>
                                {{ app()->setLocale($current_locale) }}
                            </div>

                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <label for="hosting[fr]">{{ __("Hosting") }}(FR) </label>
                                {{ app()->setLocale('en') }}
                                <div class="custom-editor-wrapper">
                                    <div class="custom-editor">
                                        {!! $class->hosting !!}
                                    </div>
                                    <input type="hidden" value="{{ $class->hosting }}" name="hosting[fr]" class="custom-editor-input">
                                </div>
                                {{ app()->setLocale($current_locale) }}
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
                                {{ app()->setLocale('en') }}
                                <div class="custom-editor-wrapper">
                                    <div class="custom-editor">
                                        {!! $class->hosting !!}
                                    </div>
                                    <input type="hidden" value="{{ $class->hosting }}" name="hosting[en]" class="custom-editor-input">
                                </div>
                                {{ app()->setLocale($current_locale) }}
                            </div>

                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <label for="trainer">{{ __("Select Trainer") }}</label>
                                <select name="trainer[]" id="trainer" class="form-control select2" multiple >
                                    <option value=" ">-{{ __('Select') }}-</option>
                                    @foreach ($profesors as $profesor)
                                        @if (checkTrainerForTeam($class->id,$profesor->id))
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
                            </div>

                        </div>                         


                        <div class="col-12">
                            <div class="form-group">
                                <label>{{ __("Place to stay") }}(FR) </label>
                                {{ app()->setLocale('en') }}
                                <div class="custom-editor-wrapper">
                                    <div class="custom-editor">
                                        {!! $class->place_to_stay !!}
                                    </div>
                                    <input type="hidden" value="{{ $class->place_to_stay }}" name="place_to_stay[fr]" class="custom-editor-input">
                                </div>
                                {{ app()->setLocale($current_locale) }}
                                @error('place_to_stay.fr')
                                    <div class="alert alert-danger">
                                        <div class="alert-body">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>{{ __("Place to stay") }} (EN)</label>
                                {{ app()->setLocale('en') }}
                                <div class="custom-editor-wrapper">
                                    <div class="custom-editor">
                                        {!! $class->place_to_stay !!}
                                    </div>
                                    <input type="hidden" value="{{ $class->place_to_stay }}" name="place_to_stay[en]" class="custom-editor-input">
                                </div>
                                {{ app()->setLocale($current_locale) }}
                            </div>

                        </div>


                        
                        <div class="col-12">
                            <div class="form-group">
                                <label for="map">{{ __("Map") }} <small class="text-warning">({{ __('Please provide a ifram') }})</small></label>
                                <textarea class="form-control" id="map" rows="6" name="map" placeholder='{{ __("iframe") }}'>{{ $class->map }}</textarea>
                            </div>
                            @error('map')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <label for="video">{{ __("Video") }} <small class="text-warning">({{ __('Please provide a ifram') }})</small> <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="video" rows="5" name="video" placeholder='{{ __("iframe") }}'>{{ $class->video }}</textarea>
                            </div>
                            @error('video')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <label class="d-block">{{ __("Existing Image") }}</label>
                                <img src="{{ asset('uploads/class') }}/{{ $class->image }}" class="img-fluid" style="max-height: 200px" alt="">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="single_product_image">{{ __("Image") }} <small class="text-danger">({{ __("Resolution 1350x560 is preferred for best visualization") }})</small></label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="single_product_image" name="image">
                                    <label class="custom-file-label" for="single_product_image">{{ __("Choose Image") }}</label>
                                </div>
                            </div>
                            @error('image')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <label for="file">{{ __("Document") }} @if($class->file != null) (<a href="{{ asset('uploads/yoga_files') }}/{{ $class->file }}" download>Download</a>) @endif </label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file" name="file">
                                    <label class="custom-file-label" for="file">{{ __("Choose Image") }}</label>
                                </div>
                            </div>
                            @error('file')
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary mr-1 mb-1">{{ __("Update") }}</button>
                        </div>
                    </div>
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

    <script>
        $(document).ready(function(){

            $("body").on('click', '.delete-gallery', function(e){
                e.preventDefault();
                alert('Are you sure you want to delete this image?');
                var id = $(this).data('id');


                    $.ajax({
                        url: "{{ route('products.gallery.delete') }}",
                        type: 'POST',
                        data: {
                            "id": id,
                        },
                        success: function (){
                            // hide the div with data-id attribute
                            $('#img-'+id).hide();
                        }
                    });
                });
            });
    </script>

@endpush
