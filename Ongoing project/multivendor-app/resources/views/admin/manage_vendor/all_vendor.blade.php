@extends('layouts.admin')

@section('admin')
    <!-- main-content-wrap -->
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>All User</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="{{ route('admin.all.vendor') }}"><div class="text-tiny">Dashboard</div></a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <a href="#"><div class="text-tiny">Vendor</div></a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">All Vendor</div>
                </li>
            </ul>
        </div>
        <!-- all-user -->
        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <div class="wg-filter flex-grow">
                    <form class="form-search">
                        <fieldset class="name">
                            <input type="text" placeholder="Search here..." class="" name="name" tabindex="2" value="" aria-required="true" required="">
                        </fieldset>
                        <div class="button-submit">
                            <button class="" type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
                <a class="tf-button style-1 w208" href="{{ route('admin.vendor.create') }}"><i class="icon-plus"></i>Add new</a>
            </div>
            <div class="wg-table table-all-user">
                <ul class="table-title flex gap20 mb-14">
                    <li>
                        <div class="body-title">Vendor</div>
                    </li>
                    <li>
                        <div class="body-title">Phone</div>
                    </li>
                    <li>
                        <div class="body-title">Status</div>
                    </li>
{{--                    <li>--}}
{{--                        <div class="body-title">Status</div>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <div class="body-title">Suspended</div>--}}
{{--                    </li>--}}
                    <li>
                        <div class="body-title">Action</div>
                    </li>
                </ul>
                <ul class="flex flex-column">
                    @foreach($users as $user)
                        <li class="user-item gap14">
                            <div class="image">
                                <img src="{{ asset($user->photo) }}" alt="">
                            </div>
                            <div class="flex items-center justify-between gap20 flex-grow">
                                <div class="name">
                                    <a href="#" class="body-title-2">{{ $user->first_name.' '.$user->last_name }}</a>
                                    <div class="text-tiny mt-3">{{ $user->email }}</div>
                                    <div class="text-tiny mt-3">{{ $user->role }}</div>
                                </div>
                                <div class="body-text">{{ $user->phone }}</div>
                                <div class="body-text">
                                    @if($user->status == 'active')
                                    <span class="badge rounded-pill p-2 bg-success capitalize">{{ $user->status }}</span>
                                        <span><a href="{{ route('admin.suspend.user', ['user' => $user->id]) }}" class="btn btn-danger">Suspend User</a> </span>
                                    @else
                                        <span class="badge rounded-pill p-2 bg-danger capitalize">Deactivated</span>
                                        <span><a href="{{ route('admin.activate.user', ['user' => $user->id]) }}" class="btn btn-success">Activate Users</a> </span>
                                    @endif
                                </div>
                                <div class="list-icon-function">
                                    <a href="{{ route('admin.vendor.show', ['user' => $user->id]) }}" class="item eye">
                                        <i class="icon-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.vendor.edit', ['user' => $user->id]) }}" class="item edit">
                                        <i class="icon-edit-3"></i>
                                    </a>
                                    <form method="POST" action="{{ route('admin.vendor.destroy', ['user' => $user->id]) }}">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="item">
                                            <i class="icon-trash-2"></i>
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10">
                <div class="text-tiny">Showing 10 entries</div>
                <ul class="wg-pagination">
                    <li>
                        <a href="#"><i class="icon-chevron-left"></i></a>
                    </li>
                    <li>
                        <a href="#">1</a>
                    </li>
                    <li class="active">
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-chevron-right"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /all-user -->
    </div>
    <!-- /main-content-wrap -->
@endsection
