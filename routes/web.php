<?php

use App\Http\Controllers\Admin\JenisPerilakuController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Superadmin\CRUDController;
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

    // CRUD
    Route::resource('crud', CRUDController::class)->except(['create']);
    // End CRUD

    // Jenis Perilaku
    Route::resource('jenis-perilaku', JenisPerilakuController::class)->except(['create']);
    // End Jenis Perilaku

});
// End Akses Admin

require __DIR__ . '/auth.php';
