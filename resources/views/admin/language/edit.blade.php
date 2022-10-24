@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __("Language Update") }}
@endsection

{{-- Active Menu --}}
@section('lang_edit')
    active
@endsection

@push('css')

@endpush

@section('content')
<div class="container-fluid px-4">

    <!--==========Priority Table==========-->
    <div class="user_list user-page table-responsive table-overflow-none mt-2">
        <div class="mb-2">
            {{-- <a href="{{ route('lang_edit') }}">
                <button data="" class="country_short_name">
                    Frence---
                </button>
            </a> --}}
            @php
                $route = Request::url();
                $url_path = parse_url($route, PHP_URL_PATH);
                $basename = pathinfo($url_path, PATHINFO_BASENAME);
                // $lang_name = App\Models\Language::where('short_name',$basename)->first();
            @endphp
        </div>
        {{-- <form method="POST" enctype="multipart/form-data">
            @csrf --}}
            <table class="table table-hover dataTable">
                <thead>
                    <tr>
                        <th scope="col">{{ __('Key') }}</th>
                        <th scope="col" class="w-50 lang_text">{{ $lang_name->name ?? 'French' }}</th>
                        <th scope="col">{{ __('Action') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $key => $value)
                        <tr>
                            {{-- <td> --}}
                                <input type="hidden" name="s_name" value="{{ $s_name }}" class="s_name">
                            {{-- </td> --}}
                            <td>
                                <span>{{ $key}}</span>
                            </td>
                            {{-- <td> --}}
                                <input class="lang_key" type="hidden" name="key" value="{{ $key }}">
                            {{-- </td> --}}
                            <td>
                                <input class="form-control data_value{{ $loop->index }}" name="value" type="text" value="{{ $value }}">
                            </td>
                            <td>
                                <button class="btn btn-primary nowrap update_btn" data-index="{{ $loop->index }}" id="" data-short-name="{{ $s_name }}" data-key="{{ $key }}">{{ __('Update') }}</button>
                            </td>
                        </tr>
                    @endforeach
                    {{-- @include('admin.language_edit_table') --}}
                </tbody>
            </table>
        {{-- </form> --}}
    </div>
</div>
@endsection

@section('js')
{{-- <script>
    $(document).ready(function () {
        $('.country_short_name').on('click',function(){
            let data = $(this).attr('data')
            let lang_name = $(this).attr('lang_name')
            $('.lang_text').text(lang_name)
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
            })

            $.ajax({
                type: "POST",
                url: "{{ route('language_edit') }}",
                data: {
                    data:data
                },
                success: function (response) {
                    // console.log(response);
                    $('#lang_table').html(response.data)
                },
            });
        })
    });
</script> --}}

<script>
    $(document).ready(function () {
        // alert('data_key')
        $('body').on('click','.update_btn',function(){
            let data_key = $(this).attr('data-key');
            let short_name = $(this).attr('data-short-name');
            let loop_index = $(this).attr('data-index');
            let data_value = $('.data_value'+loop_index).val();
            // console.log(data_value);

            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
            })

            $.ajax({
                type: "POST",
                url: "{{ route('lang_update') }}",
                data: {
                    data_key:data_key,
                    short_name:short_name,
                    data_value:data_value,
                },
                success: function (response) {
                    console.log(response);
                    toastr.success(response.success);
                },
            });

        })
    });
</script>
@endsection

