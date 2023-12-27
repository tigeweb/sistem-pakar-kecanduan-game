<?php

namespace App\Enums;

enum JenisKelaminEnum: string
{
    case LAKI_LAKI = 'Laki-laki';
    case PEREMPUAN = 'Perempuan';

    public static function toAssocArray()
    {
        return [
            'l' => self::LAKI_LAKI,
            'p' => self::PEREMPUAN,
        ];
    }
}
