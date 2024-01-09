<?php

namespace Database\Seeders;

use App\Models\User;
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
        $admin = User::factory()->create([
            'name' => 'Admin',
            'username' => 'admin',
        ]);
        $admin->assignRole('Admin');

        if (env('SEEDER_USERS')) {
            $users = User::factory(env('SEEDER_USERS'))->create();
            foreach ($users as $user) {
                $user->assignRole('Admin');
            }
        }
    }
}
