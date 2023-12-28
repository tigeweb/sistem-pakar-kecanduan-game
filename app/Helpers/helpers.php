<?php

use App\Enums\SettingEnum;
use App\Models\Superadmin\Setting;
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
