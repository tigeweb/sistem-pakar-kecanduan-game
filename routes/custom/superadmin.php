<?php

use Illuminate\Support\Facades\Route;

Route::prefix('superadmin')->name('superadmin.')->middleware(['auth', 'permission:akses_menu_superadmin'])->group(function () {
});
