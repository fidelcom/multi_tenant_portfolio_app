@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
{{--        <div class="row">--}}
{{--            <div class="col-12">--}}
{{--                <div class="page-title-box d-sm-flex align-items-center justify-content-between">--}}
{{--                    <h4 class="mb-sm-0">Edit Profile Page</h4>--}}

{{--                    <div class="page-title-right">--}}
{{--                        <ol class="breadcrumb m-0">--}}
{{--                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>--}}
{{--                            <li class="breadcrumb-item active">Forms Elements</li>--}}
{{--                        </ol>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Profile Page</h4>
                        <form method="POST" action="{{ route('store.profile') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="name" type="text" value="{{ $editData->name }}" id="name">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="username" type="text" value="{{ $editData->username }}" id="username">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="email" type="text" value="{{ $editData->email }}" id="email">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="profile_image" class="col-sm-2 col-form-label">Profile Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="profile_image" type="file" value="{{ $editData->name }}" id="profile_image">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-xl" src="{{ (!empty($editData->profile_image)) ? url('upload/admin/profile_images/'.$editData->profile_image) : asset('backend/assets/images/small/img-5.jpg') }}" alt="Card image cap">
                                </div>
                            </div>
                            <!-- end row -->
                            <input type="submit" value="Update Profile" class="btn btn-info waves-light waves-effect">
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->


    </div> <!-- container-fluid -->
</div>

    <script>
        $(document).ready(function (){
            $('#profile_image').change(function (e){
                var reader = new FileReader();
                reader.onload = function (e){
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
