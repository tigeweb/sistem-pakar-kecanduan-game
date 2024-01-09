<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Models\Superadmin\Setting;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    public function index()
    {
        return view('pages.admin.pengaturan.index');
    }

    public function edit_logo()
    {
        return view('pages.admin.pengaturan.edit-logo.index');
    }

    public function edit_logo_title()
    {
        return view('pages.admin.pengaturan.edit-logo-title.index');
    }

    public function edit_gambar_sidebar()
    {
        return view('pages.admin.pengaturan.edit-gambar-sidebar.index');
    }
    public function edit_footer()
    {
        return view('pages.admin.pengaturan.edit-footer.index');
    }

    public function update(SettingRequest $request)
    {
        try {

            Setting::updateOrCreate(
                ['tipe' => $request->tipe],
                ['tipe' => $request->tipe, 'value' => $request->val]
            );
            return response()->json(['message' => 'Update ' . $request->tipe . ' Berhasil !', 'data' => $request->val]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
