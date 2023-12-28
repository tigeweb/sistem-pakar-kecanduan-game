<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware(['auth', 'permission:akses_menu_admin'])->group(function () {

    // Isi Route Disini

});
