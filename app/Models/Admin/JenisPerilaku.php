<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPerilaku extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_jenis',
        'nama_jenis',
    ];
}
