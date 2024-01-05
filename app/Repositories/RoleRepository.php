<?php

namespace App\Repositories;

use Spatie\Permission\Models\Role;

class RoleRepository
{

    protected $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function getAll()
    {
        return $this->role->latest()->get();
    }

    public function findById($id)
    {
        return $this->role->findOrFail($id);
    }

    public function store($request)
    {
        $role = $this->role->create([
            'name' => $request['role'],
            'color' => $request['color'],
            'background_color' => convertHexToRgba($request['background_color']),
        ]);

        return $role;
    }

    public function update($request, $id)
    {
        $role = $this->findById($id);

        $role->update([
            'name' => $request['role'],
            'color' => $request['color'],
            'background_color' => convertHexToRgba($request['background_color']),
        ]);

        return $role;
    }

    public function destroy($id)
    {
        return $this->findById($id)->delete();
    }
}
