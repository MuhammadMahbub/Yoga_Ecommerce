@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __("Create Blog") }}
@endsection

{{-- Active Menu --}}
@section('blogList')
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
                <a href="{{ route('blogs.index') }}">{{ __("Blogs") }}</a>
            </li>
            <li class="breadcrumb-item active">{{ __("Create") }}</li>
        </ol>
    </div>
@endsection

{{-- Main Content --}}
@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __("Create Blog") }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="title[fr]">{{ __("Blog Title") }} (FR)<small class="text-danger">*</small></label>
                                    <input type="text" value="{{ old('title.fr') }}" class="form-control" id="title[fr]" name="title[fr]" placeholder="{{ __("Blog Title") }}">
                                </div>
                                @error('title.fr')
                                    <div class="alert alert-danger">
                                        <div class="alert-body">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror
                                <div class="form-group">
                                    <label for="title[en]">{{ __("Blog Title") }} (EN)</label>
                                    <input type="text" value="{{ old('title.en') }}" class="form-control" id="title[en]" name="title[en]" placeholder="{{ __("Blog Title") }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="image">{{ __("Blog Image") }} <span class="text-danger">*</span> <small class="text-danger">({{ __("preferred ratio") }} 7∶5)</small></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">{{ __("Choose Image") }}</label>
                                    </div>
                                </div>
                                @error('image')
                                    <div class="alert alert-danger">
                                        <div class="alert-body">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror
                                <div class="form-group">
                                    <label for=""> {{ __('Preview Image') }} </label>
                                    <img width="200" id="output">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="product_status">{{ __("Status") }} <span class="text-danger">*</span></label>
                                    <select class="form-control select2" id="product_status" name="status">
                                        <option value="active">{{ __("Active") }}</option>
                                        <option value="inactive">{{ __("Inactive") }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="short_description[fr]"> {{ __("Short Description") }}(FR) <span class="text-danger">*</span></label>
                                   <textarea class="form-control" name="short_description[fr]" id="short_description[fr]" cols="30" rows="5" placeholder="{{ __("Short Description") }}">{{ old('short_description.fr') }}</textarea>
                                </div>
                                @error('short_description.fr')
                                    <div class="alert alert-danger">
                                        <div class="alert-body">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror
                                
                                <div class="form-group">
                                    <label for="short_description[en]"> {{ __("Short Description") }} (EN)</label>
                                   <textarea class="form-control" name="short_description[en]" id="short_description[en]" cols="30" rows="5" placeholder="{{ __("Short Description") }}">{{ old('short_description.en') }}</textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label> {{ __("Long Description") }}(FR) <span class="text-danger">*</span></label>
                                    <div class="custom-editor-wrapper">
                                        <div class="custom-editor">
                                            {!! old('description.fr') !!}
                                        </div>
                                        <input type="hidden" name="description[fr]" class="custom-editor-input">
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
                                    <label for="description[en]"> {{ __("Long Description") }}(EN) </label>
                                    <div class="custom-editor-wrapper">
                                        <div class="custom-editor">
                                            {!! old('description.en') !!}
                                        </div>
                                        <input type="hidden" name="description[en]" class="custom-editor-input">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="meta_title"> {{ __("Meta Title") }} </label>
                                    <input type="text" value="{{ old('meta_title') }}" class="form-control" id="title" name="meta_title" placeholder="{{ __("Blog Meta Title") }}">
                                </div>
                                @error('meta_title')
                                    <div class="alert alert-danger">
                                        <div class="alert-body">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="meta_keyword"> {{ __("Meta Keywords") }}</label>
                                    <input type="text" value="{{ old('meta_keyword') }}" class="form-control" id="keywords" name="meta_keyword" placeholder="{{ __("Blog Meta Keywords") }}">
                                </div>
                                @error('meta_keyword')
                                    <div class="alert alert-danger">
                                        <div class="alert-body">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="meta_description"> {{ __("Meta Description") }} </label>
                                   <textarea class="form-control" name="meta_description" id="meta_description" cols="30" rows="5" placeholder="{{ __("Blog Meta Description") }}"></textarea>
                                </div>
                                @error('meta_description')
                                    <div class="alert alert-danger">
                                        <div class="alert-body">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-success waves-effect waves-float waves-light w-100 w-sm-auto">{{ __("Submit") }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
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
    document.getElementById('image').onchange = function() {
        var src = URL.createObjectURL(this.files[0])
        document.getElementById('output').src = src
    };
</script>
@endsection
