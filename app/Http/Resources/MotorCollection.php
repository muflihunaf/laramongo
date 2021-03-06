<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MotorCollection extends JsonResource
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
            "tipe_supensi" => $this->tipe_suspensi,
            "tipe_transmisi" => $this->tipe_transmisi,
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
