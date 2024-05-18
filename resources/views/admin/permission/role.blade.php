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
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Vai trò</span>
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

    <section class="bg-gray-50 dark:bg-gray-900 py-4 sm:py-5 mt-5">
        <div class="px-4 mx-auto max-w-screen-2xl">
            <div class="relative overflow-hidden bg-white shadow-md sm:rounded-lg">
                <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                    <div class="flex items-center flex-1 space-x-4">
                        <h2 class="text-black text-2xl font-semibold">Danh sách vai trò</h2>
                    </div>
                    <div class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3"> 
                        <!-- Create main modal -->
                        @include('admin.permission.partials.create-role-form')  
                    </div>
                </div>
                <!-- --------- -->
                <div class="overflow-x-auto pb-20">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Vai trò</th>
                                <th scope="col" class="px-4 py-3">Quyền được cấp</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                            <tr class="border-b dark:border-gray-700">
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $role->name }}</th>
                                <td class="px-4 py-3">
                                    <div class="flex flex-wrap gap-2">
                                    @if($role->name == config('global.default_roles.super_admin'))
                                        <span class="px-2 py-1 text-white text-xs rounded bg-green-600">Tất cả các quyền</span>
                                    @elseif($role->name == config('global.default_roles.customer'))
                                        <span class="px-2 py-1 text-white text-xs rounded bg-red-400">Không được cấp quyền</span>
                                    @else
                                        @foreach($role->permissions as $permission)
                                            <span class="px-2 py-1 text-white text-xs rounded bg-green-400">{{ $permission->name }}</span>
                                        @endforeach
                                    @endif
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-end gap-4">
                                        @if($role->name == config('global.default_roles.super_admin'))
                                            <span></span>
                                        @else
                                            <!-- Update main modal -->
                                            @include('admin.permission.partials.update-role-form')
                                    
                                            <!-- Delete role -->
                                            @include('admin.permission.partials.delete-role-form')
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $roles->links() }}
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

                let permissions = $("input:checkbox[name=permissions]:checked")
                    .map(function (){
                    return $(this).val();
                }).toArray();
                
                var createButton = $(this);
                var dataNewRole = {
                    name: $('#new-name').val(),
                    permissions: permissions,             
                };

                $.ajax({
                    type: 'POST',
                    url: createButton.data('route'),
                    data: dataNewRole,
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
                        var errors = "";

                        $.each(results.responseJSON.errors, function(key, error)
                        {
                            errors += "<li>"+error+"</li>"
                        });
                   
                        Swal.fire({
                            title: "Lỗi !",
                            html: "<ul>"
                            +"<li>"+errors+"</li>"
                            +"</ul>",
                            icon: "error",
                        }); 

                    },
                });
            });

            $('.btn_update_item').click(function(e){
                e.preventDefault();
               
                var updateButton = $(this);
                var id = updateButton.data("id");

                let url = $('.update-role-'+id).data('route');

                let updatePermissions = $("input:checkbox[name=update-permissions-"+id+"]:checked")
                    .map(function (){
                    return $(this).val();
                }).toArray();
                
                var dataRoleUpdate = {
                    name: $('#update-name-'+id).val(),
                    permissions: updatePermissions,
                };

                $.ajax({
                    type: 'POST',
                    method: 'PUT',
                    url: url,
                    data: dataRoleUpdate,
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
                    // else {
                    //     Swal.fire("Error!", results.message, "error");
                    // }
                });
            });

        });
    </script>
@endsection