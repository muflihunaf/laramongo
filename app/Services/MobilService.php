<?php

namespace App\Services;

use App\Repository\MobilRepository;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class MobilService
{
    protected $mobilRepository;

    public function __construct(MobilRepository $mobil)
    {
        $this->mobilRepository = $mobil;
    }
    public function getAll() : Array
    {
        $dataMobil = $this->mobilRepository->getAll();

        return $dataMobil;
    }

}
