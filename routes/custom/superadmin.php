<?php

use App\Http\Controllers\Superadmin\RolePermissionsController;
use App\Http\Controllers\Superadmin\RolesController;
use Illuminate\Support\Facades\Route;

Route::prefix('superadmin')->name('superadmin.')->middleware(['auth', 'permission:akses_menu_superadmin'])->group(function () {

    // ROLES
    Route::resource('roles', RolesController::class)->except(['create', 'show'])->names([
        'index' => 'kelola-pengguna.roles.index',
    ]);
    // End ROLES

    // ROLE PERMISSIONS
    Route::resource('role-permissions', RolePermissionsController::class)->except(['create', 'show'])->names([
        'index' => 'kelola-pengguna.role-permissions.index',
    ]);
    // End ROLE PERMISSIONS

});
