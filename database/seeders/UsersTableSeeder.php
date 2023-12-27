<?php

namespace Database\Seeders;

use App\Models\User;
use App\Permissions\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadmin = User::factory()->create([
            'name' => 'Superadmin',
            'username' => Permission::USERNAME_SUPERADMIN,
        ]);
        $superadmin->assignRole(Permission::ROLE_SUPERADMIN);

        $admin = User::factory()->create([
            'name' => 'Admin',
            'username' => 'admin',
        ]);
        $admin->assignRole(Permission::ROLE_ADMIN);

        if (env('SEEDER_USERS')) {
            $users = User::factory(env('SEEDER_USERS'))->create();
            foreach ($users as $user) {
                $user->assignRole(fake()->randomElement([
                    Permission::ROLE_SUPERADMIN,
                    Permission::ROLE_ADMIN,
                ]));
            }
        }
    }
}
