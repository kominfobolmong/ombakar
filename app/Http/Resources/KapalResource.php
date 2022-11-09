<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KapalResource extends JsonResource
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
            'id'           => $this->id,
            'nama_kapal'   => $this->nama_kapal,
            'nama_pemilik' => $this->nama_pemilik,
            'pk_gt'        => $this->pk_gt,
            'alamat_usaha' => $this->alamat_usaha,
            'jenis_usaha'  => $this->jenis_usaha,
            'created_at'   => $this->created_at->format('d-m-Y'),
            'user'         => $this->user
        ];
    }
}
