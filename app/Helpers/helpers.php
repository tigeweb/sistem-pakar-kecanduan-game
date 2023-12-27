<?php

use App\Enums\SettingEnum;
use App\Models\Superadmin\Setting;

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
