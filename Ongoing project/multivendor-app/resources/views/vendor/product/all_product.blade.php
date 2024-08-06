@extends('layouts.vendor')

@section('vendor')
    <!-- main-content-wrap -->
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Product List</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="{{ route('dashboard') }}"><div class="text-tiny">Dashboard</div></a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <a href="#"><div class="text-tiny">Ecommerce</div></a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Product List</div>
                </li>
            </ul>
        </div>
        <!-- product-list -->
        <div class="wg-box">
            <div class="title-box">
                <i class="icon-coffee"></i>
                <div class="body-text">Tip search by Product ID: Each product is provided with a unique ID, which you can rely on to find the exact product you need.</div>
            </div>
            <div class="flex items-center justify-between gap10 flex-wrap">
                <div class="wg-filter flex-grow">
                    <div class="show">
                        <div class="text-tiny">Showing</div>
                        <div class="select">
                            <select class="">
                                <option>10</option>
                                <option>20</option>
                                <option>30</option>
                            </select>
                        </div>
                        <div class="text-tiny">entries</div>
                    </div>
                    <form class="form-search">
                        <fieldset class="name">
                            <input type="text" placeholder="Search here..." class="" name="name" tabindex="2" value="" aria-required="true" required="">
                        </fieldset>
                        <div class="button-submit">
                            <button class="" type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
                <a class="tf-button style-1 w208" href="{{ route('vendor.product.create') }}"><i class="icon-plus"></i>Add new</a>
            </div>
            <div class="wg-table table-product-list">
                <ul class="table-title flex gap20 mb-14">
                    <li>
                        <div class="body-title">Product</div>
                    </li>
                    <li>
                        <div class="body-title">Product ID</div>
                    </li>
                    <li>
                        <div class="body-title">Price</div>
                    </li>
                    <li>
                        <div class="body-title">Discount (%)</div>
                    </li>
                    <li>
                        <div class="body-title">Quantity</div>
                    </li>
                    <li>
                        <div class="body-title">Sale</div>
                    </li>
                    <li>
                        <div class="body-title">Stock</div>
                    </li>
                    <li>
                        <div class="body-title">Total Sale</div>
                    </li>
                    <li>
                        <div class="body-title">Action</div>
                    </li>
                </ul>
                <ul class="flex flex-column">
                    @foreach($products as $item)
                        <li class="product-item gap14">
                            <div class="image no-bg">
                                <img src="{{ asset($item->product_thumbnail) }}" alt="">
                            </div>
                            <div class="flex items-center justify-between gap20 flex-grow">
                                <div class="name">
                                    <a href="product-list.html" class="body-title-2">{{ $item->name }}</a>
                                </div>
                                <div class="body-text">#{{ $item->product_code }}</div>
                                <div class="body-text">${{ number_format($item->price, 2) }}</div>
                                <div class="body-text">{{ number_format((($item->price - $item->discount) / $item->price) * 100, 2) }}%</div>
                                <div class="body-text">{{ $item->qty }}</div>
                                <div class="body-text">{{ array_sum($item->order_item ? $item->order_item->qty : [0,0,0]) }}</div>
                                <div>
                                    <div class="block-not-available">{{ $item->qty == 0 ? 'Out of stock' : 'In stuck' }}</div>
                                </div>
                                <div class="body-text">${{ array_sum($item->order_item ? $item->order_item->amount : [0,0,0]) }}</div>
                                <form method="POST" action="{{ route('vendor.product.destroy', ['product' => $item->id]) }}">
                                    @csrf @method('DELETE')
                                <div class="list-icon-function">
                                    <div class="item eye">
                                        <a href="{{ route('vendor.product.show', ['product' => $item->id]) }}" class="text-primary"><i class="icon-eye"></i></a>
                                    </div>
                                    <div class="item edit">
                                        <a href="{{ route('vendor.product.edit', ['product' => $item->id]) }}" class="text-success"><i class="icon-edit-3"></i></a>
                                    </div>
                                    <div class="item">
                                        <button type="submit" class="text-danger"><i class="icon-trash-2"></i></button>
                                    </div>
                                </div>
                                </form>
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
        <!-- /product-list -->
    </div>
    <!-- /main-content-wrap -->
@endsection
