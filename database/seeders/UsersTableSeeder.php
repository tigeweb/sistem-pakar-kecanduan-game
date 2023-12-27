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
        User::factory()->create([
            'name' => 'Superadmin',
            'username' => 'superadmin',
            'password' => Hash::make('2'),
            'no_hp' => '000',
        ]);

        // if (env('SEEDER_USERS')) {
        //     $users = User::factory(env('SEEDER_USERS'))->create();
        //     foreach ($users as $user) {
        //         $user->assignRole(fake()->randomElement([
        //             Permission::ROLE_TEKNISI,
        //             Permission::ROLE_ADMIN,
        //             Permission::ROLE_G_INDUK,
        //             Permission::ROLE_SUPERADMIN
        //         ]));
        //     }
        // }
    }
}
