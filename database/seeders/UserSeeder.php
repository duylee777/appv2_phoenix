<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleSuperAdmin = Role::where('name', config('global.default_roles.super_admin'))->first();
        $superAdmin = \App\Models\User::factory()->create([
            'name' => 'Lê Duy',
            'email' => 'duyleit98@gmail.com',
            'password' => Hash::make('sa@@4869'),
            'phone' => '0395275858',
            'access_admin_panel' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        $superAdmin->assignRole($roleSuperAdmin);

        $roleAdmin = Role::where('name', config('global.default_roles.admin'))->first();
        $permissions = Permission::all()->pluck('name');
        $roleAdmin->syncPermissions($permissions);

        $roleStaff = Role::where('name', config('global.default_roles.staff'))->first();
        $permissions_for_staff = array(
            config('global.category_permissions.view_categories'),
            config('global.category_permissions.create_category'),
            config('global.category_permissions.update_category'),
            config('global.category_permissions.delete_category')
        );
        $roleStaff->syncPermissions($permissions_for_staff);
    }
}
