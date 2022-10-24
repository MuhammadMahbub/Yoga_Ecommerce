@extends('frontend.layouts.app')

@section('title')
    Contact
@endsection

{{-- Active Menu --}}
@section('contact')
    current-menu-item
@endsection

@section('body_class')
    home
@endsection

@section('css')
<style>
    .contactGallery img{
        width: 100%;
        height: 405px;
    }
    .required_alert{
        color: red;
        margin-bottom: 10px;
    }
    .ourInstagram{
        margin-top: 30px;
    }
</style>
@endsection

@section('content')


<div class="pageHeader" style="background-image: url({{ asset('uploads/contacts')}}/{{ $contact->banner_image }});">
    <h1>{{ $contact->banner_title }}</h1>
</div>
<div class="ourContact">
    <div class="wrapper clear">
        <div class="contactGallery">
            <ul>
                @foreach ($galleries as $item)
                    <li><img src="{{ asset('uploads/studios')}}/{{ $item->image }}" alt=""></li>
                @endforeach
                {{-- <li><img src="{{ asset('frontend_assets/images')}}/content/gallery.jpg" alt=""></li>
                <li><img src="{{ asset('frontend_assets/images')}}/content/story.jpg" alt=""></li> --}}
            </ul>

        </div>
        <div class="contactInfo">
            <h3>{{ $contact->title }}</h3>
            @if ($contact->phone != null)
                <p>
                    <i class="contactPhone"></i> 
                    {{ $contact->phone }}
                </p>
            @endif

            @if ($contact->email != null)
                <p>
                    <i class="contactEmail"></i> 
                    {{ $contact->email }}
                </p>
            @endif
            <p><i class="contactLocation"></i> {{ $contact->address }}</p>
        </div>
    </div>
</div>
<div class="wrapper">
    {{-- <form class="form" method="POST" action="{{ route('contact_message') }}">
        @csrf --}}

        <h3 class="form__title">{{ __("Message Us") }}</h3>

        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name" class="form-label">{{ __("Name") }} <span class="text-danger">*</span></label>
                    <small class="text-danger" id="nameError"></small>
                    <input type="name" class="form-control" id="name" name="name" value="{{ old('name') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email" class="form-label">{{ __("Email") }} <span class="text-danger">*</span></label>
                    <small class="text-danger" id="emailError"></small>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone" class="form-label">{{ __("Phone") }} </label>
                    <input type="phone" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="address" class="form-label">{{ __("Address") }} </label>
                    <input type="address" class="form-control" id="address" name="address" value="{{ old('address') }}">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="message" class="form-label">{{ __("Message") }} <span class="text-danger">*</span></label>
                    <small class="text-danger" id="messageError"></small>
                    <textarea class="form-control" id="message" name="message" rows="8">{{ old('message') }}</textarea>
                </div>
            </div>
            <div class="col-12 text-center">
                <button type="submit" id="send_message" class="learnMore">{{ __("Send Message") }}</button>
            </div>

        </div>

    {{-- </form> --}}
</div>



{{-- <div class="locationMap">
    <!-- Map -->
    <script type="text/javascript">
        // AgroMix style
          var Asana = [
              { "featureType": "road.highway", "stylers": [ { "visibility": "off" } ]
            },{ "featureType": "landscape", "stylers": [ { "visibility": "off" } ]
            },{ "featureType": "transit", "stylers": [ { "visibility": "off" } ]
            },{ "featureType": "poi", "stylers": [ { "visibility": "off" } ]
            },{ "featureType": "poi.park", "stylers": [ { "visibility": "on" } ]
            },{ "featureType": "poi.park", "elementType": "labels", "stylers": [ { "visibility": "off" } ]
            },{ "featureType": "poi.park", "elementType": "geometry.fill", "stylers": [ { "color": "#d3d3d3" }, { "visibility": "on" } ]
            },{ "featureType": "poi.medical", "stylers": [ { "visibility": "off" } ]
            },{ "featureType": "poi.medical", "stylers": [ { "visibility": "off" } ]
            },{ "featureType": "road", "elementType": "geometry.stroke", "stylers": [ { "color": "#cccccc" } ]
            },{ "featureType": "water", "elementType": "geometry.fill", "stylers": [ { "visibility": "on" }, { "color": "#cecece" } ]
            },{ "featureType": "road.local", "elementType": "labels.text.fill", "stylers": [ { "visibility": "on" }, { "color": "#808080" } ]
            },{ "featureType": "administrative", "elementType": "labels.text.fill", "stylers": [ { "visibility": "on" }, { "color": "#808080" } ]
            },{ "featureType": "road", "elementType": "geometry.fill", "stylers": [ { "visibility": "on" }, { "color": "#fdfdfd" } ]
            },{ "featureType": "road", "elementType": "labels.icon", "stylers": [ { "visibility": "off" } ]
            },{ "featureType": "water", "elementType": "labels", "stylers": [ { "visibility": "off" } ]
            },{ "featureType": "poi", "elementType": "geometry.fill", "stylers": [ { "color": "#d2d2d2" } ]
            }
          ];
          function initialize() {

            // Declare new style
            var AsanastyledMap = new google.maps.StyledMapType(Asana, {name: "Asana"});

            // Declare Map options
            var mapOptions = {
                //center: new google.maps.LatLng(<?php echo $aPostCustom['uni_coordinates'][0] ?>),
                //zoom: <?php echo $aPostCustom['uni_zoom'][0] ?>,
                center: new google.maps.LatLng(41.404182, 2.199451),
                zoom: 14,
                scrollwheel: false,
                mapTypeControl:false,
                streetViewControl: false,
                panControl:false,
                rotateControl:false,
                zoomControl:true
            };

            // Create map
            var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

            // Setup skin for the map
            map.mapTypes.set('Asana_style', AsanastyledMap);
            map.setMapTypeId('Asana_style');

            //add marker
            //var marker_icon = "<?php echo get_stylesheet_directory_uri().'/images/marker.svg' ?>";
            var marker_icon = "images/marker.svg";
            //var myLatLng = new google.maps.LatLng(<?php echo $aPostCustom['uni_coordinates'][0] ?>);
            var myLatLng = new google.maps.LatLng(41.404182, 2.199451);
            var beachMarker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                icon: marker_icon
            });

          }
          google.maps.event.addDomListener(window, 'load', initialize);
        </script>

        <div class="location-map">
            <div class="map" id="map-canvas"></div>
        </div>
</div> --}}


@endsection


@section('js')
<script>
    $(document).ready(function () {
        $('#send_message').on('click', function(e){
            e.preventDefault();

            let name = $('#name').val();
            let email = $('#email').val();
            let phone = $('#phone').val();
            let address = $('#address').val();
            let message = $('#message').val();

            function isValidEmailAddress(emailAddress) {
            var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
            return pattern.test(emailAddress);
            }

            // console.log(name);

            if(name == '')
            {
                $("#nameError").html('Please Enter name');
            }
            if(email == '')
            {
                $("#emailError").html('Please Enter email');
            }

            if(message == '')
            {
                $("#messageError").html('Please Write message');

            }
            if(email != '')
            {
                if(!isValidEmailAddress(email))
                {
                    $("#emailError").html('Please Enter Valid email');
                }
            }


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('contact_message') }}",
                type: "POST",
                data: {
                    name: name,
                    email: email,
                    address: address,
                    phone: phone,
                    message: message,
                },
                success: function(data){
                    if(data.success == '200'){
                        toastr.success(data.message);
                        // window.location.reload();
                        $('#name').val('')
                        $('#email').val('');
                        $('#phone').val('');
                        $('#address').val('');
                        $('#message').val('');
                        $('#nameError').html('');
                        $('#emailError').html('');
                        $('#messageError').html('');
                    }

                },

            });
        })
    })
</script>
@endsection
