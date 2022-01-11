<?php

namespace App\Repository;


use App\Models\Penjualan;

class PenjualanRepository
{
    protected $penjualan;
    public function __construct(Penjualan $penjualan)
    {
        $this->penjualan = $penjualan;
    }
    public function getAll() : Object
    {
        $dataPenjualan = $this->penjualan->get();
        return $dataPenjualan;
    }

    public function getById($id) : Object
    {
        $dataPenjualan = $this->penjualan::findOrfail($id);
        return $dataPenjualan;
    }

    public function getByJenis($jenis) : Object
    {
        $dataPenjualan = $this->penjualan::where('jenis_kendaraan',$jenis)->get();
        return $dataPenjualan;
    }

    public function store($data) : Object
    {

        $dataBaru = new $this->penjualan;
        $dataBaru->kendaraan = $data['kendaraan'];
        $dataBaru->harga_beli = $data['harga'];
        $dataBaru->jumlah = $data['jumlah'];
        $dataBaru->total = $data['harga'] * $data['jumlah'];
        $dataBaru->tanggal_beli = $data['tanggal_beli'];
        $dataBaru->jenis_kendaraan = $data['jenis_kendaraan'];
        $dataBaru->save();

        return $dataBaru->fresh();
    }


    public function delete($id) : Object
    {
        $dataDelete = $this->penjualan::find($id);
        $dataDelete->delete();

        return $dataDelete;
    }


}
