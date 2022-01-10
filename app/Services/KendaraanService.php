<?php

namespace App\Services;


use App\Repository\KendaraanRepository;

class KendaraanService
{
    protected $kendaraanRepository;

    public function __construct(KendaraanRepository $kendaraan)
    {
        $this->kendaraanRepository = $kendaraan;
    }

    public function getAll()
    {
        $kendaraan = $this->kendaraanRepository->getAll();

        return $kendaraan;
    }
}
