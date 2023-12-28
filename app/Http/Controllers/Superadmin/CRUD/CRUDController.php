<?php

namespace App\Http\Controllers\Superadmin\CRUD;

use App\Http\Controllers\Controller;
use App\Permissions\Permission;
use App\Repositories\CRUDRepository;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

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
}
