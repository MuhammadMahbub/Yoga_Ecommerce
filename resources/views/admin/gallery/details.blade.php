@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __("Gallery") }}
@endsection

{{-- Active Menu --}}
@section('admin.gallery.index')
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
                <a href="{{ route('dashboard') }}">{{ __("Home") }}</a>
            </li>
            <li class="breadcrumb-item active">
                {{ __("Gallery") }}
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
                <h4 class="card-title">{{ __("Gallery Images") }}</h4>
                <div>
                    <a href="{{ route('admin.gallery.index') }}" class="btn btn-success">{{ __('List') }}</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered data_table">
                        <thead>
                            <tr>
                                <th>{{ __("Sl") }}</th>
                                <th>{{ __("Image") }}</th>
                                <th>{{ __("Order") }}</th>
                                <th>{{ __("Actions") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gallery->getImages as $moreImage)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        <img src="{{ asset($moreImage->image)}}" alt="Image" width="150">
                                    </td>
                                    <td>
                                        <input type="number" name="order" id="order{{ $moreImage->id }}" value="{{ $moreImage->order }}" class="form-control">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-success update_order" data-id="{{$moreImage->id}}">
                                            {{ __('Update') }}
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('js')
    <script>

        $(document).on("click", ".update_order", function(){

            let id = $(this).attr('data-id');
            let order = $('#order'+id).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('admin.gallery.image.update') }}",
                type: "post",
                data: {
                    id:id,
                    order:order,
                },
                success: function (response) {
                    if (response.success == 200) {
                        toastr.success("{{ __('Updated successfully') }}");
                    }
                }
            });

        });
       
    </script>
@endpush

