<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GejalaRequest;
use App\Models\Admin\Gejala;
use App\Models\Admin\JenisPerilaku;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GejalaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Gejala::with('jenis_perilaku')->select(['id', 'kode_gejala', 'jenis_perilaku_id', 'deskripsi_gejala']);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('DT_RowIndex', function ($data) {
                    return $data->id;
                })
                ->addColumn('kode_jenis', function ($data) {
                    return $data->jenis_perilaku->kode_jenis;
                })
                ->addColumn('aksi', function ($data) {
                    return view('pages.admin.gejala.components-table.component-action', ['data' => $data]);
                })
                ->make(true);
        }

        return view('pages.admin.gejala.index', [
            'jenis_perilaku' => JenisPerilaku::get(),
        ]);
    }

    public function store(GejalaRequest $request)
    {
        try {
            Gejala::create($request->validated());

            return response()->json(['message' => __('app.success.gejala_store')]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function edit($id)
    {
        try {
            $data = Gejala::findOrFail($id);

            return view('pages.admin.gejala.modals.modal-edit', [
                'data' => $data,
                'jenis_perilaku' => JenisPerilaku::get(),
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(GejalaRequest $request, $id)
    {
        try {
            $data = Gejala::findOrFail($id);
            $data->update($request->validated());

            return response()->json(['message' => __('app.success.gejala_update')]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $data = Gejala::findOrFail($id);
            $data->delete();

            return response()->json(['message' => __('app.success.gejala_destroy')]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
