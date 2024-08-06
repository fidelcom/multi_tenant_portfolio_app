@extends('layouts.admin')

@section('admin')
    <div class="main-content-wrap">
        <div class="col-12 mb-20">
            <div class="wg-box">
                <h3>Form text</h3>
                <div class="row">
                    <div class="col-12 mb-20">
                        <div>
                            <form class="" action="{{ route('slider.update', ['slider' => $slider->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf @method('put')
                                <fieldset class="name mb-24">
                                    <div class="body-title mb-10">Slider Title <span class="tf-color-1">*</span></div>
                                    <input class="" type="text" placeholder="Slider Title" name="title" tabindex="0" value="{{ $slider->title }}" aria-required="true" required="">
                                </fieldset>
                                <fieldset class="email mb-24">
                                    <div class="body-title mb-10">Slider URL</div>
                                    <input class="flex-grow" type="url" placeholder="Enter Slider link" name="url" tabindex="0" value="{{ $slider->url }}" aria-required="true" required="">
                                </fieldset>
                                <fieldset class="description mb-24">
                                    <div class="body-title mb-10">Slider Description <span class="tf-color-1">*</span></div>
                                    <textarea class="" name="desc" placeholder="Description" tabindex="0" aria-required="true" required="">
                                        {{ $slider->desc }}
                                    </textarea>
                                </fieldset>
                                <fieldset class="email mb-24">
                                    <div class="body-title mb-10">Slider Image</div>
                                    <input class="flex-grow" type="file" placeholder="Upload your image" name="image" tabindex="0" value="" aria-required="true" >
                                </fieldset>
                                <fieldset class="email mb-24">
                                    <div class="body-title mb-10"></div>
                                    <img src="{{ asset($slider->image) }}" class="img-fluid">
                                </fieldset>
                                <div class="bot">
                                    <button class="tf-button w208" type="submit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
