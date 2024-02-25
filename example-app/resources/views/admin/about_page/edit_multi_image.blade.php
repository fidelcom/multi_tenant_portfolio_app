@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Update Multi Image</h4><br><br>
                            <form method="POST" action="{{ route('update.multi.image', $multiImage->id) }}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{$multiImage->id}}">

                                <div class="row mb-3">
                                    <label for="multi_image" class="col-sm-2 col-form-label">Edit Multi Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="multi_image" type="file" id="multi_image">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-xl" src="{{ (!empty($multiImage->multi_image)) ? url($multiImage->multi_image) : asset('backend/assets/images/small/img-5.jpg') }}" alt="Card image cap">
                                    </div>
                                </div>
                                <!-- end row -->
                                <input type="submit" value="Update Multi Image" class="btn btn-info waves-light waves-effect">
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
            $('#multi_image').change(function (e){
                var reader = new FileReader();
                reader.onload = function (e){
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
