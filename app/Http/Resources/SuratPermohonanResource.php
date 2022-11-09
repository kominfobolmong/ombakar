<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class SuratPermohonanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'               => $this->id,
            'lama_operasional' => $this->lama_operasional,
            'daerah_operasi'   => $this->daerah_operasi,
            'kebutuhan_bbm'    => $this->kebutuhan_bbm,
            'pengisian_bulan'  => $this->pengisian_bulan,
            'status'           => $this->status,
            'created_at'       => Carbon::parse($this->created_at)->format('d-m-Y'),
            'kapal'            => $this->kapal,
            'penyalur'         => $this->penyalur
        ];
    }
}
