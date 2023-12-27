<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => \App\Permissions\Permission::ROLE_SUPERADMIN,
            'color' => '#df3434',
            'background_color' => 'rgba(223, 52, 52, 0.25)'
        ]);

        Role::create([
            'name' => \App\Permissions\Permission::ROLE_ADMIN,
            'color' => '#415bdb',
            'background_color' => 'rgba(65, 91, 219, 0.25)'
        ]);
    }
}
