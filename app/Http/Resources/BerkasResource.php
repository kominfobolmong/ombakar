<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BerkasResource extends JsonResource
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
            'id'                                    => $this->id,
            'stblkk'                                => $this->stblkk,
            'sipi_sikpi'                            => $this->sipi_sikpi,
            'slo'                                   => $this->slo,
            'estimasi_produksi_per_trip'            => $this->estimasi_produksi_per_trip,
            'jadwal_rencana_pengisian_minyak_solar' => $this->jadwal_rencana_pengisian_minyak_solar,
            'realisasi_pengisian_bbm_sebelumnya'    => $this->realisasi_pengisian_bbm_sebelumnya,
            'estimasi_sisa_minyak_solar_dikapal'    => $this->estimasi_sisa_minyak_solar_dikapal,
            'surat_kuasa'                           => $this->surat_kuasa,
            'produksi_per_jenis_ikan'               => $this->produksi_per_jenis_ikan,
            'spb'                                   => $this->spb,
            'daftar_abk'                            => $this->daftar_abk,
            'created_at'                            => $this->created_at->format('d-m-Y'),
            'surat_permohonan'                      => $this->surat_permohonan,
        ];
    }
}
