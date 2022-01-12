<?php

namespace App\Repository;

use App\Http\Resources\KendaraanCollection;
use App\Models\Kendaraan;

class KendaraanRepository
{
    protected $kendaraan;
    public function __construct(Kendaraan $kendaraan)
    {
        $this->kendaraan = $kendaraan;
    }
    public function getAll() : Object
    {
        $kendaraan = $this->kendaraan->get();
        return KendaraanCollection::collection($kendaraan);
    }

    public function getById($id)
    {
        $kendaraan = $this->kendaraan::where('_id',$id)->get();
        return $kendaraan;
    }

    public function store($data) : Object
    {
        $dataBaru = new $this->kendaraan;
        $dataBaru->tahun_keluaran = $data['tahun_keluaran'];
        $dataBaru->warna = $data['warna'];
        $dataBaru->harga = $data['harga'];

        $dataBaru->save();
        return $dataBaru->fresh();
    }

    public function update($data,$id) : Object
    {
        $dataUpdate = $this->kendaraan::find($id);
        $dataUpdate->tahun_keluaran = $data['tahun_keluaran'];
        $dataUpdate->warna = $data['warna'];
        $dataUpdate->harga = $data['harga'];
        $dataUpdate->save();

        return $dataUpdate->fresh();
    }
    public function delete($id) : Object
    {
        $dataDelete = $this->kendaraan::find($id);
        $dataDelete->delete();
        return $dataDelete;
    }
}
