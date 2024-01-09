<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_gejala',
        'jenis_perilaku_id',
        'deskripsi_gejala',
    ];

    public function jenis_perilaku()
    {
        return $this->belongsTo(JenisPerilaku::class);
    }
}
