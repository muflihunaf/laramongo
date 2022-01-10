<?php

namespace App\Services;


use App\Repository\KendaraanRepository;
use Exception;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

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

    public function getById($id)
    {
        try {
            $kendaraan = $this->kendaraanRepository->getById($id);
        } catch (Exception $e) {
            throw new InvalidArgumentException("Error Data Not Found");

        }
        return $kendaraan;
    }

    public function store($data) : Object
    {
        $validator = Validator::make($data,[
            'tahun_keluaran' => 'required',
            'warna' => 'required',
            'harga' => 'required',

        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());

        }

        $result = $this->kendaraanRepository->store($data);
        return $result;

    }
}
