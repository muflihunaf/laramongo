<?php

namespace App\Repository;

use App\Models\Motor;

class MotorRepository
{
    protected $motor;
    public function __construct(Motor $motor)
    {
        $this->motor = $motor;
    }
    public function getAll() : Object
    {
        $dataMotor = $this->motor->get();
        return $dataMotor;
    }

    public function getById($id) : Object
    {
        $dataMotor = $this->motor::findOrfail($id);
        return $dataMotor;
    }

    public function store($data) : Object
    {
        $dataBaru = new $this->motor;
        $dataBaru->kendaraan_id = $data['kendaraan'];
        $dataBaru->mesin = $data['mesin'];
        $dataBaru->tipe_suspensi = $data['tipe_suspensi'];
        $dataBaru->tipe_transmisi = $data['tipe_transmisi'];
        $dataBaru->stock = $data['stock'];
        $dataBaru->save();

        return $dataBaru->fresh();
    }

    public function update($data,$id) : Object
    {
        $dataUpdate = $this->motor::find($id);
        $dataUpdate->kendaraan = $data['kendaraan'];
        $dataUpdate->mesin = $data['mesin'];
        $dataUpdate->tipe_suspensi = $data['tipe_suspensi'];
        $dataUpdate->tipe_transmisi = $data['tipe_transmisi'];
        $dataUpdate->save();

        return $dataUpdate->fresh();
    }
    public function delete($id) : Object
    {
        $dataDelete = $this->motor::find($id);
        $dataDelete->delete();

        return $dataDelete;
    }
}
