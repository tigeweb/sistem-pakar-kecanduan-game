<?php

use App\Enums\SettingEnum;
use App\Models\Superadmin\Setting;
use App\Permissions\Permission;
use Carbon\Carbon;

if (!function_exists('get_setting')) {
    function get_setting($tipe)
    {
        return Setting::where('tipe', $tipe)->first()->value;
    }
}

if (!function_exists('get_value_enums')) {
    function get_value_enums(array $data)
    {
        $values = [];

        foreach ($data as $value) {
            $values[] = $value->value;
        }

        return $values;
    }
}

if (!function_exists('format_date_with_day')) {
    function format_date_with_day($date)
    {
        $carbonDate = Carbon::parse($date);

        return $carbonDate->isoFormat('dddd, D MMMM Y');
    }
}

if (!function_exists('generateRandomColors')) {
    function generateRandomColors()
    {
        $background = getRandomColor();
        $text = getRandomColorForText($background);

        return [
            'color' => $text,
            'background_color' => $background,
        ];
    }

    function getRandomColorForText($background)
    {
        list($r, $g, $b) = sscanf($background, "rgb(%d, %d, %d)");
        $brightness = ($r * 299 + $g * 587 + $b * 114) / 1000;
        $lightness = ($brightness > 128) ? mt_rand(0, 127) : mt_rand(128, 255);

        return "hsl(0, 0%, $lightness%)";
    }

    function getRandomColor()
    {
        $hue = mt_rand(0, 360);
        $saturation = mt_rand(50, 100);
        $lightness = mt_rand(20, 70);

        return "hsl($hue, $saturation%, $lightness%)";
    }
}

if (!function_exists('convertHexToRgba')) {
    function convertHexToRgba($hex, $opacity = 0.25)
    {
        // Hapus karakter '#' dari nilai hex
        $hex = str_replace('#', '', $hex);

        // Pisahkan nilai hex menjadi komponen warna (R, G, B)
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));

        // Kembalikan nilai RGBA dalam format string
        return "rgba($r, $g, $b, $opacity)";
    }
}

if (!function_exists('convertRgbaToHex')) {
    function convertRgbaToHex($rgba)
    {
        // Pisahkan nilai RGBA menjadi komponen warna (R, G, B, A)
        preg_match('/\((\d+), (\d+), (\d+), ([\d.]+)\)/', $rgba, $matches);

        // Konversi komponen warna ke format hex
        $r = dechex($matches[1]);
        $g = dechex($matches[2]);
        $b = dechex($matches[3]);

        // Pastikan format hex selalu dua digit
        $r = str_pad($r, 2, '0', STR_PAD_LEFT);
        $g = str_pad($g, 2, '0', STR_PAD_LEFT);
        $b = str_pad($b, 2, '0', STR_PAD_LEFT);

        // Gabungkan nilai hex menjadi satu string
        $hex = "#$r$g$b";

        return $hex;
    }
}

if (!function_exists('is_role_superadmin')) {
    function is_role_superadmin($role)
    {
        return $role === Permission::ROLE_SUPERADMIN;
    }
}
