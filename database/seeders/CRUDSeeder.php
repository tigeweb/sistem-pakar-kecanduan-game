<?php

namespace Database\Seeders;

use App\Models\CRUD;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CRUDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (env('SEEDER_CRUD')) {
            CRUD::factory(env('SEEDER_CRUD'))->create();
        }
    }
}
