@extends('layouts.admin')

@section('admin')
    <div class="main-content-wrap">
        <div class="col-12 mb-20">
            <div class="wg-box h-full">
                <h3>Brands</h3>
                <div class="row">
                    @foreach($brand as $item)
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
                                        <form action="{{ route('brand.destroy', ['brand' => $item->id]) }}" method="POST" enctype="multipart/form-data">
                                            @csrf @method('DELETE')
                                            <a href="{{ route('brand.edit', ['brand' => $item->id]) }}" class="text-success" title="Edit"><i class="icon-edit-3"></i></a>
                                            <button type="submit" class="text-danger" title="Delete"><i class="icon-trash-2"></i></button>
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
