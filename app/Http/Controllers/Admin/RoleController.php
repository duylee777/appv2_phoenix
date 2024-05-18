<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:'.config('global.role_permissions.view_roles'))->only('index');
        $this->middleware('permission:'.config('global.role_permissions.create_role'))->only('store');
        $this->middleware('permission:'.config('global.role_permissions.update_role'))->only('update');
        $this->middleware('permission:'.config('global.role_permissions.delete_role'))->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::orderBy('id', 'ASC')->paginate(20);
        $permissions = Permission::orderBy('id', 'ASC')->get();
        return view('admin.permission.role', compact('roles', 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $roles = Role::all()->pluck('name')->toArray();
        if(!in_array($request->name, $roles)) {
            $newRole = Role::create(['name' => $request->name]);
            $newRole->syncPermissions($request->permissions);

            return response('Thêm vai trò mới thành công !', 200);
        }
        return response('Vai trò đã tồn tại !', 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $roles = Role::all()->pluck('name')->toArray();
        $updateRole = Role::where('id', $id)->first();
        $key = array_search($updateRole->name, $roles);
        array_splice($roles, $key, 1);

        $dataRoleUpdate = [
            'name' => $request->name,
        ];
        
        if(!in_array($request->name, $roles)) {
            
            $updateRole->update($dataRoleUpdate);
            $updateRole->syncPermissions($request->permissions);

            return response('Cập nhật vai trò thành công !', 200);
        }
        return response('Tên vai trò đã tồn tại !', 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // $role = Role::where('id', $id)->first();
        Role::destroy($id);
        return response('Đã xóa vai trò !', 200);
    }
}
