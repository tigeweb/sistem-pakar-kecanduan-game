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

    public function findById($id)
    {
        $data = $this->crud->findOrFail($id);

        return $data;
    }

    public function store($request)
    {
        $data = $this->crud->create($request);

        return $data;
    }

    public function update($request, $id)
    {
        $data = $this->findById($id);

        $data->update($request);

        return $data;
    }

    public function destroy($id)
    {
        $data = $this->findById($id);

        $data->delete();

        return $data;
    }
}
