<?php

namespace App\Services;

use App\Repository\MobilRepository;
use Exception;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class MobilService
{
    protected $mobilRepository;

    public function __construct(MobilRepository $mobil)
    {
        $this->mobilRepository = $mobil;
    }
    public function getAll() : Object
    {
        $dataMobil = $this->mobilRepository->getAll();

        return $dataMobil;
    }

    public function getById($id) : Object
    {
        try {
            $dataMobil = $this->mobilRepository->getById($id);
        } catch (Exception $e) {
            throw new InvalidArgumentException("Error Data Not Found");

        }
        return $dataMobil;
    }

    public function store($data) : Object
    {
        $validator = Validator::make($data,[
            'mesin' => 'required',
            'kapasitas_penumpang' => 'required',
            'tipe' => 'required',
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());

        }

        $result = $this->mobilRepository->store($data);
        return $result;

    }

    public function update($data,$id) : Object
    {
        $validator = Validator::make($data,[
            'mesin' => 'required',
            'tipe_suspensi' => 'required',
            'tipe_transmisi' => 'required',
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());

        }

        $result = $this->mobilRepository->update($data,$id);
        return $result;

    }

    public function delete($id) : Object
    {

        $result = $this->mobilRepository->delete($id);
        return $result;

    }

}
