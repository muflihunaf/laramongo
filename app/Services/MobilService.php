<?php

namespace App\Services;

use App\Repository\MobilRepository;
use Exception;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class MobilService
{
    protected $mobilRepository;
    protected $kendaraanService;

    public function __construct(MobilRepository $mobil,KendaraanService $kendaraanService)
    {
        $this->mobilRepository = $mobil;
        $this->kendaraanService = $kendaraanService;
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
            if($dataMobil->isEmpty()){
                throw new InvalidArgumentException("Error Data Kendaraan Not Found");
            }
        } catch (Exception $e) {
            throw new InvalidArgumentException($e->getMessage());

        }
        return $dataMobil;
    }

    public function store($data) : Object
    {
        $validator = Validator::make($data,[
            'kendaraan_id' => 'required',
            'mesin' => 'required',
            'kapasitas_penumpang' => 'required|numeric',
            'tipe' => 'required',
            'stock' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());

        }



        $kendaraan = $this->kendaraanService->getById($data['kendaraan_id']);
        $data['kendaraan'] = $kendaraan->toArray();

        $result = $this->mobilRepository->store($data);
        return $result;

    }

    public function update($data,$id) : Object
    {
        $validator = Validator::make($data,[
            'kendaraan_id' => 'required',
            'mesin' => 'required',
            'kapasitas_penumpang' => 'required|numeric',
            'tipe' => 'required',
            'stock' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());

        }
        $kendaraan = $this->kendaraanService->getById($data['kendaraan_id']);
        $data['kendaraan'] = $kendaraan->toArray();
        $result = $this->mobilRepository->update($data,$id);
        return $result;

    }

    public function delete($id) : Object
    {

        $result = $this->mobilRepository->delete($id);
        return $result;

    }

    public function penjualan($id,$jumlah,$stock) : Object
    {
        try {
            if($stock < $jumlah){
                throw new InvalidArgumentException("Stock Lebih Kecil Dari Jumlah");
            }
            $dataMobil = $this->mobilRepository->terjual($id,$jumlah);
        } catch (Exception $e) {
            throw new InvalidArgumentException($e->getMessage());
        }
        return $dataMobil;
    }

}
