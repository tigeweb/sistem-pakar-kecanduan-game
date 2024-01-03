<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Superadmin\CRUD\CRUDController;
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

// Akses Superadmin & Admin
Route::middleware(['auth', 'permission:akses_menu_superadmin|akses_menu_admin'])->group(function () {

    // Dashboard
    Route::controller(DashboardController::class)->name('dashboard.')->group(function () {
        Route::get('dashboard', 'index')->name('index');
    });
    // End Dashboard

    // CRUD
    Route::resource('crud', CRUDController::class);
    Route::get('crud/{crud}/detail', [CRUDController::class, 'detail'])->name('crud.detail');
    // End CRUD

});
// End Akses Superadmin & Admin

// Akses Superadmin
require __DIR__ . '/custom/superadmin.php';
// End Akses Superadmin

require __DIR__ . '/auth.php';
