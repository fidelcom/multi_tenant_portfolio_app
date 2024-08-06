@extends('layouts.vendor')

@section('vendor')
    <!-- main-content-wrap -->
    <div class="main-content-inner">
        <!-- main-content-wrap -->
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Vendor Profile</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="{{ route('vendor.dashboard') }}"><div class="text-tiny">Dashboard</div></a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">Vendor Profile</div>
                    </li>
                </ul>
            </div>
            <!-- setting -->
{{--            <div class="form-setting form-style-2">--}}
                <form class="form-setting form-style-2 mb-20" method="POST" action="{{ route('vendor.profile.update', ['user' => $vendor->id]) }}" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="wg-box">
                        <div class="left">
                            <h5 class="mb-4">Your Personal Details</h5>
                            <div class="body-text">Edit your personal details</div>
                            <div class="item">
                                <img src="{{ asset($vendor->photo) }}" alt="">
                            </div>
                            <fieldset class="title mb-24">
                                <div class="body-title mb-10">Upload Profile Photo</div>
                                <div class="upload-image style-2">
                                    <div class="item up-load">
                                        <label class="uploadfile" for="myFile">
                                                                    <span class="icon">
                                                                        <i class="icon-upload-cloud"></i>
                                                                    </span>
                                            <span class="text-tiny">Drop your images here or select <span class="tf-color">click to browse</span></span>
                                            <input type="file" id="myFile" name="photo">
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="right flex-grow">
                            <div class="block-warning w-full mb-24">
                                <i class="icon-alert-octagon"></i>
                                <div class="body-title-2">Your license is invalid. Please activate your license!</div>
                            </div>
                            <fieldset class="name mb-24">
                                <div class="body-title mb-10">Your username</div>
                                <input class="flex-grow" type="text" placeholder="Enter your username" name="username" tabindex="0" value="{{ $vendor->username }}" aria-required="true" required="">
                            </fieldset>
                            <div class="flex flex-row gap-2">
                                <fieldset class="name mb-24">
                                    <div class="body-title mb-10">Your First Name</div>
                                    <input class="flex-grow" type="text" placeholder="Enter your first name" name="first_name" tabindex="0" value="{{ $vendor->first_name }}" aria-required="true" required="">
                                </fieldset>
                                <fieldset class="name mb-24">
                                    <div class="body-title mb-10">Your Last Name</div>
                                    <input class="flex-grow" type="text" placeholder="Enter your last name" name="last_name" tabindex="0" value="{{ $vendor->last_name }}" aria-required="true" required="">
                                </fieldset>
                            </div>
                            <div class="flex flex-row gap-2">
                                <fieldset class="name mb-24">
                                    <div class="body-title mb-10">Your Email</div>
                                    <input class="flex-grow" type="text" placeholder="Enter your email" name="email" tabindex="0" value="{{ $vendor->email }}" aria-required="true" required="">
                                </fieldset>
                                <fieldset class="name mb-24">
                                    <div class="body-title mb-10">Your Phone</div>
                                    <input class="flex-grow" type="text" placeholder="Enter your phone" name="phone" tabindex="0" value="{{ $vendor->phone }}" aria-required="true" required="">
                                </fieldset>
                            </div>

                            <fieldset class="name mb-24">
                                <div class="body-title mb-10">Your Address</div>
                                <input class="flex-grow" type="text" placeholder="Enter your address" name="address" tabindex="0" value="{{ $vendor->address }}" aria-required="true" required="">
                            </fieldset>
                            <div class="flex flex-wrap gap10 mb-50">
                                <button type="submit" class="tf-button">Update Profile</button>
                                {{--                            <a href="#" class="tf-button style-1">Reset license on this domain</a>--}}
                            </div>
                        </div>
                    </div>
                </form>
                <form class="form-setting form-style-2 mb-20" method="POST" action="{{ route('vendor.details') }}">
                    @csrf
                    <div class="wg-box">
                        <div class="left">
                            <h5 class="mb-4">You Business Details</h5>
                            <div class="body-text">Update your business details</div>
                        </div>
                        <div class="right flex-grow">
                            <div class="flex flex-row gap-2">
                                <fieldset class="text mb-24">
                                    <div class="flex items-center justify-between gap10 mb-10">
                                        <div class="body-title">Your Business Name</div>
                                        {{--                                    <a href="#" class="body-text tf-color">What’s this?</a>--}}
                                    </div>
                                    <input class="flex-grow" type="text" placeholder="Enter your business name" name="organization" tabindex="0" value="{{ $vendor->vendor?->organization }}" aria-required="true" required="">
                                </fieldset>
                                <fieldset class="name mb-24">
                                    <div class="body-title mb-10">Your Business Email</div>
                                    <input class="flex-grow" type="text" placeholder="Enter your business email" name="organization_email" tabindex="0" value="{{ $vendor->vendor?->organization_email }}" aria-required="true" required="">
                                </fieldset>
                            </div>
                            <fieldset class="name mb-24">
                                <div class="body-title mb-10">Your Business Phone No.</div>
                                <input class="flex-grow" type="text" placeholder="Enter your business phone no." name="organization_phone" tabindex="0" value="{{ $vendor->vendor?->organization_phone }}" aria-required="true" required="">
                            </fieldset>
                            <fieldset class="name mb-24">
                                <div class="body-title mb-10">Your Business Address</div>
                                <input class="flex-grow" type="text" placeholder="Enter your business address" name="organization_address" tabindex="0" value="{{ $vendor->vendor?->organization_address }}" aria-required="true" required="">
                            </fieldset>
                            <div class="flex flex-wrap gap10 mb-50">
                                <button type="submit" class="tf-button">Update Business Details</button>
                                {{--                            <a href="#" class="tf-button style-1">Reset license on this domain</a>--}}
                            </div>
                        </div>
                    </div>
                </form>
                <form class="form-setting form-style-2 mb-20" action="{{ route('vendor.change.password') }}" method="POST">
                    @csrf
                    <div class="wg-box">
                        <div class="left">
                            <h5 class="mb-4">Vendor Change Password</h5>
                            <div class="body-text">Change your password</div>
                        </div>
                        <div class="right flex-grow">
                            @if(session('status'))
                                <div class="block-available w-full mb-24">
                                    <i class="icon-alert-octagon"></i>
                                    <div class="body-title-2">{{ session('status') }}</div>
                                </div>
                            @elseif(session('error'))
                                <div class="block-warning w-full mb-24">
                                    <i class="icon-alert-octagon"></i>
                                    <div class="body-title-2">{{ session('error') }}</div>
                                </div>
                            @endif
                            <fieldset class="name mb-24">
                                <div class="body-title mb-10">Your Current Password</div>
                                <input class="flex-grow" type="password" placeholder="Enter your current password" name="old_password" tabindex="0" value="" aria-required="true" required="">
                                @error('old_password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                            <fieldset class="name mb-24">
                                <div class="body-title mb-10">Your New Password</div>
                                <input class="flex-grow" type="password" placeholder="Enter your new password" name="new_password" tabindex="0" value="" aria-required="true" required="">
                                @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                            <fieldset class="name mb-24">
                                <div class="body-title mb-10">Your Confirm Password</div>
                                <input class="flex-grow" type="password" placeholder="Enter your confirm password" name="new_password_confirmation" tabindex="0" value="" aria-required="true" required="">
                                @error('new_password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                            <div class="flex flex-wrap gap10 mb-50">
                                <button type="submit" class="tf-button">Change Password</button>
                                {{--                            <a href="#" class="tf-button style-1">Reset license on this domain</a>--}}
                            </div>
                        </div>
                    </div>
                </form>
{{--            </div>--}}

            <!-- /setting -->
        </div>
        <!-- /main-content-wrap -->
    </div>
    <!-- /main-content-wrap -->
@endsection
