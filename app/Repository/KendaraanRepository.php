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
        $kendaraan = $this->kendaraan::find($id);
        return $kendaraan;
    }
}
