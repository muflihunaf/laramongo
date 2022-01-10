<?php

namespace App\Repository;

use App\Models\Kendaraan;

class KendaraanRepository
{
    protected $kendaraan;
    public function __construct(Kendaraan $kendaraan)
    {
        $this->kendaraan = $kendaraan;
    }
    public function getAll()
    {
        $kendaraan = $this->kendaraan->get();
        return $kendaraan;
    }

    public function getById($id)
    {
        $kendaraan = $this->kendaraan::findOrfail($id)->toArray();
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
}
