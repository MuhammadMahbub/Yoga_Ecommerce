<script type="text/javascript" src="{{ asset('frontend_assets/js/jquery-1.9.1.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('frontend_assets/js/jquery.selectric.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('frontend_assets/js/jquery.bxslider.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('dashboard_assets/app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend_assets/js/jquery.jscrollpane.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend_assets/plugins/cookies/js/cookies.js') }}"></script>
@yield('plugin-js')
<script type="text/javascript" src="{{ asset('frontend_assets/js/script.js')}}"></script>

<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "3000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    $(window).on("load", function(){
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error('{{ $error }}');
            @endforeach
        @endif

        @if(session()->get('error'))
            toastr.error('{{ session()->get('error') }}');
        @endif

        @if(session()->get('success'))
            toastr.success('{{ session()->get('success') }}');
        @endif
    });
</script>


<script>
    $(document).ready(function () {
        $('#subscribe_us').click(function (e) {
            e.preventDefault();

            let email = $('#subscriber_email').val();
            // alert(email)
            function isValidEmailAddress(emailAddress) {
            var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
            return pattern.test(emailAddress);
            }

            if(email == '')
            {
                toastr.error('Please Enter Email')
            }
            if(email != '')
            {
                if(!isValidEmailAddress(email))
                {
                    toastr.error('Please Enter valid Email')
                }
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('subscribers.store') }}",
                type: "POST",
                data: {
                    email: email,
                },
                success: function(data){
                    if(data.success == '200'){
                        toastr.success(data.message);
                        $('#subscriber_email').val('');
                    }else{
                        toastr.error(data.message);
                        $('#subscriber_email').val('');
                    }

                },

            });

        });

        $(".alert__close-btn").on("click", function(){
            $(this).closest(".alert").fadeOut("normal", function(){
                $(this).remove();
            });
        });
    });
</script>

@yield('js');