<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Berkas extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $fillable = [
        'surat_permohonan_id',
        'stblkk',
        'sipi_sikpi',
        'slo',
        'estimasi_produksi_per_trip',
        'jadwal_rencana_pengisian_minyak_solar',
        'realisasi_pengisian_bbm_sebelumnya',
        'estimasi_sisa_minyak_solar_dikapal',
        'surat_kuasa',
        'produksi_per_jenis_ikan',
        'spb',
        'daftar_abk',
    ];

    public function surat_permohonan()
    {
        return $this->belongsTo(SuratPermohonan::class);
    }

    public function surat_rekomendasi()
    {
        return $this->hasOne(SuratRekomendasi::class);
    }

    protected $hidden = [];
}
