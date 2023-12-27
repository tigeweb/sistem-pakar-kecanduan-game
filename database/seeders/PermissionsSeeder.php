<?php

namespace Database\Seeders;

use App\Permissions\Permission as PermissionsPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        foreach (PermissionsPermission::PERMISSION_GROUPS as $permissionNames) {
            foreach ($permissionNames['permissions'] as $permissionName) {
                Permission::create([
                    'name' => $permissionName,
                ]);
            }
        }

        $superadmin = Role::findByName(PermissionsPermission::ROLE_SUPERADMIN);
        foreach (PermissionsPermission::PERMISSION_GROUPS_SUPERADMIN as $permission) {
            $superadmin->givePermissionTo($permission['permissions']);
        }

        $admin = Role::findByName(PermissionsPermission::ROLE_ADMIN);
        foreach (PermissionsPermission::PERMISSION_GROUPS_ADMIN as $permission) {
            $admin->givePermissionTo($permission['permissions']);
        }
    }
}
