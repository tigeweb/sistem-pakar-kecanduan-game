<?php

namespace Database\Seeders;

use App\Models\Admin\JenisPerilaku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisPerilakuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JenisPerilaku::create([
            'kode_jenis' => 'JPKG1',
            'nama_jenis' => 'Salience',
        ]);
        JenisPerilaku::create([
            'kode_jenis' => 'JPKG2',
            'nama_jenis' => 'Euphoria',
        ]);
        JenisPerilaku::create([
            'kode_jenis' => 'JPKG3',
            'nama_jenis' => 'Conflict',
        ]);
        JenisPerilaku::create([
            'kode_jenis' => 'JPKG4',
            'nama_jenis' => 'Tolerance',
        ]);
        JenisPerilaku::create([
            'kode_jenis' => 'JPKG5',
            'nama_jenis' => 'Withdrawal',
        ]);
        JenisPerilaku::create([
            'kode_jenis' => 'JPKG6',
            'nama_jenis' => 'Relapse And Reinstatement',
        ]);
    }
}
