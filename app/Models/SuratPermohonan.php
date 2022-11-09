<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuratPermohonan extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $fillable = [
        'kapal_id',
        'penyalur_id',
        'lama_operasional',
        'daerah_operasi',
        'kebutuhan_bbm',
        'pengisian_bulan',
        'status'
    ];

    public function kapal()
    {
        return $this->belongsTo(Kapal::class);
    }

    public function penyalur()
    {
        return $this->belongsTo(Penyalur::class);
    }

    public function berkas()
    {
        return $this->hasOne(Berkas::class);
    }

    protected $hidden = [];
}
