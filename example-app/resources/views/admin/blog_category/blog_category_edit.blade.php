@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Blog Page</h4><br><br>
                            <form method="POST" action="{{ route('update.blog.category', $editBlogCategory->id) }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="blog_category" class="col-sm-2 col-form-label">Edit Blog Category Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="blog_category" type="text" value="{{ $editBlogCategory->blog_category }}" id="blog_category">
                                        @error('blog_category')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- end row -->

                                <input type="submit" value="Update Blog Category" class="btn btn-info waves-light waves-effect">
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
            $('#about_image').change(function (e){
                var reader = new FileReader();
                reader.onload = function (e){
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
