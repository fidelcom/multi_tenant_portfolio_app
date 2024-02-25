@extends('admin.admin_master')

@section('admin')

    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">All Blog</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Blog</a></li>
                                <li class="breadcrumb-item active">posts</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">All Blog Post</h4>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Blog Category</th>
                                    <th>Blog Title</th>
                                    <th>Blog Tags</th>
{{--                                    <th>Blog Description</th>--}}
                                    <th>Blog Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>


                                <tbody>
                                @php($i = 1)
                                @foreach($blogs as $item)
                                    <tr>

                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item->blogCategory->blog_category }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->tags }}</td>
{{--                                        <td>{!!   $item->description !!}</td>--}}
                                        <td><img src="{{ asset($item->image) }}" style="width: 60px; height: 50px;"></td>
                                        <td>
                                            <a href="{{ route('blog.edit', $item->id) }}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i> </a>
                                            <a href="{{ route('blog.del', $item->id) }}"  class="btn btn-danger sm" title="Delete Data"  id="delete"><i class="fas fa-trash-alt"></i> </a>
                                        </td>

                                        {{--                                    <td>61</td>--}}
                                        {{--                                    <td>2011/04/25</td>--}}
                                        {{--                                    <td>$320,800</td>--}}
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
    </div>

@endsection
