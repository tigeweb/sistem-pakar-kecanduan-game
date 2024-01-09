<?php

namespace Database\Seeders;

use App\Models\Admin\Gejala;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gejala::create([
            'kode_gejala' => 'G1',
            'jenis_perilaku_id' => 1,
            'deskripsi_gejala' => 'Ketika saya bermain game saya tidak
            memperdulikan siapapun bahkan untuk
            kebutuhan diri sendiri, misalnya makan',
        ]);
        Gejala::create([
            'kode_gejala' => 'G2',
            'jenis_perilaku_id' => 1,
            'deskripsi_gejala' => 'Saat saya bermain game saya melupakan
            akan kewajiban contohnya : beribadah karena
            berfikir game lebih penting',
        ]);
        Gejala::create([
            'kode_gejala' => 'G3',
            'jenis_perilaku_id' => 1,
            'deskripsi_gejala' => 'Saat saya makan saya masih selalu berfikir
            untuk bermain game sehingga makan tanpa
            game tidak bisa',
        ]);
        Gejala::create([
            'kode_gejala' => 'G4',
            'jenis_perilaku_id' => 1,
            'deskripsi_gejala' => 'Saat saya bersama orang yang penting
            saya mengabaikan dan memfokuskan
            game karena target dari game tersebut',
        ]);
        Gejala::create([
            'kode_gejala' => 'G5',
            'jenis_perilaku_id' => 1,
            'deskripsi_gejala' => 'Saya merasa insomia berlarut karena berfikir
            bermain game sehingga lupa akan waktu',
        ]);
        Gejala::create([
            'kode_gejala' => 'G6',
            'jenis_perilaku_id' => 2,
            'deskripsi_gejala' => 'Permainan internet membuat saya terhibur
            karena pusing dengan tugas tugas kuliah',
        ]);
        Gejala::create([
            'kode_gejala' => 'G7',
            'jenis_perilaku_id' => 2,
            'deskripsi_gejala' => 'Saya senang apabila memenangkan konten
            permainan',
        ]);
        Gejala::create([
            'kode_gejala' => 'G8',
            'jenis_perilaku_id' => 2,
            'deskripsi_gejala' => 'Saya merasa senang apabila menemukan
            konten game genshin yang baru',
        ]);
        Gejala::create([
            'kode_gejala' => 'G9',
            'jenis_perilaku_id' => 2,
            'deskripsi_gejala' => 'Saya selalu tersenyum dan tertawa saat
            bermain game genshin impact',
        ]);
        Gejala::create([
            'kode_gejala' => 'G10',
            'jenis_perilaku_id' => 2,
            'deskripsi_gejala' => 'Setiap kawan saya merekomendasikan
            permainan internet selalu membuat rasa ingin
            dan penasaran sehingga menjadi suatu
            kebiasaan yang baru',
        ]);
        Gejala::create([
            'kode_gejala' => 'G11',
            'jenis_perilaku_id' => 3,
            'deskripsi_gejala' => 'Saya jarang membantu orang tua di rumah
            karena sibuk dengan game',
        ]);
        Gejala::create([
            'kode_gejala' => 'G12',
            'jenis_perilaku_id' => 3,
            'deskripsi_gejala' => ' Saya sering menolak dan membantah apabila
            disuruh orang tua yang sedang
            membutuhkan bantuan sehingga membuat
            orang tua marah',
        ]);
        Gejala::create([
            'kode_gejala' => 'G13',
            'jenis_perilaku_id' => 3,
            'deskripsi_gejala' => 'Ketika saya kalah dari game saya menjadi
            kurang ahli dan membuat tantangan ke diri
            saya sendiri sehingga mencoba sampai bisa
            dan akhirnya menjadi kecanduan di diri saya',
        ]);
        Gejala::create([
            'kode_gejala' => 'G14',
            'jenis_perilaku_id' => 3,
            'deskripsi_gejala' => 'Disaat saya sedang bermain game orang
            disekeliling saya adalah musuh bagi saya',
        ]);
        Gejala::create([
            'kode_gejala' => 'G15',
            'jenis_perilaku_id' => 3,
            'deskripsi_gejala' => 'Ketika bermain game bersama kawan dan
            kalah dalam bermain game itu hal yang
            memunculkan pertengkaran',
        ]);
        Gejala::create([
            'kode_gejala' => 'G16',
            'jenis_perilaku_id' => 4,
            'deskripsi_gejala' => 'Orang tua harus memenuhi kebutuhan saya
            agar saya tidak marah',
        ]);
        Gejala::create([
            'kode_gejala' => 'G17',
            'jenis_perilaku_id' => 4,
            'deskripsi_gejala' => 'Saya bermain game harus mencapai target
            yang telah ditentukan itu menjadi kepuasan
            dan kebahagian terbesar saya',
        ]);
        Gejala::create([
            'kode_gejala' => 'G18',
            'jenis_perilaku_id' => 4,
            'deskripsi_gejala' => 'Kawan saya yang mengikuti game bersama
            saya harus mengikuti cara kerja saya',
        ]);
        Gejala::create([
            'kode_gejala' => 'G19',
            'jenis_perilaku_id' => 4,
            'deskripsi_gejala' => 'Kemenangan berkali" dalam game
            adalah kepuasan bagi saya',
        ]);
        Gejala::create([
            'kode_gejala' => 'G20',
            'jenis_perilaku_id' => 5,
            'deskripsi_gejala' => 'Saya mengaku merasa gelisah apabila sehari
            tidak bermain game',
        ]);
        Gejala::create([
            'kode_gejala' => 'G21',
            'jenis_perilaku_id' => 5,
            'deskripsi_gejala' => 'Dimanapun dan kapan pun game harus selalu
            saya lakukan karna membuat saya lebih
            tenang',
        ]);
        Gejala::create([
            'kode_gejala' => 'G22',
            'jenis_perilaku_id' => 5,
            'deskripsi_gejala' => 'Merasa panik ketika tidak bermain game',
        ]);
        Gejala::create([
            'kode_gejala' => 'G23',
            'jenis_perilaku_id' => 6,
            'deskripsi_gejala' => 'Saya menambah keseringan/intensitas waktu
            bermain saya',
        ]);
        Gejala::create([
            'kode_gejala' => 'G24',
            'jenis_perilaku_id' => 6,
            'deskripsi_gejala' => 'Ketika saya bermain game, saya selalu
            meningkatkan level permainan selama
            kurang lebih 5-10 menit',
        ]);
        Gejala::create([
            'kode_gejala' => 'G25',
            'jenis_perilaku_id' => 6,
            'deskripsi_gejala' => 'Saya yang pada awalnya bermain permainan
            selama 1 jam permainan, namun semakin
            lama semakin bertambah pula intensitas
            waktu saya untuk bermain game
            ',
        ]);
    }
}
