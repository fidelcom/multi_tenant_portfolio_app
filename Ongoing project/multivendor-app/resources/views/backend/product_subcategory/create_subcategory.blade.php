@extends('layouts.admin')

@section('admin')
    <div class="main-content-wrap">
        <div class="col-12 mb-20">
            <div class="wg-box">
                <h3>Form text</h3>
                <div class="row">
                    <div class="col-12 mb-20">
                        <div>
                            <form class="" action="{{ route('product.subcategories.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <fieldset class="name mb-24">
                                    <div class="body-title mb-10">Category <span class="tf-color-1">*</span></div>
                                    <select class="" name="product_category_id" tabindex="0" aria-required="true" required="">
                                        <option selected>--select product category--</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                                <fieldset class="name mb-24">
                                    <div class="body-title mb-10">Subcategory Name <span class="tf-color-1">*</span></div>
                                    <input class="" type="text" placeholder="Subcategory Name" name="name" tabindex="0" value="" aria-required="true" required="">
                                </fieldset>
{{--                                <fieldset class="email mb-24">--}}
{{--                                    <div class="body-title mb-10">Slider URL</div>--}}
{{--                                    <input class="flex-grow" type="url" placeholder="Enter Slider link" name="url" tabindex="0" value="" aria-required="true" required="">--}}
{{--                                </fieldset>--}}
                                <fieldset class="description mb-24">
                                    <div class="body-title mb-10">Subcategory Description <span class="tf-color-1">*</span></div>
                                    <textarea class="" name="desc" placeholder="Description" tabindex="0" aria-required="true" required=""></textarea>
                                </fieldset>
                                <fieldset class="email mb-24">
                                    <div class="body-title mb-10">Subcategory Image</div>
                                    <input class="flex-grow" type="file" placeholder="Upload your image" name="image" tabindex="0" value="" aria-required="true" required="">
                                </fieldset>
                                <div class="bot">
                                    <button class="tf-button w208" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
