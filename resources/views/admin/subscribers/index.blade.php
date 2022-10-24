@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __("Subscribers") }}
@endsection

{{-- Active Menu --}}
@section('subscribers')
    active
@endsection


@push('vendor-css')
<link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/quill/css/quill.snow.css') }}">
@endpush



{{-- Breadcrumb --}}
@section('breadcrumb')
    <h2 class="content-header-title float-left mb-0">{{ __("Admin Dashboard") }}</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">{{ __("Home") }}</a>
            </li>
            <li class="breadcrumb-item active">
                {{ __("Subscribers") }}
            </li>
        </ol>
    </div>
@endsection

{{-- Main Content --}}
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-block d-sm-flex">
                <h4 class="card-title">{{ __("Subscribers List") }} ({{ $subscribers->count() }})</h4>

                <div class="d-flex">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#send_mail" >
                        {{ __('Send Bulk email') }}
                    </button>

                    <div class="button-group-spacing">
                        <div id="all_actions" class="dropdown w-100 w-sm-auto d-none">
                            <button class="btn btn-info w-100 w-sm-auto dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                All Action
                            </button>
                            <div class="dropdown-menu dropdown-menu-right w-100">
                                @if (havePermission('subscriber','delete'))
                                    <button class="dropdown-item" data-toggle="modal" data-target="#deleteModal">{{ __("Delete") }}</button>
                                    @push('all_modals')
                                        <!-- Bulk Delete Modal -->
                                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body text-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" style="font-size: 100px" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle text-danger">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                            <line x1="12" y1="8" x2="12" y2="12"></line>
                                                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                                        </svg>
                                                        <h2 class="font-weight-normal mt-1">{{ __('Are you sure?') }}?</h2>
                                                        <h4 class="font-weight-light mb-0">{{ __("You won't be able to revert this!") }}</h4>
                                                    </div>
                                                    <div class="modal-footer border-top-0 justify-content-center">
                                                        <button type="button" class="btn btn-outline-secondary waves-effect" data-dismiss="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                                            </svg>
                                                            {{ __('Close') }}
                                                        </button>
                                                        <button id="delete_all" class="btn btn-danger waves-effect waves-float waves-light">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                                            </svg>
                                                            {{ __('Delete') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endpush
                                @endif
    
                                {{--  --}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="modal fade" id="send_mail" tabindex="-1" role="dialog" aria-labelledby="send_mailTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="{{ route('admin.bulk.email') }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="subject">{{ __('Subject') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="subject" placeholder="{{ __('Subject') }}" value="{{ old('subject') }}" required>
                                </div>
    
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="message"> {{ __('Message') }} <small class="text-danger">*</small></label>
                                        <div class="custom-editor-wrapper">
                                            <div class="custom-editor">{!! old('message') !!}</div>
                                            <input type="hidden" name="message" class="custom-editor-input" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                                <button type="submit" class="btn btn-primary">{{ __('Send') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="card-body">
                <form action="{{ route('subscriber.date.filter') }}" method="GET">
                    <div class="row align-items-end">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="start_date">{{ __("Start Date") }} <span class="text-danger">*</span></label>
                                <input type="date" name="start_date" @isset(request()->start_date) value="{{ \Carbon\Carbon::parse(request()->start_date)->format('Y-m-d') }}" @endisset id="start_date" class="form-control flatpickr-human-friendly" placeholder="dd/mm/yyyy">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="start_date">{{ __("End Date") }} <span class="text-danger">*</span></label>
                                <input type="date" @isset(request()->start_date) value="{{ \Carbon\Carbon::parse(request()->end_date)->format('Y-m-d') }}" @endisset name="end_date" id="end_date" class="form-control flatpickr-human-friendly" placeholder="dd/mm/yyyy">
                            </div>
                        </div>
                        <div class="col-md-auto">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success waves-effect w-100 w-sm-auto">{{ __("Filter") }}</button>
                                @if(Route::is('subscriber.date.filter'))
                                <a href="{{ route('subscribers.index') }}" class="btn btn-danger waves-effect mt-1 mt-sm-0 w-100 w-sm-auto">{{ __("Clear") }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-md-center">
                        <div class="col-md">
                            <div class="form-group mb-md-0">
                                <div class="input-group">
                                    <input type="search" class="form-control table_search" placeholder="Search Here">
                                    <div class="input-group-append">
                                      <span class="input-group-text">
                                        <i data-feather='search'></i>
                                      </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include( 'includes.pagination', ['variables' => $subscribers, 'pagination_col_class' => 'col-md-auto', 'data_variables' => ['start_date' => request()->start_date,'end_date' => request()->end_date]])
                    </div>
                </form>
                <div class="table-responsive mt-2">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input main_checkbox" id="all-select">
                                        <label class="custom-control-label" for="all-select"></label>
                                    </div>
                                </th>
                                <th>{{ __("Actions") }}</th>
                                <th>{{ __("Email") }}</th>
                                <th>{{ __("Created At") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subscribers as $subscriber)
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input all_checkbox" name="select_individual[]" id="single-select-{{ $subscriber->id }}">
                                            <label class="custom-control-label" for="single-select-{{ $subscriber->id }}"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-icon btn-outline-secondary waves-effect dropdown-toggle hide-arrow" data-toggle="dropdown" data-boundary="viewport">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                @if (havePermission('subscriber','delete'))
                                                    <a class="dropdown-item" data-toggle="modal" data-target="#deleteModal_{{ $subscriber->id }}" title="Delete">
                                                        <i data-feather="trash" class="mr-50"></i>
                                                        <span>{{ __('Delete') }}</span>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $subscriber->email }}</td>
                                    <td>{{ $subscriber->created_at->diffForHumans() }}</td>
                                </tr>
                                @push('all_modals')
                                    <!-- Single Delete Modal -->
                                    <div class="modal fade" id="deleteModal_{{ $subscriber->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form action="{{ route('subscribers.destroy', $subscriber->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('delete')
                                                    <div class="modal-body text-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" style="font-size: 100px" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle text-danger">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                            <line x1="12" y1="8" x2="12" y2="12"></line>
                                                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                                        </svg>
                                                        <h2 class="font-weight-normal mt-1">{{ __('Are you sure?') }}?</h2>
                                                        <h4 class="font-weight-light mb-0">{{ __("You won't be able to revert this!") }}</h4>
                                                    </div>
                                                    <div class="modal-footer border-top-0 justify-content-center">
                                                        <button type="button" class="btn btn-outline-secondary waves-effect" data-dismiss="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                                            </svg>
                                                            {{ __('Close') }}
                                                        </button>
                                                        <button class="btn btn-danger waves-effect waves-float waves-light">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                                            </svg>
                                                            {{ __('Delete') }}
                                                        </button>
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
                @include('includes.pagination' , ['variables' => $subscribers, 'data_variables' => ['start_date' => request()->start_date,'end_date' => request()->end_date]])
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

<script src="{{ asset('dashboard_assets/app-assets/quill/js/quill.min.js') }}"></script>
{{-- <script src="{{ asset('dashboard_assets/app-assets/quill/js/quill-image-resize.min.js') }}"></script> --}}

<script>

    $(document).ready(function(){
        var ids = [];
        // Select All Checkbox Features
        $('#all-select').change(function(){
             ids = [];
             // Get all the id
            if($(this).is(":checked")){
                $('.custom-control-input').prop('checked', true);


                $('.all_checkbox').each(function(){
                    ids.push($(this).attr('id').split('-')[2]);
                });

                if(ids.length == 0){
                    $('#all_actions').removeClass('d-inline-block');
                    $('#all_actions').addClass('d-none');
                }
                else
                {
                    $('#all_actions').removeClass(' d-none');
                    $('#all_actions').addClass('d-inline-block');
                    $('#export_all').val(ids);
                }
                // Delete all
                $("#delete_all").on('click', function(){

                    $.ajax({
                    url: "{{ route('subscriber.mass_action') }}",
                    type: 'POST',
                    data: {
                        ids: ids,
                    },
                    success: function(data){
                        if(data.success == 'done'){
                            window.location.reload();
                        }
                    }
                });

            });



            }else{
                $('.custom-control-input').prop('checked', false);
                $('#all_actions').addClass('d-none');
                $('#all_actions').removeClass('d-inline-block');
            }
        });

        // Select Individual Checkbox Features
        $('.all_checkbox').change(function(){
             ids = [];
            $('.all_checkbox').each(function(){
                if($(this).is(":checked")){
                    ids.push($(this).attr('id').split('-')[2]);
                }
            });
            if(ids.length == 0){
                $('#all_actions').removeClass('d-inline-block');
                $('#all_actions').addClass('d-none');
            }
            else
            {
                $('#all_actions').removeClass(' d-none');
                $('#all_actions').addClass('d-inline-block');
                $('#export_all').val(ids);

                    // Delete trigger

                    $("#delete_all").on('click', function(){

                        $.ajax({
                                url: "{{ route('subscriber.mass_action') }}",
                                type: 'POST',
                                data: {
                                    ids: ids,
                                },
                                success: function(data){
                                    if(data.success == 'done'){
                                        window.location.reload();
                                    }
                                }
                        });

                    });
            }
        });

        // Banner Import
        $('body').on('change','#importBanner',function(){
            var form_data = new FormData($('#importBannerForm')[0]);

            $.ajax({
                url: "",
                type: "post",
                 data: form_data,
                contentType: false,
                processData: false,
                success: function (response) {
                    if(response.data){
                        $('#importSubmitButton').removeClass('d-none');
                        $('#importError').addClass('d-none');
                        $('#bannerCsvHeader').html(response.data);
                    }
                    if(response.error){
                        $('#importSubmitButton').addClass('d-none');
                        $('#importError').removeClass('d-none');
                        $('#importError').text(response.error);
                    }
                },
            });
        });


        $('.table_search').on('input', function(){
            var tableSearchValue = $(this).val();
            $(this).closest(".card-body").find(".table tbody tr").each(function(){
                if($(this).text().search(new RegExp(tableSearchValue, "i")) < 0){
                    $(this).hide();
                }
                else{
                    $(this).show();
                }
            });
        });
    });

</script>
@endsection

@push('page-js')

<script>
    $(document).ready(function (){
        (function(){
            if($(".custom-editor-wrapper").length){
                /* Initialize QUill editor */
                let quillEditor = new Quill('.custom-editor', {
                    modules: {
                        // imageResize: {
                        //     displaySize: true
                        // },
                        toolbar: [
                            [{ header: [1, 2, 3, 4, 5, 6,  false] }],
                            ['bold', 'italic', 'underline','strike'],
                            ['blockquote', 'code-block'],
                            // ['image', 'video'],
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
