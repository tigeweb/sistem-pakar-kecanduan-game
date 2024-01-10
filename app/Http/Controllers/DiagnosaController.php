<?php

namespace App\Http\Controllers;

use App\Models\Admin\Gejala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DiagnosaController extends Controller
{
    public function index()
    {
        return view('pages.diagnosa.index', [
            'deskripsi_gejala' => Gejala::select(['id', 'deskripsi_gejala'])->get()
        ]);
    }

    public function get_data()
    {
        return response()->view('pages.diagnosa.components.form', [
            'deskripsi_gejala' => Gejala::select(['id', 'deskripsi_gejala'])->get(),
            'csrf' => csrf_token()
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'gejala.*' => 'required_if:gejala.*,null',
        ], [
            'gejala.*.required_if' => 'Field ini wajib diisi !'
        ]);
        if ($validator->fails()) return response()->json(['errors' => $validator->errors()], 422);
        $groupedData = [];
        $groupedDataJenis = [];
        foreach ($request->gejala as $id => $gejalaTrueFalse) {
            if ($gejalaTrueFalse == '1') {
                $gejala = Gejala::with('jenis_perilaku')->find($id);
                $kode_jenis = $gejala->jenis_perilaku->kode_jenis;
                // $groupedData[$kode_jenis][] = [
                //     'id' => $gejala->id,
                //     'kode_gejala' => $gejala->kode_gejala,
                //     'gejala' => $gejala->deskripsi_gejala,
                //     'jenis_perilaku' => $gejala->jenis_perilaku->nama_jenis,
                //     'solusi' => $gejala->jenis_perilaku->solusi,
                //     'keterangan_solusi' => $gejala->jenis_perilaku->keterangan_solusi,
                // ];
                $groupedDataJenis[$kode_jenis] = [
                    'kode_jenis' => $gejala->jenis_perilaku->kode_jenis,
                    'nama_jenis' => $gejala->jenis_perilaku->nama_jenis,
                    'solusi' => $gejala->jenis_perilaku->solusi,
                    'keterangan_solusi' => $gejala->jenis_perilaku->keterangan_solusi,
                ];
            }
        }

        if (count($groupedDataJenis) >= 3) {
            $kecanduan = 'Kecanduan Game';
            $color = 'danger';
        } else {
            $kecanduan = 'Tidak Kecanduan Game';
            $color = 'success';
        }

        return view('pages.diagnosa.components.hasil-diagnosa', [
            'data' => $groupedDataJenis,
            // 'data_jenis' => $groupedDataJenis,
            'kecanduan' => $kecanduan,
            'color' => $color
        ]);
    }
}
