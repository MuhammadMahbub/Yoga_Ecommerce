@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __("Yoga Class") }}
@endsection

{{-- Active Menu --}}
@section('yogaclassList')
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
            <li class="breadcrumb-item">
                <a href="{{ route('yogaclass.index') }}">{{ __("Yoga Class") }}</a>
            </li>
            <li class="breadcrumb-item active">
                {{ __("Yoga Class gallery") }}
            </li>
        </ol>
    </div>
@endsection

{{-- Main Content --}}
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __("Yoga Class gallery") }}</h4>
                <a href="#!" data-toggle="modal" data-target="#add_new" class="btn btn-success">+ {{ __('Add new') }}</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered data_table">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>{{ ('Image') }}</th>
                                <th>{{ __('Created at') }}</th>
                                <th>{{ __('Order') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($galleries as $gallery)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/class_gallery') }}/{{ $gallery->image }}" alt="Image" height="150">
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($gallery->created_at)->diffForHumans() }}</td>

                                    <td>
                                        <div class="input-group">
                                            <input type="text" class="form-control gallery_order{{ $gallery->id }}" placeholder="Order" value="{{ $gallery->order }}">
                                            <div class="input-group-append" id="button-addon2">
                                                <button class="btn btn-outline-primary waves-effect order_update_btn" data-id="{{ $gallery->id }}" type="button">{{ __('Mise à jour') }}</button>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-icon btn-outline-secondary waves-effect dropdown-toggle hide-arrow" data-toggle="dropdown" data-boundary="viewport">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item"  data-toggle="modal" data-target="#edit_modal{{ $gallery->id }}">
                                                    <i data-feather="edit" class="mr-50"></i>
                                                    {{ __('Edit') }}
                                                </a>
                                                <form action="{{ route('class.gallery.delete', $gallery->id) }}" method="POST">
                                                    @csrf 
                                                    <button type="submit" class="dropdown-item">
                                                        <i data-feather="trash" class="mr-50"></i>
                                                        {{ __('Delete') }}
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                @push('all_modals')
                                    <div class="modal fade" id="edit_modal{{ $gallery->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">{{ __('Modifier') }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('class.gallery.update',$gallery->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf 
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="galery_image_edit">{{ __("Gallery Image") }} <small class="text-danger">*</small></label>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="galery_image_edit" name="galery_image_edit" required>
                                                                <label class="custom-file-label" for="galery_image_edit">{{ __("Choose Image") }}</label>
                                                            </div>
                                                        </div>
                                                        @error('galery_image_edit')
                                                            <div class="alert alert-danger">
                                                                <div class="alert-body">
                                                                    {{ $message }}
                                                                </div>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('Cancel') }}</button>
                                                        <button type="submit" class="btn btn-primary">{{ __('Delete') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endpush

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>      
            
            @push('all_modals')
                <div class="modal fade" id="add_new" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Ajouter un nouveau</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('class.gallery.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf 
                                <input type="hidden" value="{{ request()->id }}" name="class_id">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="galery_image">{{ __("Gallery Image") }} <small class="text-danger">*</small></label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="galery_image" name="galery_image[]" required multiple>
                                            <label class="custom-file-label" for="galery_image">{{ __("Choose Image") }}</label>
                                        </div>
                                    </div>
                                    @error('galery_image')
                                        <div class="alert alert-danger">
                                            <div class="alert-body">
                                                {{ $message }}
                                            </div>
                                        </div>
                                    @enderror
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-primary">Soumettre</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endpush
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>
        @if($errors->has('galery_image') && $error->has('galery_image.*'))
            $('#add_new').modal('show');
        @endif

        @if($errors->has('galery_image_edit'))
            $("#edit_modal{{ session('id') }}").modal('show');
        @endif

        $('body').on('click','.order_update_btn',function (e) { 
            e.preventDefault();
            
            let id = $(this).attr('data-id');
            let order = $('.gallery_order'+id).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('class.gallery.order.update') }}",
                type: "post",
                data: {
                    id:id,
                    order:order,
                },
                success: function (response) {

                    toastr.success("{{ __('Updated successfully') }}");
                    
                }
            });
        });
    </script>
@endpush