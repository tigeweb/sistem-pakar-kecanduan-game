<?php

namespace App\Repositories;

use App\Permissions\Permission as PermissionsPermission;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionsRepository
{

    protected $role;
    protected $permission;
    protected $roleRepository;
    protected $permissionNames = [
        PermissionsPermission::CAN_ACCESS_SUPERADMIN,
        PermissionsPermission::CAN_ACCESS_ADMIN,
    ];

    public function __construct(Role $role, Permission $permission, RoleRepository $roleRepository)
    {
        $this->role = $role;
        $this->permission = $permission;
        $this->roleRepository = $roleRepository;
    }

    public function getDataPermissionWhereAccess()
    {
        return $this->permission->whereIn('name', $this->permissionNames)->get();
    }

    public function getDataRolePermission()
    {
        $data = DB::table('role_has_permissions')
            ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
            ->join('roles', 'role_has_permissions.role_id', '=', 'roles.id')
            ->select('roles.name as role_name', 'roles.id as role_id', 'permissions.name as permission_name', 'permissions.id as permission_id')
            ->orderBy('role_id')
            ->get();

        $groupedData = $data->groupBy('role_id')->map(function ($items) {
            return [
                'role_id' => $items->first()->role_id,
                'role' => $items->first()->role_name,
                'permissions' => $items->pluck('permission_name')->toArray(),
            ];
        });

        $formattedData = $groupedData->values();
        return $formattedData;
    }

    public function findPermissionByName($name)
    {
        return $this->permission->where('name', $name)->first();
    }

    public function findByRoleIdWhereAccess($id)
    {
        return $this->roleRepository->findById($id)->permissions()->whereIn('name', $this->permissionNames)->first();
    }

    public function givePermissionToRole($request)
    {
        $role = $this->roleRepository->findById($request['role']);
        $permission = $request['permissions'];
        $permission[] = $this->findPermissionByName($request['akses_menu']);

        $role->givePermissionTo($permission);
    }

    public function storeRolePermission($request)
    {
        $data = [];
        $permissions = $request->permissions;
        $permissions[] = $this->findPermissionByName($request->akses_menu)->id;

        foreach ($permissions as $key => $permission) {
            $data['role_id'] = $request->role;
            $data['permission_id'] = $permission;

            DB::table('role_has_permissions')->insert($data);
        }
    }

    public function updateRolePermission($id, $request)
    {
        $role = $this->roleRepository->findById($id);
        $permission_access = $this->findPermissionByName($request->akses_menu);
        $permissions = $request->permissions;
        $permissions[] = $permission_access->id;

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }
    }

    public function destroyRolePermission($id)
    {
        $role = $this->roleRepository->findById($id);

        return $role->permissions()->detach();;
    }
}
