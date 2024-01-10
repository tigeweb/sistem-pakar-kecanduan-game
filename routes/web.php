<?php

use App\Http\Controllers\Admin\GejalaController;
use App\Http\Controllers\Admin\JenisPerilakuController;
use App\Http\Controllers\Admin\PengaturanController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect(route('login'));
});

// Akses Admin
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:Admin'])->group(function () {

    // Dashboard
    Route::controller(DashboardController::class)->name('dashboard.')->group(function () {
        Route::get('dashboard', 'index')->name('index');
    });
    // End Dashboard

    // Jenis Perilaku
    Route::resource('jenis-perilaku', JenisPerilakuController::class)->except(['create', 'show']);
    // End Jenis Perilaku

    // Gejala
    Route::resource('gejala', GejalaController::class)->except(['create', 'show']);
    // End Gejala

    // Pengaturan
    Route::controller(PengaturanController::class)->name('pengaturan.')->group(function () {
        Route::get('pengaturan', 'index')->name('index');
        Route::get('pengaturan/edit-logo', 'edit_logo')->name('edit-logo.index');
        Route::get('pengaturan/edit-logo-title', 'edit_logo_title')->name('edit-logo-title.index');
        Route::get('pengaturan/edit-footer', 'edit_footer')->name('edit-footer.index');
        Route::post('ajax/update-data-setting', 'update')->name('ajax.update');
    });
    // End Pengaturan

});
// End Akses Admin

// Diagnosa
Route::resource('diagnosa', DiagnosaController::class)->only(['index', 'store']);
// End Diagnosa

require __DIR__ . '/auth.php';
