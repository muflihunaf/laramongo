<?php

namespace App\Repository;

use App\Http\Resources\MobilCollection;
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
        return MobilCollection::collection($dataMobil);
    }

    public function getById($id) : Object
    {
        $dataMobil = $this->mobil::findOrFail($id);
        return $dataMobil;
    }

    public function store($data) : Object
    {
        $dataBaru = new $this->mobil;
        $dataBaru->kendaraan = $data['kendaraan'][0];
        $dataBaru->mesin = $data['mesin'];
        $dataBaru->kapasitas_penumpang = $data['kapasitas_penumpang'];
        $dataBaru->tipe = $data['tipe'];
        $dataBaru->stock = $data['stock'];
        $dataBaru->save();

        return $dataBaru->fresh();
    }

    public function update($data,$id) : Object
    {
        $dataUpdate = $this->mobil::find($id);
        $dataUpdate->kendaraan = $data['kendaraan'][0];
        $dataUpdate->mesin = $data['mesin'];
        $dataUpdate->kapasitas_penumpang = $data['kapasitas_penumpang'];
        $dataUpdate->tipe = $data['tipe'];
        $dataUpdate->stock = $data['stock'];
        $dataUpdate->save();

        return $dataUpdate->fresh();
    }
    public function delete($id) : Object
    {
        $dataDelete = $this->mobil::findOrfail($id);
        $dataDelete->delete();

        return $dataDelete;
    }

    public function terjual($id,$jumlah)
    {
        $dataUpdate = $this->mobil::findOrfail($id);
        $dataUpdate->stock = $dataUpdate->stock - $jumlah;
        $dataUpdate->save();

        return $dataUpdate->fresh();
    }
}
