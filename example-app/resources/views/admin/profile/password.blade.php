@extends('admin.admin_master')

@section('admin')
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>--}}
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Change Password Page</h4><br><br>

                            @if(count($errors))
                                @foreach($errors->all() as $error)
                                    <p class="alert alert-danger alert-dismissable fade show">{{ $error }}</p>
                                @endforeach
                            @endif

                            <form method="POST" action="{{ route('update.password') }}" >
                                @csrf
                                <div class="row mb-3">
                                    <label for="oldpassword" class="col-sm-2 col-form-label">Old Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="oldpassword" type="password"  id="oldpassword">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="newpassword" class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="newpassword" type="password"  id="newpassword">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="confirm_password" class="col-sm-2 col-form-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="confirm_password" type="password"  id="confirm_password">
                                    </div>
                                </div>
                                <!-- end row -->


                                <input type="submit" value="Change Password" class="btn btn-info waves-light waves-effect">
                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
            <!-- end row -->


        </div> <!-- container-fluid -->
    </div>

{{--    <script>--}}
{{--        $(document).ready(function (){--}}
{{--            $('#profile_image').change(function (e){--}}
{{--                var reader = new FileReader();--}}
{{--                reader.onload = function (e){--}}
{{--                    $('#showImage').attr('src', e.target.result);--}}
{{--                }--}}
{{--                reader.readAsDataURL(e.target.files['0']);--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
@endsection
