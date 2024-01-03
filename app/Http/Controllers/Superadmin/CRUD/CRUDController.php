<?php

namespace App\Http\Controllers\Superadmin\CRUD;

use App\Http\Controllers\Controller;
use App\Http\Requests\Superadmin\CRUD\CRUDRequest;
use App\Http\Requests\Superadmin\CRUD\CRUDStoreRequest;
use App\Permissions\Permission;
use App\Repositories\CRUDRepository;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Config;

class CRUDController extends Controller
{
    private $crudRepository;

    public function __construct(CRUDRepository $crudRepository)
    {
        $this->crudRepository = $crudRepository;
    }

    public function index(Request $request)
    {
        $this->authorize(Permission::VIEW_CRUD);

        if ($request->ajax()) {
            $data = $this->crudRepository->getAll();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('created_at', function ($data) {
                    return view('pages.superadmin.crud.components-table.component-created-at', ['data' => $data]);
                })
                ->addColumn('aksi', function ($data) {
                    return view('pages.superadmin.crud.components-table.component-action', ['data' => $data]);
                })
                ->make(true);
        }

        return view('pages.superadmin.crud.index');
    }

    public function store(CRUDRequest $request)
    {
        try {
            $this->crudRepository->store($request);

            return response()->json(['message' => Config::get('messages.success.crud_store')]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function edit($id)
    {
        try {
            $data = $this->crudRepository->findById($id);

            return view('pages.superadmin.crud.modals.modal-edit', [
                'data' => $data,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(CRUDRequest $request, $id)
    {
        try {
            $this->crudRepository->update($request, $id);

            return response()->json(['message' => Config::get('messages.success.crud_update')]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $this->crudRepository->destroy($id);

            return response()->json(['message' => Config::get('messages.success.crud_destroy')]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function detail($id)
    {
        try {
            $data = $this->crudRepository->findById($id);

            return view('pages.superadmin.crud.modals.modal-detail', [
                'data' => $data,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
