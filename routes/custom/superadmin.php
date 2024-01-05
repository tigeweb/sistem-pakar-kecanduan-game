<?php

use App\Http\Controllers\Superadmin\Roles\RolesController;
use Illuminate\Support\Facades\Route;

Route::prefix('superadmin')->name('superadmin.')->middleware(['auth', 'permission:akses_menu_superadmin'])->group(function () {

    // ROLES
    Route::resource('roles', RolesController::class)->except(['create', 'show'])->names([
        'index' => 'kelola-pengguna.roles.index',
    ]);
    // End ROLES

});
