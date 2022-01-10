<?php

namespace App\Repository;

use App\Models\Kendaraan;

class KendaraanRepository
{
    public function getAll()
    {
        $kendaraan = Kendaraan::all();

        return response()->json($kendaraan, 200);
    }
}
