<?php

namespace Database\Seeders;

use App\Enums\SettingEnum;
use App\Models\Superadmin\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'tipe' => SettingEnum::COPYRIGHT->value,
            'value' => "client"
        ]);
        Setting::create([
            'tipe' => SettingEnum::LISENSI->value,
            'value' => "1"
        ]);
        Setting::create([
            'tipe' => SettingEnum::LISENSI_LINK->value,
            'value' => "http://tigeweb.com"
        ]);
        Setting::create([
            'tipe' => SettingEnum::LISENSI_NAME->value,
            'value' => "TigeWeb"
        ]);
        Setting::create([
            'tipe' => SettingEnum::LOGO_TITLE->value,
            'value' => "Material Return Terpadu"
        ]);
        Setting::create([
            'tipe' => SettingEnum::LOGO_MRT->value,
            'value' => "data:image/png;base64,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"
        ]);
        Setting::create([
            'tipe' => SettingEnum::GAMBAR_SIDEBAR->value,
            'value' => asset('assets-mrtui/images/bg_login.png')
        ]);
    }
}
