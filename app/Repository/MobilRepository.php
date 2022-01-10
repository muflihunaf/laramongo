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

    public function getById($id) : Object
    {
        $dataMobil = $this->mobil::findOrfail($id);
        return $dataMobil;
    }

    public function store($data) : Object
    {
        $dataBaru = new $this->mobil;
        $dataBaru->kendaraan = $data['kendaraan'];
        $dataBaru->mesin = $data['mesin'];
        $dataBaru->kapasitas_penumpang = $data['kapasitas_penumpang'];
        $dataBaru->tipe = $data['tipe'];
        $dataBaru->save();

        return $dataBaru->fresh();
    }

    public function update($data,$id) : Object
    {
        $dataUpdate = $this->mobil::find($id);
        $dataUpdate->kendaraan = $data['kendaraan'];
        $dataUpdate->mesin = $data['mesin'];
        $dataUpdate->kapasitas_penumpang = $data['kapasitas_penumpang'];
        $dataUpdate->tipe = $data['tipe'];
        $dataUpdate->save();

        return $dataUpdate->fresh();
    }
    public function delete($id) : Object
    {
        $dataDelete = $this->mobil::find($id);
        $dataDelete->delete();

        return $dataDelete;
    }

}
