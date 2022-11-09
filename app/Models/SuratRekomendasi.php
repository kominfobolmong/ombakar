<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuratRekomendasi extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $guarded = [];

    public function berkas()
    {
        return $this->belongsTo(Berkas::class);
    }

    protected $hidden = [];
}
