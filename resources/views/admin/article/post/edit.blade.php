@extends('admin.layouts.index')
 
@section('title', 'Sản phẩm')

@section('content')

@if(Session::has('error'))
<div id="msgbox" class="mt-12 absolute top-4 right-4 w-[300px] border bg-red-600 px-4 py-2 rounded-lg shadow-soft-lg flex items-center justify-between" >
    <span class="text-white ">{{ Session::get('error') }}</span>
    <button type="" onclick="closeBox();"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);"><path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path></svg></button>
</div>
@endif
@if(Session::has('msg'))
<div id="msgbox" class="mt-12 absolute top-4 right-4 w-[300px] border bg-green-300 px-4 py-2 rounded-lg shadow-soft-lg flex items-center justify-between" >
    <span class="text-white ">{{ Session::get('msg') }}</span>
    <button type="" onclick="closeBox();"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);"><path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path></svg></button>
</div>
@endif

<nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                </svg>
            </a>
        </li>
        <li>
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a href="{{ route('post.index') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Bài viết</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Cập nhật bài viết</span>
            </div>
        </li>
    </ol>
</nav>

@php
    if(Session::get('backLink') == "" && url()->current() != url()->previous()) {
        Session::put('backLink', url()->previous());
    }
    if(Session::get('backLink') != url()->current() && url()->current() != url()->previous()) {
        Session::put('backLink', url()->previous());
    }
@endphp

<section class="bg-gray-50 py-4 sm:py-5 mt-5">
    <div class="px-4 mx-auto max-w-screen-2xl">
        <a href="{{ Session::get('backLink') }}" class="mb-4 inline-flex items-center gap-1 px-4 py-2 bg-white shadow rounded hover:bg-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="8" viewBox="0 0 256 512">
                <path d="M31.7 239l136-136c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9L127.9 256l96.4 96.4c9.4 9.4 9.4 24.6 0 33.9L201.7 409c-9.4 9.4-24.6 9.4-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34z"/>
            </svg>
            <!-- Quay lại -->
        </a>
        <div class="flex items-center justify-between flex-1 mb-4">
            <h2 class="text-blue-600 text-2xl font-semibold">Cập nhật bài viết</h2>
            <div class="flex items-center gap-2">
                <a href="{{route('post.create')}}" class="block p-2 shadow-lg rounded-lg bg-white text-red-300 border border-red-300">
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
        <form  method="POST" action="{{ route('post.update', $post->id) }}" class="" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <section class="grid gap-4 grid-cols-1 lg:grid-cols-2">
                <div class="">
                    <div class="p-4 mb-4 grid gap-4 grid-cols-1 lg:grid-cols-2 bg-white shadow-md sm:rounded-lg">
                        <div class="sm:col-span-2">
                            <label for="title" class="block mb-2 font-semibold text-gray-900">Tiêu đề bài viết</label>
                            <input type="text" name="title" id="title" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Nhập tiêu đề ..." required="" value="{{$post->title}}">
                        </div>
                        <div class="sm:col-span-2">
                            <label for="slug" class="block mb-2 font-semibold text-gray-900">Slug</label>
                            <input type="text" name="slug" id="slug" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Nhập slug ..." required="" value="{{$post->slug}}">
                        </div>
                        <div class="sm:col-span-2">
                            <label for="description" class="block mb-2 font-semibold text-gray-900">Mô tả bài viết</label>
                            <textarea name="description" id="description" cols="" rows="3" class="w-full focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Nhập mô tả ...">{!! $post->description !!}</textarea>
                        </div>
                    </div>
                    <div class="p-4 mb-4 grid gap-4 grid-cols-1 lg:grid-cols-2 bg-white shadow-md sm:rounded-lg">
                        <div class="sm:col-span-2">
                            <label for="image" class="block mb-2 font-semibold text-gray-900">Ảnh bìa của bài viết</label>
                            <div id="list-post-image" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                <div class="overflow-hidden bg-white px-4 pt-8 pb-4 rounded shadow w-60">
                                    <img class="w-full rounded-lg" src="{{asset('../storage/posts/'.$post->id.'/'.$post->cover_image) }}" alt="Post cover image">
                                </div>
                            </div>
                            <div class="flex flex-col gap-2 mt-4">
                                <label class="block text-sm font-medium text-gray-900" for="file_input">Tải tập tin lên</label>
                                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" aria-describedby="file_input_help" name="image" id="file_input" type="file">
                                <p class="text-sm text-gray-500" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="">
                    <div class="p-4 mb-4 grid gap-4 grid-cols-1 lg:grid-cols-2 bg-white shadow-md sm:rounded-lg">
                        <div class="col-span-2">
                            <div class="flex items-center">
                                @if($post->is_visible)
                                    <input id="is_visible"  name="is_visible" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500" checked>
                                @else
                                    <input id="is_visible"  name="is_visible" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                @endif
                                <label for="is_visible" class="ms-2 text-sm font-semibold text-gray-900">Hiển thị bài viết</label>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 mb-4 grid gap-4 grid-cols-1 lg:grid-cols-2 bg-white shadow-md sm:rounded-lg">
                        <div class="col-span-2">
                            <label class="block mb-2 text-sm font-semibold text-gray-900">Danh mục</label>
                            <select id="category_id" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                               
                                @foreach($categories as $category)
                                    @if($post->category_id == $category->id)
                                        <option value="{{$category->id}}" class="font-medium" selected>{{$category->name}}
                                    @else
                                        <option value="{{$category->id}}" class="font-medium">{{$category->name}}
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="category_id" class="block mb-2 font-semibold text-gray-900">Thẻ</label>
                        <ul class="flex w-full gap-4 flex-wrap">
                            <?php
                                $listIdTag = [];
                                foreach($post->tags as $tag) {
                                    $listIdTag[] = $tag->id;
                                }
                            ?>
                            @if($tags != null)
                                @foreach($tags as $tag)
                                    @if(in_array($tag->id, $listIdTag))
                                        <li>
                                            <input type="checkbox" id="option_{{ $tag->id }}" name="options[]" value="{{ $tag->id }}" class="hidden peer" checked>
                                            <label for="option_{{ $tag->id }}" class="text-sm inline-flex items-center justify-between w-full px-4 py-2 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-green-300 hover:text-gray-600 peer-checked:text-gray-600 hover:bg-gray-50">                           
                                                <span>{{ $tag->name }}</span>
                                            </label>
                                        </li>
                                    @else
                                        <li>
                                            <input type="checkbox" id="option_{{ $tag->id }}" name="options[]" value="{{ $tag->id }}" class="hidden peer">
                                            <label for="option_{{ $tag->id }}" class="text-sm inline-flex items-center justify-between w-full px-4 py-2 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-green-300 hover:text-gray-600 peer-checked:text-gray-600 hover:bg-gray-50">                           
                                                <span>{{ $tag->name }}</span>
                                            </label>
                                        </li>
                                    @endif
                                @endforeach
                            @else
                                <li>(Chưa tạo thẻ tag)</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </section>
            
            <div class="p-4 mb-4 grid gap-4 grid-cols-1 lg:grid-cols-2 bg-white shadow-md sm:rounded-lg">
                <div class="sm:col-span-2">
                    <label for="detail" class="block mb-2 font-semibold text-gray-900">Nội dung chi tiết</label>
                    <textarea name="detail" id="detail" cols="" rows="3" class="ckeditor w-full focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Nhập nội dung ...">{!! $post->detail !!}</textarea>
                    <script>
                        // Replace the <textarea id="editor1"> with a CKEditor 4
                        // instance, using default configuration.
                        CKEDITOR.replace( 'detail' );
                        CKEDITOR.on("instanceReady", function(event) {
                            event.editor.on("beforeCommandExec", function(event) {
                                // Show the paste dialog for the paste buttons and right-click paste
                                if (event.data.name == "paste") {
                                    event.editor._.forcePasteDialog = true;
                                }
                                // Don't show the paste dialog for Ctrl+Shift+V
                                if (event.data.name == "pastetext" && event.data.commandData.from == "keystrokeHandler") {
                                    event.cancel();
                                }
                            })
                        });
                    </script>
                </div>
            </div>
            <div class="flex items-center flex-wrap gap-4">
                <button type="submit" class="text-white inline-flex items-center bg-green-500 hover:bg-green-700 border-2 border-green-500 hover:border-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <svg class="me-1 -ms-1 w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor">
                        <path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V128zM224 288a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/>
                    </svg>
                    Lưu
                </button>
                <a href="{{ route('post.index') }}" type="button" class="btn_cancel text-black inline-flex items-center border-2 bg-white rounded-lg text-sm px-5 py-2.5 text-center">
                    Hủy bỏ
                </a>
            </div>
        </form>
    </div>    
</section>
<script>
    const fileUpload = document.querySelector("#file_input");
    let listProductImage = document.querySelector('#list-post-image');

    fileUpload.addEventListener("change", (e) => {
        e.preventDefault();
        let data = document.querySelectorAll('#list-post-image div');
        if(data.length > 0) {
            for(let i = 0; i < data.length; i++) {
                listProductImage.removeChild(data[i]);
            }
        }
        
        const files = e.target.files;
        for(let i = 0; i < files.length; i++) {
            let imageWrap = document.createElement('div');
            imageWrap.className = 'overflow-hidden bg-white px-4 pt-8 pb-4 rounded shadow w-60';
            let image = document.createElement('img');
            image.className = 'w-full rounded-lg';
            image.src = window.URL.createObjectURL(files[i]);

            imageWrap.appendChild(image);
            listProductImage.appendChild(imageWrap);
        }
    });

    

    
    
</script>
@endsection

