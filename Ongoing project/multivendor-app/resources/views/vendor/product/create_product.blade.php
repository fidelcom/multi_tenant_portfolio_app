@extends('layouts.vendor')

@section('vendor')
    <!-- main-content-wrap -->
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Add Product</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="index.html"><div class="text-tiny">Dashboard</div></a>
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
                    <div class="text-tiny">Add product</div>
                </li>
            </ul>
        </div>
        <!-- form-add-product -->
        <form class="tf-section-2 form-add-product" method="POST" action="{{ route('vendor.product.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="wg-box">
                <fieldset class="name">
                    <div class="body-title mb-10">Product name <span class="tf-color-1">*</span></div>
                    <input class="mb-10" type="text" placeholder="Enter product name" name="name" tabindex="0" value="" aria-required="true" required="">
                    <div class="text-tiny">Do not exceed 20 characters when entering the product name.</div>
                </fieldset>
                <fieldset class="name">
                    <div class="body-title mb-10">Product Price <span class="tf-color-1">*</span></div>
                    <div class="">
                        <input type="number" name="price" min="1" placeholder="Product Price" required>
                    </div>
                </fieldset>
                <fieldset class="name">
                    <div class="body-title mb-10">Product Discount Price</div>
                    <div class="">
                        <input type="number" name="discount" min="1" placeholder="Discount Price">
                    </div>
                </fieldset>
                <fieldset class="name">
                    <div class="body-title mb-10">Product Quantity</div>
                    <div class="">
                        <input type="number" name="qty" min="1" placeholder="Product Quantity" required >
                    </div>
                </fieldset>
                <div class="gap22 cols">
                    <fieldset class="category">
                        <div class="body-title mb-10">Category <span class="tf-color-1">*</span></div>
                        <div class="select">
                            <select class="" id="category" name="product_category_id">
                                <option>Choose category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </fieldset>
                    <fieldset class="male">
                        <div class="body-title mb-10">Brand <span class="tf-color-1">*</span></div>
                        <div class="select">
                            <select class="" name="brand_id">
                                <option>Choose Brand</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </fieldset>
                </div>
                <fieldset class="brand">
                    <div class="body-title mb-10">Product Subcategory <span class="tf-color-1">*</span></div>
                    <div class="select">
                        <select class="" id="subcategory" name="product_subcategory_id" required>
                            <option>Choose subcategory</option>
{{--                            @foreach($subcategories as $subcategory)--}}
{{--                                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>--}}
{{--                            @endforeach--}}
                        </select>
                    </div>
                </fieldset>
                <fieldset class="description">
                    <div class="body-title mb-10">Short Description <span class="tf-color-1">*</span></div>
                    <textarea class="mb-10" name="short_desc" placeholder="Short Description" tabindex="0" aria-required="true" required=""></textarea>
                    <div class="text-tiny">Do not exceed 100 characters when entering the product name.</div>
                </fieldset>
                <fieldset class="description">
                    <div class="body-title mb-10">Long Description <span class="tf-color-1">*</span></div>
                    <textarea class="mb-10" name="long_desc" placeholder="Long Description" tabindex="0" aria-required="true" required=""></textarea>
                    <div class="text-tiny">Do not exceed 100 characters when entering the product name.</div>
                </fieldset>
                <fieldset class="description">
                    <div class="body-title mb-10">Specification <span class="tf-color-1">*</span></div>
                    <textarea class="mb-10" name="specification" placeholder="Specification" tabindex="0" aria-required="true" required=""></textarea>
                    <div class="text-tiny">Do not exceed 100 characters when entering the product name.</div>
                </fieldset>
            </div>
            <div class="wg-box">
                <fieldset>
                    <div class="body-title mb-10">Upload image</div>
                    <div class="upload-image mb-16">
                        <div class="item">
                            <img src="images/upload/upload-1.png" alt="">
                        </div>
                        <div class="item">
                            <img src="images/upload/upload-2.png" alt="">
                        </div>
                        <div class="item up-load">
                            <label class="uploadfile" for="myFile">
                                                        <span class="icon">
                                                            <i class="icon-upload-cloud"></i>
                                                        </span>
                                <span class="text-tiny">Drop your images here or select <span class="tf-color">click to browse</span></span>
                                <input type="file" id="myFile" name="product_thumbnail">
                            </label>
                        </div>
                    </div>
                    <div class="body-text">You need to add at main product image. Pay attention to the quality of the pictures you add, comply with the background color standards. Pictures must be in certain dimensions. Notice that the product shows all the details</div>
                </fieldset>
                <fieldset>
                    <div class="body-title mb-10">Upload other images</div>
                    <div class="upload-image mb-16">
                        <div class="item">
                            <img src="images/upload/upload-1.png" alt="">
                        </div>
                        <div class="item">
                            <img src="images/upload/upload-2.png" alt="">
                        </div>
                        <div class="item up-load">
                            <label class="uploadfile" for="myFiles">
                                                        <span class="icon">
                                                            <i class="icon-upload-cloud"></i>
                                                        </span>
                                <span class="text-tiny">Drop your images here or select <span class="tf-color">click to browse</span></span>
                                <input type="file" id="myFiles" name="multiImage[]" multiple>
                            </label>
                        </div>
                    </div>
                    <div class="body-text">You need to add at least 4 other product images. Pay attention to the quality of the pictures you add, comply with the background color standards. Pictures must be in certain dimensions. Notice that the product shows all the details</div>
                </fieldset>
{{--                <div class="cols gap22">--}}
                    <fieldset class="name">
                        <div class="body-title mb-10">Add size</div>
                        <div class="mb-10">
                            <div class="flex items-center w-full">
                                <input type="text" id="size" name="size" class="w-full px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-blue-500" placeholder="Enter size...">
                                <div id="tags"></div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="name">
                        <div class="body-title mb-10">Add color</div>
                        <div class="mb-10">
                            <div class="flex items-center w-full">
                                <input type="text" id="color" name="color" class="w-full px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-blue-500" placeholder="Enter colors...">
                                <div id="color_tags"></div>
                            </div>
                        </div>
                    </fieldset>

                <fieldset class="name">
                    <div class="body-title mb-10">Add Tags</div>
                    <div class="mb-10">
                        <div class="flex items-center w-full">
                            <input type="text" id="tags" name="tags" class="w-full px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-blue-500" placeholder="Enter tags...">
                            <div id="tag_tags"></div>
                        </div>
                    </div>
                </fieldset>
                <div class="cols gap22">
                    <fieldset class="name">
                        <div class="body-title mb-10">Best Seller</div>
                        <div class="">
                            <input type="checkbox" name="best_seller" placeholder="GF423G" value="1">
                        </div>
                    </fieldset>
                    <fieldset class="name">
                        <div class="body-title mb-10">Featured product</div>
                        <div class="">
                            <input type="checkbox" name="featured" placeholder="GF423G" value="1">
                        </div>
                    </fieldset>
                    <fieldset class="name">
                        <div class="body-title mb-10">Top product</div>
                        <div class="">
                            <input type="checkbox" name="top_product" value="1">
                        </div>
                    </fieldset>
                </div>
                <div class="cols gap22">
                    <fieldset class="name">
                        <div class="body-title mb-10">Best Offer</div>
                        <div class="">
                            <input type="checkbox" name="best_offer" value="1">
                        </div>
                    </fieldset>
                    <fieldset class="name">
                        <div class="body-title mb-10">Special Offer</div>
                        <div class="">
                            <input type="checkbox" name="special_offer" value="1">
                        </div>
                    </fieldset>
                    <fieldset class="name">
                        <div class="body-title mb-10">New product</div>
                        <div class="">
                            <input type="checkbox" name="new_product" value="1">
                        </div>
                    </fieldset>
                </div>
                <fieldset class="name">
                    <div class="body-title mb-10">Product Code</div>
                    <div class="">
                        <input type="text" name="product_code" placeholder="GF423G">
                    </div>
                </fieldset>
                <fieldset class="name">
                    <div class="body-title mb-10">Product video url</div>
                    <div class="">
                        <input type="url" name="video_url" placeholder="Product video url">
                    </div>
                </fieldset>
                <fieldset class="name">
                    <div class="body-title mb-10">Product Weight</div>
                    <div class="">
                        <input type="number" name="weight" placeholder="Weight">
                    </div>
                </fieldset>
{{--                </div>--}}
                <div class="cols gap10">
                    <button class="tf-button w-full" type="submit">Add product</button>
{{--                    <button class="tf-button style-1 w-full" type="submit">Save product</button>--}}
{{--                    <a href="#" class="tf-button style-2 w-full">Schedule</a>--}}
                </div>
            </div>
        </form>
        <!-- /form-add-product -->
    </div>
    <!-- /main-content-wrap -->
    <!-- /main-content-wrap -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var categorySelect = document.getElementById('category');
            var subcategorySelect = document.getElementById('subcategory');

            categorySelect.addEventListener('change', function () {
                var categoryId = this.value;
                console.log(categoryId)

                if (categoryId) {
                    fetch(`/product/subcategories/get-subcategories/${categoryId}`)
                        .then(response => response.json())
                        .then(data => {
                            subcategorySelect.innerHTML = '<option value="">Choose subcategory</option>';
                            data.forEach(subcategory => {
                                subcategorySelect.innerHTML += `<option value="${subcategory.id}">${subcategory.name}</option>`;
                            });
                        })
                        .catch(error => {
                            console.error('Error fetching subcategories:', error);
                        });
                } else {
                    subcategorySelect.innerHTML = '<option value="">Choose subcategory</option>';
                }
            });
        });
    </script>
{{--    <script>--}}
{{--        document.addEventListener('DOMContentLoaded', function () {--}}
{{--            const categories = @json($categories);--}}
{{--            const subcategories = @json($subcategories);--}}

{{--            const categorySelect = document.getElementById('category');--}}
{{--            const subcategorySelect = document.getElementById('subcategory');--}}

{{--            categorySelect.addEventListener('change', function () {--}}
{{--                const selectedCategoryId = this.value;--}}

{{--                // Clear subcategory options--}}
{{--                subcategorySelect.innerHTML = '<option value="">Select Subcategory</option>';--}}

{{--                // Filter subcategories based on the selected category--}}
{{--                const filteredSubcategories = subcategories.filter(subcategory => subcategory.category_id === selectedCategoryId);--}}

{{--                // Populate subcategory dropdown--}}
{{--                filteredSubcategories.forEach(subcategory => {--}}
{{--                    const option = document.createElement('option');--}}
{{--                    option.value = subcategory.id;--}}
{{--                    option.textContent = subcategory.name;--}}
{{--                    subcategorySelect.appendChild(option);--}}
{{--                });--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
    <!-- /main-content-wrap -->
    <script>
        const input = document.getElementById('size');
        const tagsElement = document.getElementById('tags');

        // Function to add a tag
        function addTag(text) {
            const tag = document.createElement('span');
            tag.classList.add('px-2', 'py-1', 'rounded-full', 'bg-blue-100', 'text-blue-600', 'font-bold', 'mr-2');
            tag.innerText = text;
            const closeIcon = document.createElement('span');
            closeIcon.classList.add('ml-1', 'cursor-pointer', 'hover:text-red-500');
            closeIcon.innerText = 'x';
            closeIcon.addEventListener('click', () => tagsElement.removeChild(tag));
            tag.appendChild(closeIcon);
            tagsElement.appendChild(tag);
            input.value = ''; // Clear input field after adding a tag
        }

        // Add event listener to input field for adding tags on comma or Enter
        input.addEventListener('keydown', (event) => {
            if (event.key === ',' || event.key === 'Enter') {
                const text = input.value.trim();
                if (text) {
                    addTag(text);
                }
            }
        });
    </script>
    <script>
        const initialTags = ['EU - 44', 'EU - 40', 'EU - 50'];

        initialTags.forEach(tag => addTag(tag));

        // Rest of the code...
    </script>

{{--    //colors--}}
    <script>
        const color_input = document.getElementById('color');
        const color_tagsElement = document.getElementById('color_tags');

        // Function to add a tag
        function addColorTag(text) {
            const color_tag = document.createElement('span');
            color_tag.classList.add('px-2', 'py-1', 'rounded-full', 'bg-blue-100', 'text-blue-600', 'font-bold', 'mr-2');
            color_tag.innerText = text;
            const closeIcon = document.createElement('span');
            closeIcon.classList.add('ml-1', 'cursor-pointer', 'hover:text-red-500');
            closeIcon.innerText = 'x';
            closeIcon.addEventListener('click', () => color_tagsElement.removeChild(color_tag));
            color_tag.appendChild(closeIcon);
            color_tagsElement.appendChild(color_tag);
            color_input.value = ''; // Clear input field after adding a tag
        }

        // Add event listener to input field for adding tags on comma or Enter
        color_input.addEventListener('keydown', (event) => {
            if (event.key === ',' || event.key === 'Enter') {
                const text = color_input.value.trim();
                if (text) {
                    addColorTag(text);
                }
            }
        });
    </script>
    <script>
        const initialColorTags = ['White', 'Red', 'Blue', 'Green'];

        initialColorTags.forEach(tags => addColorTag(tags));

        // Rest of the code...
    </script>
    {{--    //tags--}}
    <script>
        const tag_input = document.getElementById('tags');
        const tag_tagsElement = document.getElementById('tag_tags');

        // Function to add a tag
        function addTagTag(text) {
            const tag_tag = document.createElement('span');
            tag_tag.classList.add('px-2', 'py-1', 'rounded-full', 'bg-blue-100', 'text-blue-600', 'font-bold', 'mr-2');
            tag_tag.innerText = text;
            const closeIcon = document.createElement('span');
            closeIcon.classList.add('ml-1', 'cursor-pointer', 'hover:text-red-500');
            closeIcon.innerText = 'x';
            closeIcon.addEventListener('click', () => color_tagsElement.removeChild(tag_tag));
            tag_tag.appendChild(closeIcon);
            tag_tagsElement.appendChild(tag_tag);
            tag_input.value = ''; // Clear input field after adding a tag
        }

        // Add event listener to input field for adding tags on comma or Enter
        tag_input.addEventListener('keydown', (event) => {
            if (event.key === ',' || event.key === 'Enter') {
                const text = tag_input.value.trim();
                if (text) {
                    addTagTag(text);
                }
            }
        });
    </script>
    <script>
        const initialTagTags = ['New', 'Popular', 'High demand', 'tags'];

        initialTagTags.forEach(tags => addTagTag(tags));

        // Rest of the code...
    </script>
@endsection

@push('scripts')
@endpush
