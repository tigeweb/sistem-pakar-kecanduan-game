<?php

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


if (!function_exists('get_select_data_custom_column')) {
    function get_select_data_custom_column($data, $columnName)
    {
        $values = [];

        foreach ($data as $value) {
            $values[$value->id] = $value->{$columnName};
        }

        return $values;
    }
}

if (!function_exists('get_select_custom')) {
    function get_select_custom($data, $columnName, $valueName)
    {
        $values = [];

        foreach ($data as $value) {
            $values[$value->{$valueName}] = $value->{$columnName};
        }

        return $values;
    }
}
