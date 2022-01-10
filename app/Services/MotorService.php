<?php

namespace App\Services;

use App\Repository\KendaraanRepository;
use App\Repository\MotorRepository;
use Exception;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class MotorService
{
    protected $motorRepository;
    protected $kendaraanRepository;

    public function __construct(MotorRepository $motor,KendaraanRepository $kendaraanRepository)
    {
        $this->motorRepository = $motor;
        $this->kendaraanRepository = $kendaraanRepository;
    }

    public function getAll() : Object
    {
        $dataMotor = $this->motorRepository->getAll();

        return $dataMotor;
    }

    public function getById($id) : Object
    {
        try {
            $dataMotor = $this->motorRepository->getById($id);
        } catch (Exception $e) {
            throw new InvalidArgumentException("Error Data Not Found");
        }
        return $dataMotor;
    }

    public function store($data) : Object
    {
        $validator = Validator::make($data,[
            'kendaraan_id' => 'required',
            'mesin' => 'required',
            'tipe_suspensi' => 'required',
            'tipe_transmisi' => 'required',
            'stock' => 'required',
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $kendaraan = $this->kendaraanRepository->getById($data['kendaraan_id']);

        $data['kendaraan'] = $kendaraan;
        $result = $this->motorRepository->store($data);
        return $result;

    }

    public function update($data,$id) : Object
    {
        $validator = Validator::make($data,[
            'mesin' => 'required',
            'tipe_suspensi' => 'required',
            'tipe_transmisi' => 'required',
            'stock' => 'required',
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());

        }

        $result = $this->motorRepository->update($data,$id);
        return $result;

    }

    public function delete($id) : Object
    {

        $result = $this->motorRepository->delete($id);
        return $result;

    }

}
