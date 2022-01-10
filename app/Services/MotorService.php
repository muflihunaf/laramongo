<?php

namespace App\Services;

use App\Repository\MotorRepository;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class MotorService
{
    protected $motorRepository;

    public function __construct(MotorRepository $motor)
    {
        $this->motorRepository = $motor;
    }

    public function getAll()
    {
        $dataMotor = $this->motorRepository->getAll();

        return $dataMotor;
    }

    public function getById($id)
    {
        $dataMotor = $this->motorRepository->getById($id);
        return $dataMotor;
    }

    public function store($data)
    {
        $validator = Validator::make($data,[
            'mesin' => 'required',
            'tipe_suspensi' => 'required',
            'tipe_transmisi' => 'required',
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());

        }

        $result = $this->motorRepository->store($data);
        return $result;

    }

    public function update($data,$id)
    {
        $validator = Validator::make($data,[
            'mesin' => 'required',
            'tipe_suspensi' => 'required',
            'tipe_transmisi' => 'required',
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());

        }

        $result = $this->motorRepository->update($data,$id);
        return $result;

    }

    public function delete($id)
    {

        $result = $this->motorRepository->delete($id);
        return $result;

    }

}
