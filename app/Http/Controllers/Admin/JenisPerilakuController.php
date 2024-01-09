<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\JenisPerilakuRequest;
use App\Models\Admin\JenisPerilaku;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JenisPerilakuController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = JenisPerilaku::select(['id', 'kode_jenis', 'nama_jenis']);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('DT_RowIndex', function ($data) {
                    return $data->id;
                })
                ->addColumn('aksi', function ($data) {
                    return view('pages.admin.jenis-perilaku.components-table.component-action', ['data' => $data]);
                })
                ->make(true);
        }

        return view('pages.admin.jenis-perilaku.index');
    }

    public function store(JenisPerilakuRequest $request)
    {
        try {
            JenisPerilaku::create($request->validated());

            return response()->json(['message' => __('app.success.jenis_perilaku_store')]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function edit($id)
    {
        try {
            $data = JenisPerilaku::findOrFail($id);

            return view('pages.admin.jenis-perilaku.modals.modal-edit', [
                'data' => $data,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(JenisPerilakuRequest $request, $id)
    {
        try {
            $data = JenisPerilaku::findOrFail($id);
            $data->update($request->validated());

            return response()->json(['message' => __('app.success.jenis_perilaku_update')]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $data = JenisPerilaku::findOrFail($id);
            $data->delete();

            return response()->json(['message' => __('app.success.jenis_perilaku_destroy')]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
