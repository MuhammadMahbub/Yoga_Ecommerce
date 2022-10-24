@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __("Edit Blog") }}
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
            <li class="breadcrumb-item active">
                {{ __("Edit") }} {{ $blog->title }}
            </li>
        </ol>
    </div>
@endsection

{{-- Main Content --}}
@section('content')
<div class="row">
    <div class="col-12">
        <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __("Edit Blog") }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="title[fr]">{{ __("Blog Title") }} (FR)<small class="text-danger">*</small></label>
                                {{ app()->setLocale('fr') }}
                                <input type="text" value="{{ $blog->title }}" class="form-control" id="title[fr]" name="title[fr]">
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
                                <label for="title[en]">{{ __("Blog Title") }}(En) </label>
                                {{ app()->setLocale('en') }}
                                <input type="text" value="{{ $blog->title }}" class="form-control" id="title[en]" name="title[en]">
                                {{ app()->setLocale($current_locale) }}
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="short_description[fr]"> {{ __("Short Description") }} (FR)</label>
                                {{ app()->setLocale('fr') }}
                               <textarea class="form-control" name="short_description[fr]" id="short_description[fr]" cols="30" rows="5">{!! $blog->short_description !!}</textarea>
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
                                <label for="short_description[en]"> {{ __("Short Description") }}(EN) </label>
                                {{ app()->setLocale('en') }}
                               <textarea class="form-control" name="short_description[en]" id="short_description[en]" cols="30" rows="5">{!! $blog->short_description !!}</textarea>
                               {{ app()->setLocale($current_locale) }}
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>{{ __("Long Description") }} (FR)<small class="text-danger">*</small></label>
                                <div class="custom-editor-wrapper">
                                    {{ app()->setLocale('fr') }}
                                    <div class="custom-editor">
                                        {!! $blog->description !!}
                                    </div>
                                    <input type="hidden" value="{{ $blog->description }}" name="description[fr]" class="custom-editor-input">
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
                                <label>{{ __("Long Description") }} (EN)</label>                                
                                <div class="custom-editor-wrapper">
                                    {{ app()->setLocale('en') }}
                                    <div class="custom-editor">
                                        {!! $blog->description !!}
                                    </div>
                                    <input type="hidden" value="{{ $blog->description }}" name="description[en]" class="custom-editor-input">
                                    {{ app()->setLocale($current_locale) }}
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="image">{{ __("Blog Image") }} <small class="text-danger">({{ __("preferred ratio") }} 7∶5 )</small></label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">{{ __("Choose Image") }}</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="d-block">{{ __('Preview Image') }}</label>
                                <img class="img-fluid" id="output" style="max-height: 300px">
                            </div>
                            <div class="form-group">
                                <label class="d-block">{{ __("Existing Image") }}</label>
                                <img src="{{ asset('uploads/blogs/'.$blog->image) }}" alt="" class="img-fluid" width="150px">
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
                                <label for="product_status">{{ __("Blog Status") }}</label>
                                <select class="form-control select2" id="product_status" name="status">
                                    <option value="active" {{ $blog->status == 'active' ? 'selected' : '' }}>{{ __("Active") }}</option>
                                    <option value="inactive" {{ $blog->status == 'inactive' ? 'selected' : '' }}>{{ __("Inactive") }}</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="meta_title"> {{ __("Meta Title") }} </label>
                                <input type="text" value="{{ $blog->meta_title ?? old('meta_title') }}" class="form-control" id="title" name="meta_title" placeholder="{{ __("Blog Meta Title") }}">
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
                                <label for="meta_keyword"> {{ __("Meta Keywords") }} </label>
                                <input type="text" value="{{ $blog->meta_keyword ?? old('meta_keyword') }}" class="form-control" id="keyword" name="meta_keyword" placeholder="{{ __("Blog Meta Keywords") }}">
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
                               <textarea class="form-control" name="meta_description" id="meta_description" cols="30" rows="10" placeholder="{{ __("Blog Meta Description") }}">{{ $blog->meta_description }}</textarea>
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

    <script>
        document.getElementById('image').onchange = function() {
            var src = URL.createObjectURL(this.files[0])
            document.getElementById('output').src = src
        };
    </script>


@endpush
