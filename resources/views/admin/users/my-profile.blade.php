@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | My Profile
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb')
    <h2 class="content-header-title float-left mb-0">Admin Dashboard</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">
                My Profile
            </li>
        </ol>
    </div>
@endsection

{{-- Main Content --}}
@section('content')
<div class="row">
    <div class="col-12">
        <ul class="nav nav-pills mb-2" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" data-toggle="pill" href="#pills-account" role="tab" aria-selected="true">
                    <i data-feather='user' class="mr-50"></i>
                    Account
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-toggle="pill" href="#pills-security" role="tab" aria-selected="false">
                    <i data-feather='lock' class="mr-50"></i>
                    Security
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="pills-account" role="tabpanel">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">Profile Details</h4>
                    </div>
                    <div class="card-body py-2">
                        <form action="{{ route('my-profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex flex-wrap align-items-end">
                                <input type="hidden" name="id" value="{{ Auth::id() }}">
                                <div class="mr-1 mb-1">
                                    @if(!Auth::user()->profile_photo_path)
                                        <img src="{{ Auth::user()->profile_photo_url }}" data-reset-src="{{ Auth::user()->profile_photo_url }}" id="account-upload-img" class="uploadedAvatar rounded object-fit--cover" alt="profile image" width="100" height="100">
                                    @else
                                        <img src="{{ asset(Auth::user()->profile_photo_path) }}" class="uploadedAvatar rounded object-fit--cover" alt="profile image" width="100" height="100">
                                    @endif
                                </div>
                                <!-- upload and reset button -->
                                <div class="d-flex align-items-end mb-1">
                                    <div>
                                        <label role="button" for="account-upload" class="btn btn-sm btn-success mb-75 mr-75 waves-effect waves-float waves-light">Upload</label>
                                        <input type="file" name="account_image" id="account-upload" accept="image/*" hidden="">
                                        <button type="button" id="account-reset" class="btn btn-sm btn-outline-secondary mb-75 waves-effect">Reset</button>
                                        <p class="mb-0">Allowed file types: png, jpg, jpeg.</p>
                                    </div>
                                </div>
                                <!--/ upload and reset button -->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Full Name</label>
                                        <input type="text" id="name" class="form-control" name="name" value="{{ Auth::user()->name }}" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" class="form-control" name="email" value="{{ Auth::user()->email }}" placeholder="demo@demo.com">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="website">Website</label>
                                        <input type="url" id="website" value="{{ Auth::user()->website }}" class="form-control" name="website" placeholder="https://demo.com">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <input type="tel" id="phone" value="{{ Auth::user()->phone }}" class="form-control" name="phone" placeholder="xxx xxx xxx xxx">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" id="address" value="{{ Auth::user()->address }}" class="form-control" name="address" placeholder="Your Address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" id="city" value="{{ Auth::user()->city }}" class="form-control" name="city" placeholder="City">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <select id="country" name="country" class="select2 form-select" required>
                                            @if(Auth::user()->country)
                                                <option value="{{ Auth::user()->country }}">{{ Auth::user()->country }}</option>
                                            @else 
                                                <option value="">Select Country</option>
                                            @endif
                                            <option value="Australia">Australia</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="Canada">Canada</option>
                                            <option value="China">China</option>
                                            <option value="France">France</option>
                                            <option value="Germany">Germany</option>
                                            <option value="India">India</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Japan">Japan</option>
                                            <option value="Korea">Korea, Republic of</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="Russia">Russian Federation</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="United States">United States</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="about">About</label>
                                        <div>
                                            <input id="about" value="{!! Auth::user()->about !!}" type="hidden" name="about">
                                            <trix-editor input="about" class="trix-content"></trix-editor>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success waves-effect waves-float waves-light w-100 w-sm-auto">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>            
                </div>
            </div>
            <div class="tab-pane fade" id="pills-security" role="tabpanel">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">Change Password</h4>
                    </div>
                    <div class="card-body py-2">
                        <form>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="account-old-password">Current password<span class="text-danger">*</span> </label>
                                        <div class="input-group form-password-toggle">
                                            <input type="password" class="form-control" id="account-old-password" name="password" placeholder="Enter current password">
                                            <div class="input-group-append cursor-pointer">
                                                <span role="button" class="input-group-text">
                                                    <i data-feather='eye'></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="account-new-password">New Password<span class="text-danger">*</span> </label>
                                        <div class="input-group form-password-toggle">
                                            <input type="password" class="form-control" id="account-new-password" name="new-password" placeholder="Enter current password">
                                            <div class="input-group-append cursor-pointer">
                                                <span role="button" class="input-group-text">
                                                    <i data-feather='eye'></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="account-retype-new-password">Retype New Password<span class="text-danger">*</span> </label>
                                        <div class="input-group form-password-toggle">
                                            <input type="password" class="form-control" id="account-retype-new-password" name="confirm-new-password" placeholder="Enter current password">
                                            <div class="input-group-append cursor-pointer">
                                                <span role="button" class="input-group-text">
                                                    <i data-feather='eye'></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button id="pw-update" type="button" class="btn btn-success waves-effect waves-float waves-light w-100 w-sm-auto">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>            
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@push('js')
    <script>
        // Update & Reset Profile photo on click of button
        $(document).ready(function(){
            let accountUploadImg = $('#account-upload-img');
            let accountUploadInput = $('#account-upload');
            let accountResetBtn = $('#account-reset');
            if (accountUploadInput) {
                accountUploadInput.on('change', function (e) {
                    var reader = new FileReader(),
                        files = e.target.files;
                    reader.onload = function () {
                        if (accountUploadImg) {
                            accountUploadImg.attr('src', reader.result);
                        }
                    };
                    reader.readAsDataURL(files[0]);
                });
            }
            accountResetBtn.on('click', function(e){
                if (accountUploadImg) {
                    accountUploadImg.attr('src', accountUploadImg.attr('data-reset-src'));
                    // Reset accountUploadInput value
                    if (accountUploadInput.val() != '') {
                        accountUploadInput.val('');
                    }
                }
            });

            // Password update 
            $("#pw-update").click(function(e){
                e.preventDefault();
                let oldpass = $("#account-old-password").val();
                let newpass = $("#account-new-password").val();
                let confirmpass = $("#account-retype-new-password").val(); 

                // Check if all fields are filled 
                if(oldpass == "" || newpass == "" || confirmpass == "")
                {
                    toastr.error('Oops !! Please fill all fields');
                }
                else 
                {
                    if( newpass !=  confirmpass)
                    {
                        toastr.error('Oops !! Password confirmation does not match');
                    }
                    else 
                    {
                        $.ajax({
                            url: "{{ route('password.updates') }}",
                            type: "POST",
                            data: {
                                oldpass: oldpass,
                                newpass: newpass,
                                confirmpass: confirmpass,
                            },
                            success: function(response){
                                if(response.wrong)
                                {
                                    toastr.error(response.wrong);
                                }
                                else 
                                {
                                    toastr.success(response.success);
                                    $("#account-old-password").val('');
                                    $("#account-new-password").val('');
                                    $("#account-retype-new-password").val('');
                                }
                            }
                        });
                    }
                }
            });
        })
    </script>   
@endpush