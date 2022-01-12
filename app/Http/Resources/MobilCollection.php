<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class MobilCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->_id,
            "mesin" => $this->mesin,
            "kapasitas_penumpang" => $this->kapasitas_penumpang,
            "tipe" => $this->tipe,
            "stock" => $this->stock,
            "kendaraan" => [
                "id" => $this->kendaraan['_id'],
                "tahun_keluaran" => $this->kendaraan['tahun_keluaran'],
                "warna" => $this->kendaraan['warna'],
                "harga" => $this->kendaraan['harga'],
            ]
        ];
    }
}
