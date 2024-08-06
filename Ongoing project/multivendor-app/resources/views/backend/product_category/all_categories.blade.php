@extends('layouts.admin')

@section('admin')
    <div class="main-content-wrap">
        <div class="col-12 mb-20">
            <div class="wg-box h-full">
                <h3>Product Categories</h3>
                <div class="row">
                    @foreach($categories as $item)
                        <div class="col-12 mb-20">
                            <div class="shop-item">
                                <div class="image">
                                    <img src="{{ asset($item->image) }}" alt="">
                                </div>
                                <div class="flex-grow flex items-center justify-between gap20">
                                    <div>
                                        <div class="text-tiny mt-4">{{ $item->name }}</div>
                                    </div>
                                    <div class="body-text">{{ $item->slug }}</div>
                                    <div class="body-text">{!! $item->desc !!}</div>
                                    <div class="body-text">
                                        <form action="{{ route('product.categories.destroy', ['category' => $item->id]) }}" method="POST" enctype="multipart/form-data">
                                            @csrf @method('DELETE')
                                            <a href="{{ route('product.categories.edit', ['category' => $item->id]) }}" class="btn btn-info" title="Edit"><i class="icon-pen-tool"></i></a>
                                            <button type="submit" class="btn btn-danger" title="Delete"><i class="icon-trash-2"></i></button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
