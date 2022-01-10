<?php

namespace App\Repository;

use App\Models\Mobil;

class MobilRepository
{
    protected $mobil;
    public function __construct(Mobil $mobil)
    {
        $this->mobil = $mobil;
    }

    public function getAll()
    {
        $dataMobil = $this->mobil->get();
        return $dataMobil;
    }


}
