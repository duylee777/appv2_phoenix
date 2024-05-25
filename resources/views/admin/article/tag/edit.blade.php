@extends('admin.layouts.index')
 
@section('title', 'Thẻ')

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
        <li>
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a href="{{ route('tag.index') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 ">Thẻ</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Cập nhật thẻ</span>
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

<section class="bg-gray-50 dark:bg-gray-900 py-4 sm:py-5 mt-5">
    <a href="{{ Session::get('backLink') }}" class="mx-4 mb-4 inline-flex items-center gap-1 px-4 py-2 bg-white shadow rounded hover:bg-gray-100">
        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="8" viewBox="0 0 256 512">
            <path d="M31.7 239l136-136c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9L127.9 256l96.4 96.4c9.4 9.4 9.4 24.6 0 33.9L201.7 409c-9.4 9.4-24.6 9.4-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34z"/>
        </svg>
        Quay lại
    </a>
    <h2 class=" mx-4 mb-4 text-xl font-bold text-yellow-300">Cập nhật thẻ</h2>
    <form  method="POST" action="{{ route('tag.update', $tag->id) }}" class="px-4" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <section class="grid gap-4 grid-cols-1 lg:grid-cols-2">
            <div class="p-4 mb-4 grid gap-4 grid-cols-1 lg:grid-cols-2 bg-white shadow-md sm:rounded-lg">
                <div class="col-span-2">
                    <label for="name" class="block mb-2 font-semibold text-gray-900">Tên thẻ</label>
                    <input type="text" name="name" id="name" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Nhập tên tag ..." required="" value="{{$tag->name}}">
                </div>
            </div>
            <div class="">
                <div class="p-4 mb-4 grid gap-4 grid-cols-1 lg:grid-cols-2 bg-white shadow-md sm:rounded-lg">
                    <div class="col-span-2">
                        <div class="flex items-center">
                            @if($tag->is_visible)
                                <input id="is_visible"  name="is_visible" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500" checked>
                            @else
                                <input id="is_visible"  name="is_visible" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                            @endif
                            <label for="is_visible" class="ms-2 text-sm font-semibold text-gray-900">Hiển thị cho khách hàng</label>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="flex items-center flex-wrap gap-4">
            <button type="submit" class="text-white inline-flex items-center bg-green-500 hover:bg-green-700 border-2 border-green-500 hover:border-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                <svg class="me-1 -ms-1 w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor">
                    <path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V128zM224 288a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/>
                </svg>
                Lưu
            </button>
            <a href="{{ route('tag.index') }}" type="button" class="btn_cancel text-black inline-flex items-center border-2 bg-white rounded-lg text-sm px-5 py-2.5 text-center">
                Hủy bỏ
            </a>
        </div>
    </form>
</section>
@endsection