<?php

namespace App\Http\Controllers\Superadmin\CRUD;

use App\Http\Controllers\Controller;
use App\Permissions\Permission;
use Illuminate\Http\Request;

class CRUDController extends Controller
{
    public function index()
    {
        $this->authorize(Permission::VIEW_CRUD);
        return view('pages.superadmin.crud.index');
    }
}
