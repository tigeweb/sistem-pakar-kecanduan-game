<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin\Gejala;
use App\Models\Admin\JenisPerilaku;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        return view('pages.dashboard.index', [
            'jenis_perilaku_count' => JenisPerilaku::count(),
            'gejala_count' => Gejala::count(),
        ]);
    }
}
