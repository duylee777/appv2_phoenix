<button data-modal-target="edit-modal-{{$user->id}}" data-modal-toggle="edit-modal-{{$user->id}}" class="block">
    <svg class="fill-yellow-300 hover:fill-yellow-600" xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
        <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/>
    </svg>
</button>

<!-- Create main modal -->
<div id="edit-modal-{{$user->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Create modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Create modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-lg font-semibold text-gray-900">
                    Cập nhật người dùng : {{ $user->name }}
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="edit-modal-{{$user->id}}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Create modal body -->
            <form action="{{ route('admin.user.update', $user->id) }}" method="POST" class="p-4 md:p-5">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Tên người dùng</label>
                        <input type="text" name="name" id="update-name-{{$user->id}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="{{ $user->name }}">
                    </div>
                    <div class="">
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Số điện thoại</label>
                        <input type="text" name="phone" id="update-phone-{{$user->id}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="{{ $user->phone }}">
                    </div>
                    <div class="">
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900">Cấp phép quyền</label>
                        <div class="flex items-center">
                            <?php
                                $userRole = $user->getRoleNames()->toArray();
                            ?>
                            @if($user->access_admin_panel)
                                
                                @if(in_array(config('global.default_roles.super_admin'), $userRole))
                                    <input id="update-access-admin-panel-{{$user->id}}" name="access-admin-panel-{{$user->id}}" type="checkbox" value="{{$user->access_admin_panel}}" class="w-4 h-4 text-blue-500 bg-gray-100 border-gray-300 rounded focus:ring-blue-500" checked disabled>
                                @else
                                    <input id="update-access-admin-panel-{{$user->id}}"  name="access-admin-panel-{{$user->id}}" type="checkbox" value="{{$user->access_admin_panel}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500" checked>
                                @endif
                            @else
                                <input id="update-access-admin-panel-{{$user->id}}"  name="access-admin-panel-{{$user->id}}" type="checkbox" value="{{$user->access_admin_panel}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                            @endif
                            <label for="update-access-admin-panel-{{$user->id}}" class="ms-2 text-sm text-gray-900">Quyền truy cập trang quản trị</label>
                        </div>
                    </div>
                    <div class="">
                        <label class="block mb-2 text-sm font-medium text-gray-900">Vai trò</label>
                        @if(in_array(config('global.default_roles.super_admin'), $userRole))
                            <select id="role-user-{{$user->id}}" name="role-user-{{$user->id}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" disabled>
                                @foreach($allRoles as $role)
                                    @if($role->name == config('global.default_roles.super_admin'))
                                        <option value="{{$role->name}}" class="font-medium" selected>{{$role->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        @else
                            <select id="role-user-{{$user->id}}" name="role-user-{{$user->id}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @foreach($allRoles as $role)
                                    @if(in_array($role->name, $userRole))
                                        <option value="{{$role->name}}" class="font-medium" selected>{{$role->name}}</option>
                                    @else
                                        @if($role->name == config('global.default_roles.super_admin'))
                                            <option value="{{$role->name}}" hidden>{{$role->name}}</option>
                                        @else
                                            <option value="{{$role->name}}">{{$role->name}}</option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        @endif
                    </div>
                    <!-- <div class="col-span-2">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.50" value="{{ $user->email }}">
                    </div>
                    <div class="col-span-2">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Mật khẩu</label>
                        <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.50" placeholder="Nhập mật khẩu ..." required="">
                    </div> -->
                </div>
                <button type="submit" data-id="{{ $user->id }}" class="btn_update_item text-white inline-flex items-center bg-yellow-500 hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/>
                    </svg>
                    Cập nhật
                </button>
            </form>
        </div>
    </div>
</div>