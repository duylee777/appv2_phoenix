<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function __construct () {
        $this->middleware('permission:'.config('global.user_permissions.view_users'))->only('index');
        $this->middleware('permission:'.config('global.user_permissions.create_user'))->only('store');
        $this->middleware('permission:'.config('global.user_permissions.update_user'))->only('update');
        $this->middleware('permission:'.config('global.user_permissions.delete_user'))->only('delete');
    }

    public function index() {
        $users = User::orderBy('id', 'ASC')->paginate(20);
        $allRoles = Role::all();
        return view('admin.user.index', compact('users', 'allRoles'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults()],
            'phone' => ['required', 'string', 'regex:/^[0-9]{10}+$/'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        $user = User::where('email', $request->email)->first();
        $roleCustomer = Role::findByName(config('global.default_roles.customer'));
        if($roleCustomer != null) {
            $user->assignRole(config('global.default_roles.customer'));
        }
        else {
            Role::create(['name' => config('global.default_roles.customer')]);
        }
        
        return response('Đã tạo người dùng thành công !', 200);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'regex:/^[0-9]{10}+$/'],
        ]);

        $dataUserUpdate = [
            'name' => $request->name,
            'phone' => $request->phone,
        ];

        if($request->accessAdminPanel == 'true') {
            $dataUserUpdate['access_admin_panel'] = true;
        }

        if($request->accessAdminPanel == 'false') {
            $dataUserUpdate['access_admin_panel'] = false;
        }

        $user = User::where('id',$id)->first();
        $user->update($dataUserUpdate);
        $user->syncRoles($request->roleUser);

        return response('Cập nhật thông tin người dùng thành công', 200);
    }

    public function delete($id) {
        User::destroy($id);
        return response()->json();
    }
}
