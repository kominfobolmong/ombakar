<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penyalur extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $fillable = [
        'nama',
        'nomor_lembaga',
        'lokasi'
    ];

    public function surat_permohonans()
    {
        return $this->hasMany(SuratPermohonan::class);
    }

    protected $hidden = [];
}
