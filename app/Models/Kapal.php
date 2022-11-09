<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kapal extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $fillable = [
        'user_id',
        'nama_kapal',
        'nama_pemilik',
        'pk_gt',
        'alamat_usaha',
        'jenis_usaha'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function surat_permohonan()
    {
        return $this->hasOne(SuratPermohonan::class);
    }

    protected $hidden = [];
}
