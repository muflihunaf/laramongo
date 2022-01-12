<?php

namespace App\Repository;

use App\Http\Resources\MotorCollection;
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
        return MotorCollection::collection($dataMotor);
    }

    public function getById($id) : Object
    {
        $dataMotor = $this->motor::findOrFail($id);
        return $dataMotor;
    }

    public function store($data) : Object
    {
        $dataBaru = new $this->motor;
        $dataBaru->kendaraan = $data['kendaraan'][0];
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
        $dataUpdate->kendaraan = $data['kendaraan'][0];
        $dataUpdate->mesin = $data['mesin'];
        $dataUpdate->tipe_suspensi = $data['tipe_suspensi'];
        $dataUpdate->tipe_transmisi = $data['tipe_transmisi'];
        $dataUpdate->stock = $data['stock'];
        $dataUpdate->save();

        return $dataUpdate->fresh();
    }
    public function delete($id) : Object
    {
        $dataDelete = $this->motor::findOrfail($id);
        $dataDelete->delete();

        return $dataDelete;
    }

    public function terjual($id,$jumlah)
    {
        $dataUpdate = $this->motor::findOrfail($id);
        $dataUpdate->stock = $dataUpdate->stock - $jumlah;
        $dataUpdate->save();

        return $dataUpdate->fresh();
    }
}
