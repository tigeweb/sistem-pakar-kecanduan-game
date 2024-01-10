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
            'solusi' => 'Membuat Jadwal dan Urutan Prioritas',
            'keterangan_solusi' => 'Pembuatan jadwal dan urutan prioritas kegiatan sehari–harimu dapat
            membantu kamu untuk lebih bertanggung jawab terhadap tugas atau
            tanggung jawab pekerjaan.',
        ]);
        JenisPerilaku::create([
            'kode_jenis' => 'JPKG2',
            'nama_jenis' => 'Euphoria',
            'solusi' => 'Menekuni minat dan hobi yang tidak menggunakan
            internet',
            'keterangan_solusi' => 'Kamu dapat melakukan kegiatan lain seperti berolahraga, menyanyi,
            memasak, menari, bermain musik, mengikuti kegiatan organisasi di tempat
            ibadah atau di lingkungan rumah, dan lainnya.'
        ]);
        JenisPerilaku::create([
            'kode_jenis' => 'JPKG3',
            'nama_jenis' => 'Conflict',
            'solusi' => 'Rilekskan diri jika Anda mulai marah atau kesal.',
            'keterangan_solusi' => 'Kamu bisa menarik napas panjang dan merilekskan otot adalah cara
            mudah dan efektif untuk meredakan emosi negatif yang memuncak
            sehingga Anda tidak melakukan hal yang akan disesali.
            '
        ]);
        JenisPerilaku::create([
            'kode_jenis' => 'JPKG4',
            'nama_jenis' => 'Tolerance',
            'solusi' => 'Menggunakan Aplikasi yang Dapat Membatasi
            Penggunaan game secara berlebihan',
            'keterangan_solusi' => 'Aplikasi yang dapat digunakan seperti timer atau memasang alarm
            untuk membatasi durasi bermain game dan bisa menahan diri dari
            merugikan orang lain demi kepuasaan sesaat.'
        ]);
        JenisPerilaku::create([
            'kode_jenis' => 'JPKG5',
            'nama_jenis' => 'Withdrawal',
            'solusi' => 'Menonaktifkan pemberitahuan (notifikasi)
            ',
            'keterangan_solusi' => 'Untuk mengurangi keinginan terus-menerus bermain game, kamu
            dapat menonaktifkan pemberitahuan dari game.'
        ]);
        JenisPerilaku::create([
            'kode_jenis' => 'JPKG6',
            'nama_jenis' => 'Relapse And Reinstatement',
            'solusi' => 'Catat waktu bermain',
            'keterangan_solusi' => 'Semakin kamu mencatat waktu yang kamu habiskan untuk main
            game, maka semakin baik kamu akan bisa mengontrolnya'
        ]);
    }
}
