<?php

namespace App\Http\Controllers\Superadmin\Roles;

use App\Http\Controllers\Controller;
use App\Http\Requests\Superadmin\Roles\RolesRequest;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RolesController extends Controller
{
    private $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->roleRepository->getAll();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('role', function ($data) {
                    return view('pages.superadmin.roles.components-table.component-role', ['data' => $data]);
                })
                ->addColumn('aksi', function ($data) {
                    return view('pages.superadmin.roles.components-table.component-action', ['data' => $data]);
                })
                ->make(true);
        }

        return view('pages.superadmin.roles.index');
    }

    public function store(RolesRequest $request)
    {
        try {
            $this->roleRepository->store($request->validated());

            return response()->json(['message' => __('app.success.roles_store')]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function edit($id)
    {
        try {
            $data = $this->roleRepository->findById($id);

            return view('pages.superadmin.roles.modals.modal-edit', [
                'data' => $data,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(RolesRequest $request, $id)
    {
        try {
            $this->roleRepository->update($request->validated(), $id);

            return response()->json(['message' => __('app.success.roles_update')]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $this->roleRepository->destroy($id);

            return response()->json(['message' => __('app.success.roles_destroy')]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
