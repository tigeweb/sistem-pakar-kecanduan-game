<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Superadmin\RolePermissionsRequest;
use App\Permissions\Permission;
use App\Repositories\RolePermissionsRepository;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class RolePermissionsController extends Controller
{
    private $rolePermissionsRepository;
    private $roleRepository;

    public function __construct(RolePermissionsRepository $rolePermissionsRepository, RoleRepository $roleRepository)
    {
        $this->rolePermissionsRepository = $rolePermissionsRepository;
        $this->roleRepository = $roleRepository;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->rolePermissionsRepository->getDataRolePermission();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('aksi', function ($data) {
                    return view('pages.superadmin.role-permissions.components-table.component-action', ['data' => $data]);
                })
                ->make(true);
        }

        return view('pages.superadmin.role-permissions.index');
    }

    public function store(RolePermissionsRequest $request)
    {
        try {
            $this->authorize(Permission::CREATE_ROLE_PERMISSIONS);

            $data = [
                'role' => $request->role,
                'permissions' => $request->permissions,
                'akses_menu' => $request->akses_menu,
            ];

            $this->rolePermissionsRepository->givePermissionToRole($data);

            return response()->json(['message' => __('app.success.role_permissions_store')]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function edit($id)
    {
        try {
            $this->authorize(Permission::EDIT_ROLE_PERMISSIONS);
            $data_role = $this->roleRepository->findById($id);
            $data_permissions = $this->rolePermissionsRepository->findByRoleIdWhereAccess($id);

            return view('pages.superadmin.role-permissions.modals.modal-edit', [
                'data_role' => $data_role,
                'data_permissions' => $data_permissions,
                'roles' => $this->roleRepository->getAll(),
                'permissions' => $this->rolePermissionsRepository->getDataPermissionWhereAccess(),
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(RolePermissionsRequest $request, $id)
    {
        try {
            $this->authorize(Permission::EDIT_ROLE_PERMISSIONS);
            $this->rolePermissionsRepository->updateRolePermission($id, $request);

            return response()->json(['message' => __('app.success.role_permissions_update')]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $this->authorize(Permission::DELETE_ROLE_PERMISSIONS);
            $this->rolePermissionsRepository->destroyRolePermission($id);

            return response()->json(['message' => __('app.success.role_permissions_destroy')]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function groupAccess(Request $request)
    {
        try {
            // $groupedPermissionsDashboard = Permission::PERMISSION_GROUPS_DASHBOARD;
            if ($request['akses_menu'] === Permission::CAN_ACCESS_SUPERADMIN) {
                $groupedPermissions = Permission::PERMISSION_GROUPS_SUPERADMIN;
            } else if ($request['akses_menu'] === Permission::CAN_ACCESS_ADMIN) {
                $groupedPermissions = Permission::PERMISSION_GROUPS_ADMIN;
            } else {
                $groupedPermissions = null;
                // $groupedPermissionsDashboard = null;
            }

            return view('pages.superadmin.role-permissions.components.izin-akses', [
                'role' => $request->role_id ? $this->roleRepository->findById($request->role_id) : new Role(),
                'groupedPermissions' => $groupedPermissions,
                // 'groupedPermissionsDashboard' => $groupedPermissionsDashboard,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
