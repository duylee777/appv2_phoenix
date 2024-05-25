@extends('admin.layouts.index')
@section('title', 'Sản phẩm')
@section('content')

<nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                </svg>
            </a>
        </li>
        <li class="inline-flex items-center">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a href="{{ route('product.index') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2">Sản phẩm</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Thêm mới sản phẩm</span>
            </div>
        </li>
    </ol>
</nav>

@if($errors->any())
<ul>
    @foreach( $errors->all() as $error)
    <li>
        <span class="text-red-300">{{$error}}</span>
    </li>
    @endforeach
</ul>
@endif

<section class="bg-gray-50 py-4 sm:py-5 mt-5">
    <div class="px-4 mx-auto max-w-screen-2xl">
        <a href="{{ route('product.index') }}" class="mb-4 inline-flex items-center gap-1 px-4 py-2 bg-white shadow rounded hover:bg-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="8" viewBox="0 0 256 512">
                <path d="M31.7 239l136-136c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9L127.9 256l96.4 96.4c9.4 9.4 9.4 24.6 0 33.9L201.7 409c-9.4 9.4-24.6 9.4-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34z"/>
            </svg>
            <!-- Quay lại -->
        </a>
        <div class="flex items-center justify-between flex-1 mb-4">
            <h2 class="text-blue-600 text-2xl font-semibold">Thêm sản phẩm mới</h2>

            <div class="flex items-center gap-2">
                <a href="{{route('product.create')}}" class="block p-2 shadow-lg rounded-lg bg-white text-red-300 border border-red-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="20" width="20" fill="currentColor">
                        <path d="M142.9 142.9c62.2-62.2 162.7-62.5 225.3-1L327 183c-6.9 6.9-8.9 17.2-5.2 26.2s12.5 14.8 22.2 14.8H463.5c0 0 0 0 0 0H472c13.3 0 24-10.7 24-24V72c0-9.7-5.8-18.5-14.8-22.2s-19.3-1.7-26.2 5.2L413.4 96.6c-87.6-86.5-228.7-86.2-315.8 1C73.2 122 55.6 150.7 44.8 181.4c-5.9 16.7 2.9 34.9 19.5 40.8s34.9-2.9 40.8-19.5c7.7-21.8 20.2-42.3 37.8-59.8zM16 312v7.6 .7V440c0 9.7 5.8 18.5 14.8 22.2s19.3 1.7 26.2-5.2l41.6-41.6c87.6 86.5 228.7 86.2 315.8-1c24.4-24.4 42.1-53.1 52.9-83.7c5.9-16.7-2.9-34.9-19.5-40.8s-34.9 2.9-40.8 19.5c-7.7 21.8-20.2 42.3-37.8 59.8c-62.2 62.2-162.7 62.5-225.3 1L185 329c6.9-6.9 8.9-17.2 5.2-26.2s-12.5-14.8-22.2-14.8H48.4h-.7H40c-13.3 0-24 10.7-24 24z"/>
                    </svg>
                </a>
                <a href="" class="block p-2 shadow-lg rounded-lg bg-white text-blue-600 border border-blue-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="20" width="20" fill="currentColor">
                        <path d="M128 64c0-35.3 28.7-64 64-64H352V128c0 17.7 14.3 32 32 32H512V448c0 35.3-28.7 64-64 64H192c-35.3 0-64-28.7-64-64V336H302.1l-39 39c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l80-80c9.4-9.4 9.4-24.6 0-33.9l-80-80c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l39 39H128V64zm0 224v48H24c-13.3 0-24-10.7-24-24s10.7-24 24-24H128zM512 128H384V0L512 128z"/>
                    </svg>
                </a>
            </div>
        </div>
        <form id="new-product-form" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <section class="grid gap-4 grid-cols-1 lg:grid-cols-2">
                <div class="p-4 mb-4 grid gap-4 grid-cols-1 lg:grid-cols-2 bg-white shadow-md sm:rounded-lg">
                    <div class="col-span-2">
                        <label for="code" class="block mb-2 text-sm font-medium text-gray-900">Mã sản phẩm</label>
                        <input type="text" id="code" name="code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Nhập mã sản phẩm ..." required="">
                    </div>
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Tên sản phẩm</label>
                        <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Nhập tên sản phẩm ..." required="">
                    </div>
                    <div class="col-span-2">
                        <label class="block mb-2 text-sm font-semibold text-gray-900">Danh mục</label>
                        <select id="category_id" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" class="font-medium">{{$category->name}}
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="brand_id" class="block mb-2 text-sm font-medium text-gray-900">Thương hiệu</label>
                        <select id="brand_id" name="brand_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            @foreach($brands as $brand)
                            <option value="{{$brand->id}}" class="font-medium">{{ $brand->name }}
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="origin" class="block mb-2 text-sm font-medium text-gray-900">Xuất xứ</label>
                        <input type="text" id="origin" name="origin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Nhập xuất xứ ..." required="">
                    </div>
                </div>
                <div class="">
                    <div class="p-4 mb-4 grid gap-4 grid-cols-1 lg:grid-cols-2 bg-white shadow-md sm:rounded-lg">
                        <div class="">
                            <div class="flex items-center">
                                <input id="is_active"  name="is_active" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                <label for="is_active" class="ms-2 text-sm font-semibold text-gray-900">Kích hoạt sản phẩm</label>
                            </div>
                        </div>
                        <div class="">
                            <div class="flex items-center">
                                <input id="is_featured"  name="is_featured" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                <label for="is_featured" class="ms-2 text-sm font-semibold text-gray-900">Sản phẩm nổi bật</label>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 mb-4 grid gap-4 grid-cols-1 lg:grid-cols-2 bg-white shadow-md sm:rounded-lg">
                        <div class="">
                            <label for="code" class="block mb-2 text-sm font-medium text-gray-900">Đơn vị sản phẩm</label>
                            <select id="unit_id" name="unit_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @foreach($units as $unit)
                                <option value="{{$unit->id}}" class="font-medium">{{ $unit->name }}
                                @endforeach
                            </select>
                        </div>
                        <div class="">
                            <label for="cost_price" class="block mb-2 text-sm font-medium text-gray-900">Giá gốc(VNĐ)</label>
                            <input type="number" step="0.1" min="0" id="cost_price" name="cost_price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Nhập giá gốc ..." required="">
                        </div>
                    </div>
                    <div class="p-4 mb-4 grid gap-4 grid-cols-1 lg:grid-cols-2 bg-white shadow-md sm:rounded-lg">
                        <div class="">
                            <label for="discount_id" class="block mb-2 text-sm font-medium text-gray-900">Chiết khấu(%)</label>
                            <select id="discount_id" name="discount_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @foreach($discounts as $discount)
                                <option value="{{$discount->id}}" class="font-medium">
                                    {{ $discount->name }} - {{ $discount->discount_percent }}(%)
                                @endforeach
                            </select>
                        </div>
                        <div class="">
                            <label for="odd_price" class="block mb-2 text-sm font-medium text-gray-900">Giá bán(VNĐ)</label>
                            <input type="number" step="0.1" min="0" id="odd_price" name="odd_price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Nhập giá bán ..." required="">
                        </div>
                    </div>
                    <div class="p-4 mb-4 grid gap-4 grid-cols-1 lg:grid-cols-2 bg-white shadow-md sm:rounded-lg">
                        <div class="col-span-2">
                            <label for="inventory_count" class="block mb-2 text-sm font-medium text-gray-900">Số lượng sản phẩm trong kho</label>
                            <input type="number" step="1" min="0" id="inventory_count" name="inventory_count" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Nhập số lượng ..." required="">
                        </div>
                    </div>
                </div>
            </section>
            <div class="p-4 mb-4 grid gap-4 grid-cols-1 lg:grid-cols-2 bg-white shadow-md sm:rounded-lg">
                <div class="col-span-2">
                    <label for="" class="block mb-2 font-semibold text-gray-900">Ảnh bìa khi kích hoạt sản phẩm nổi bật</label>
                    <div class="p-4 flex flex-col lg:flex-row items-center gap-4 bg-white border border-gray-200 rounded-lg shadow">
                        <div class="w-24 h-24 overflow-hidden flex items-center justify-center rounded-md shadow">
                            <img id="thumbnails_image" class="w-full" src="https://images.pexels.com/photos/698275/pexels-photo-698275.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Extra large image">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label class="block text-sm font-medium text-gray-900" for="file_thumbnails">Tải tập tin lên</label>
                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" aria-describedby="file_thumbnails_help" name="thumb" id="file_thumbnails" type="file" onchange="document.getElementById('thumbnails_image').src = window.URL.createObjectURL(this.files[0]);">
                            <p class="text-sm text-gray-500" id="file_thumbnails_help">.svg, .png, .jpg/jpeg, .webp or .gif (900x900px).</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-4 mb-4 grid gap-4 grid-cols-1 lg:grid-cols-2 bg-white shadow-md sm:rounded-lg">
                <div class="sm:col-span-2">
                    <label for="images" class="block mb-2 font-semibold text-gray-900">Ảnh sản phẩm</label>
                    <ul id="list-product-image" class="flex flex-wrap gap-4"></ul>
                    <div class="flex flex-col gap-2 mt-4">
                        <label class="block text-sm font-medium text-gray-900" for="file_input">Tải tập tin lên</label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" aria-describedby="file_input_help" name="" id="file_input" type="file" multiple>
                        <p class="text-sm text-gray-500" id="file_input_help">.svg, .png, .jpg/jpeg, .webp or .gif (900x900px).</p>
                    </div>
                </div>
            </div>
            <section class="grid gap-4 grid-cols-1 lg:grid-cols-2">
                <div class="p-4 mb-4 grid gap-4 grid-cols-1 lg:grid-cols-2 bg-white shadow-md sm:rounded-lg">
                    <div class="col-span-2">
                        <label for="specification" class="block mb-2 text-sm font-semibold text-gray-900">Thông số kỹ thuật</label>
                        <textarea id="specification" name="specification" rows="15" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Viết thông số kỹ thuật sản phẩm tại đây..."></textarea>
                        
                    </div>
                </div>
                <div class="">
                    <div class="p-4 mb-4 grid gap-4 grid-cols-1 lg:grid-cols-2 bg-white shadow-md sm:rounded-lg">
                        <div class="col-span-2">
                            <label for="document" class="block mb-2 text-sm font-semibold text-gray-900">Tài liệu</label>
                            <ul id="list-document" class="py-2 flex flex-col gap-2"></ul>
                            <span class="block text-sm text-gray-500 pb-2">Tải lên tài liệu (tệp .pdf, .docx)</span>
                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" aria-describedby="document_file_input_help" name="" id="document_file_input" type="file" multiple>
                            {{-- <p class="text-sm text-gray-500" id="document_file_input_help">.pdf, .docx</p> --}}
                        </div>
                    </div>
                    <div class="p-4 mb-4 grid gap-4 grid-cols-1 lg:grid-cols-2 bg-white shadow-md sm:rounded-lg">
                        <div class="col-span-2">
                            <label for="software" class="block mb-2 text-sm font-semibold text-gray-900">Phần mềm</label>
                            <ul id="list-software" class="py-2 flex flex-col gap-2"></ul>
                            <span class="block text-sm text-gray-500 pb-2">Tải lên phần mềm (tệp .zip, .rar) nếu dung lượng nhỏ hơn 200MB</span>
                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" aria-describedby="software_file_input_help" name="" id="software_file_input" type="file" multiple>
                            {{-- <span class="block text-sm text-gray-500 pt-4 pb-2">Dán đường dẫn Google Driver tại đây</span>
                            <input type="text" name="software_url" placeholder="Dán đường dẫn tại đây ..." class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"> --}}
                        </div>
                    </div>
                    <div class="p-4 mb-4 grid gap-4 grid-cols-1 lg:grid-cols-2 bg-white shadow-md sm:rounded-lg">
                        <div class="col-span-2">
                            <label for="driver" class="block mb-2 text-sm font-semibold text-gray-900">Driver</label>
                            <ul id="list-driver" class="py-2 flex flex-col gap-2"></ul>
                            <span class="block text-sm text-gray-500 pb-2">Tải lên driver (tệp .zip, .rar) nếu dung lượng nhỏ hơn 200MB</span>
                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" aria-describedby="driver_file_input_help" name="" id="driver_file_input" type="file" multiple>
                            {{-- <span class="block text-sm text-gray-500 pt-4 pb-2">Dán đường dẫn Google Driver tại đây</span>
                            <input type="text" name="driver_url" placeholder="Dán đường dẫn tại đây ..." class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"> --}}
                        </div>
                    </div>
                </div>
            </section>
            <div class="p-4 mb-4 grid gap-4 grid-cols-1 lg:grid-cols-2 bg-white shadow-md sm:rounded-lg">
                <div class="col-span-2">
                    <label for="description" class="block mb-2 text-sm font-semibold text-gray-900">Mô tả sản phẩm</label>
                    <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Viết mô tả sản phẩm tại đây..."></textarea>
                    <script>
                        // Replace the <textarea id="editor1"> with a CKEditor 4
                        // instance, using default configuration.
                        CKEDITOR.replace( 'description' );
                    </script>
                </div>
            </div>

            <div class="flex items-center flex-wrap gap-4">
                <button type="submit" class="text-white inline-flex items-center bg-green-500 hover:bg-green-700 border-2 border-green-500 hover:border-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <svg class="me-1 -ms-1 w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor">
                        <path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V128zM224 288a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/>
                    </svg>
                    Tạo mới
                </button>
                <a href="{{ route('product.index') }}" type="button" class="btn_cancel text-black inline-flex items-center border-2 bg-white rounded-lg text-sm px-5 py-2.5 text-center">
                    Hủy bỏ
                </a>
            </div>
        </form>
    </div>
</section>

<script>
    $( function() {
        $( "#list-product-image" ).sortable();
        $( "#list-product-image" ).disableSelection();

        $( "#list-document" ).sortable();
        $( "#list-document" ).disableSelection();

        $( "#list-software" ).sortable();
        $( "#list-software" ).disableSelection();

        $( "#list-driver" ).sortable();
        $( "#list-driver" ).disableSelection();
        
    } );

    let fileUpload = document.querySelector("#file_input");
    let listProductImage = document.querySelector('#list-product-image');

    let fileDocumentUpload = document.querySelector('#document_file_input');
    let listDocument = document.querySelector('#list-document');

    let fileSoftwareUpload = document.querySelector('#software_file_input');
    let listSoftware = document.querySelector('#list-software');

    let fileDriverUpload = document.querySelector('#driver_file_input');
    let listDriver = document.querySelector('#list-driver');

    function createElementForFile(fileUpload, listFile, requestName) {
        let files = fileUpload.target.files;

        for(let i = 0; i < files.length; i++) {
            let wrap = document.createElement('li');
            wrap.className = 'p-2 flex items-center justify-between italic text-sm text-gray-500 shadow rounded-lg';

            let fileName = document.createElement('span');
            fileName.innerText = files[i].name;
            wrap.appendChild(fileName);

            let deleteFileBtn = document.createElement('button');
            deleteFileBtn.type = 'button';
            deleteFileBtn.className = 'text-red-500';
            deleteFileBtn.innerHTML ='<svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/></svg>';
            wrap.appendChild(deleteFileBtn);

            deleteFileBtn.addEventListener("click", function() {
                listFile.removeChild(wrap);
            });

            let input = document.createElement('input');
            input.type = 'file';
            input.className = 'list_'+requestName;
            input.name = requestName+'[]';
            input.hidden = true;
            wrap.appendChild(input);

            var fileInput = new DataTransfer();
            fileInput.items.add(files[i]);
            input.files = fileInput.files;

            listFile.appendChild(wrap);
        }
    }

    fileDocumentUpload.addEventListener("change", (e) => {
        e.preventDefault();
        let data = document.querySelectorAll('#list-document li');
        if(data.length > 0) {
            for(let i = 0; i < data.length; i++) {
                listDocument.removeChild(data[i]);
            }
        }

        createElementForFile(e, listDocument, 'document');
    });

    fileSoftwareUpload.addEventListener("change", (e) => {
        e.preventDefault();
        let data = document.querySelectorAll('#list-software li');
        if(data.length > 0) {
            for(let i = 0; i < data.length; i++) {
                listSoftware.removeChild(data[i]);
            }
        }

        createElementForFile(e, listSoftware, 'software');
    });

    fileDriverUpload.addEventListener("change", (e) => {
        e.preventDefault();
        let data = document.querySelectorAll('#list-driver li');
        if(data.length > 0) {
            for(let i = 0; i < data.length; i++) {
                listDriver.removeChild(data[i]);
            }
        }

        createElementForFile(e, listDriver, 'driver');
    });

    fileUpload.addEventListener("change", (e) => {
        e.preventDefault();
        let data = document.querySelectorAll('#list-product-image li');
        if(data.length > 0) {
            for(let i = 0; i < data.length; i++) {
                listProductImage.removeChild(data[i]);
            }
        }
        
        var files = e.target.files;
        
        for(let i = 0; i < files.length; i++) {
            let imageWrap = document.createElement('li');
            imageWrap.className = 'relative overflow-hidden bg-white px-4 pt-8 pb-4 rounded shadow';

            let image = document.createElement('img');
            image.className = 'block w-60 h-60 rounded-lg';
            image.src = window.URL.createObjectURL(files[i]);
            imageWrap.appendChild(image);

            let imageName = document.createElement('span');
            imageName.className = 'block py-1';
            imageName.innerText = files[i].name;
            imageWrap.appendChild(imageName);

            let input = document.createElement('input');
            input.className = 'list_image';
            input.type = 'file';
            input.name = 'image[]';
            input.hidden = true;
            imageWrap.appendChild(input);

            var fileInput = new DataTransfer();
            fileInput.items.add(files[i]);
            input.files = fileInput.files;

            let deleteBtn = document.createElement('button');
            deleteBtn.type = 'button';
            deleteBtn.id = 'delete_image_'+i;
            deleteBtn.className = 'text-red-500 absolute top-2 right-2';
            deleteBtn.innerHTML ='<svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/></svg>';
            imageWrap.appendChild(deleteBtn);

            deleteBtn.addEventListener("click", function() {
                listProductImage.removeChild(imageWrap);
            });
            
            listProductImage.appendChild(imageWrap);
        }
    });
</script>


@endsection