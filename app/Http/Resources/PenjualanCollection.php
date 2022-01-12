<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class PenjualanCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $kendaraan = $this->kendaraan['kendaraan'];
        unset($kendaraan['_id']);
        return [
            'id' => $this->_id,
            'kendaraan' => $kendaraan,
            "harga_beli" => $this->harga_beli,
            "jumlah" => $this->jumlah,
            "total" => $this->total,
            "tanggal_beli" => $this->tanggal_beli,
            "jenis_kendaraan" => $this->jenis_kendaraan,
        ];
    }
}
