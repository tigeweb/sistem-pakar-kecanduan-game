<?php

namespace App\Repositories;

use App\Models\CRUD;

class CRUDRepository
{
    protected $crud;

    public function __construct(CRUD $crud)
    {
        $this->crud = $crud;
    }

    public function getAll()
    {
        $data = $this->crud->latest()->get();

        return $data;
    }
}
