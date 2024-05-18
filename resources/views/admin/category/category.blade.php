@extends('admin.layouts.index')
 
@section('title', 'Page Title')

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
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Danh mục</span>
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
        <div class="relative overflow-hidden bg-white shadow-md sm:rounded-lg">
            <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                <div class="flex items-center flex-1 space-x-4">
                    <h2 class="text-black text-2xl font-semibold">Danh sách danh mục</h2>
                </div>

                <!-- Search form -->
                <!-- <div class="flex-1">
                    <form class="flex items-center max-w-lg mx-auto">   
                        <div class="relative w-full"> 
                            <input type="text" id="voice-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-4 p-2.5" placeholder="Search Mockups, Logos, Design Templates..." required />
                            <button type="button" class="absolute inset-y-0 end-0 flex items-center pe-3">
                                <svg class="w-4 h-4 me-2 text-blue-500 hover:text-blue-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div> -->

                <div class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3"> 
                    <!-- Create main modal -->
                    @include('admin.category.partials.create-category-form')  
                </div>
            </div>
            <!-- --------- -->
            <div class="overflow-x-auto pb-20">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-4 py-3">
                                <input id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                            </th>
                            <th scope="col" class="px-4 py-3">Tên danh mục</th>
                            <th scope="col" class="px-4 py-3">Danh mục cha</th>
                            <th scope="col" class="px-4 py-3">Hiển thị</th>
                            <th scope="col" class="px-4 py-3">Ngày cập nhật</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr class="category-item border-b" data-order="{{$category->id}}" data-parentid="{{$category->parent_id}}">
                            <td class="px-4 py-3">
                                <input id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                            </td>
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $category->name }}</th>
                            <td class="px-4 py-3">
                                @if($category->parent_id == 0)
                                    <span>Danh mục gốc</span>
                                @else
                                    {{ $category->parent->name}}
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                @if($category->is_visible)
                                    <svg class="fill-green-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="16" width="16">
                                        <path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z"/>
                                    </svg>
                                @else
                                    <svg class="fill-red-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="16" width="16">
                                        <path d="M367.2 412.5L99.5 144.8C77.1 176.1 64 214.5 64 256c0 106 86 192 192 192c41.5 0 79.9-13.1 111.2-35.5zm45.3-45.3C434.9 335.9 448 297.5 448 256c0-106-86-192-192-192c-41.5 0-79.9 13.1-111.2 35.5L412.5 367.2zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"/>
                                    </svg>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                {{ $category->updated_at }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center justify-end gap-4">
                                    <!-- Update category -->
                                    @include('admin.category.partials.update-category-form')
                                
                                    <!-- Delete category -->
                                    @include('admin.category.partials.delete-category-form')
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.btn_create_item').click(function(e){
            e.preventDefault();

            var createButton = $(this);
            var dataNewCategory = {
                name: $('#name').val(),
                parent_id: $('#parent_id').find(':selected').val(),
                is_visible: $('#visible').is(':checked'),
                description: $('#description').val()
            };

            $.ajax({
                type: 'POST',
                url: createButton.data('route'),
                data: dataNewCategory,
                success: function(results) {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: results,
                        showConfirmButton: false,
                        timer: 1500,
                    });
                    
                    setTimeout(function(){
                        location.reload();
                    },2000);
                },
                error: function(results) {
                    Swal.fire({
                        title: results.responseText,
                        icon: "error",
                    });
                },
            });
        });

        $('.btn_update_item').click(function(e){
            e.preventDefault();
            
            var updateButton = $(this);
            var id = updateButton.data("id");

            let url = $('.update-category-'+id).data('route');
            
            var dataCategoryUpdate = {
                name: $('#name-'+id).val(),
                parent_id: $('#parent_id-'+id).find(':selected').val(),
                is_visible: $('#visible-'+id).is(':checked'),
                description: $('#description-'+id).val()
            };

            $.ajax({
                type: 'POST',
                method: 'PUT',
                url: url,
                data: dataCategoryUpdate,
                success: function(results) {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: results,
                        showConfirmButton: false,
                        timer: 1500,
                    });
                    
                    setTimeout(function(){
                        location.reload();
                    },2000);
                },
                error: function(results) {
                    Swal.fire({
                        title: results.responseText,
                        icon: "error",
                    });
                },
            });
        });

        $('.btn_delete_item').click(function(e){
            e.preventDefault();

            var id = $(this).data("id");
            var url = $(this).data("route");

            Swal.fire({
                title: "Bạn có chắc chắn muốn xóa ?",
                text: "Bạn sẽ không thể hoàn nguyên điều này!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Có, xóa thông tin",
                cancelButtonText: "Quay lại"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        method: 'DELETE',
                        url: url,
                        data: {
                            "id": id,
                        },
                        success: function(results) {
                            Swal.fire({
                                title: "Xóa thành công !",
                                text: "Thông tin đã được xóa !",
                                icon: "success",
                                showConfirmButton: false,
                            });
                            setTimeout(function(){
                                location.reload();
                            },2000);
                        },
                        error: function(results) {
                            Swal.fire({
                                title: "Không thể xóa !",
                                text: "Có diều gì đó đã xảy ra !",
                                icon: "error"
                            });
                        },
                    });
                } 
            });
        });

    });
</script>

@endsection