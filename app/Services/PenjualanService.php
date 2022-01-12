<?php

namespace App\Services;

use App\Repository\MotorRepository;
use App\Repository\PenjualanRepository;
use Exception;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class PenjualanService
{
    protected $penjualanRepository;
    protected $motorService;
    protected $mobilService;
    public function __construct(PenjualanRepository $penjualanRepository,MotorService $motorService, MobilService $mobilService)
    {
        $this->penjualanRepository = $penjualanRepository;
        $this->motorService = $motorService;
        $this->mobilService = $mobilService;
    }

    public function getAll() : Object
    {
        $dataPenjualan = $this->penjualanRepository->getAll();

        return $dataPenjualan;
    }

    public function getById($id) : Object
    {
        try {
            $dataMotor = $this->penjualanRepository->getById($id);
            if($dataMotor->isEmpty()){
                throw new InvalidArgumentException("Error Data Kendaraan Not Found");
                }
        } catch (Exception $e) {
            throw new InvalidArgumentException($e->getMessage());
        }
        return $dataMotor;
    }

    public function getByJenis($jenis) : Object
    {
        try {
            $dataMotor = $this->penjualanRepository->getByJenis($jenis);
        } catch (Exception $e) {
            throw new InvalidArgumentException("Error Data Not Found");
        }
        return $dataMotor;
    }

    public function store($data) : Object
    {
        $validator = Validator::make($data,[
            'kendaraan_id' => 'required',
            'jumlah' => 'required|numeric',
            'tanggal_beli' => 'required',
            'jenis_kendaraan' => 'required|in:motor,mobil'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        if ($data['jenis_kendaraan'] == 'motor') {
            $kendaraan = $this->motorService->getById($data['kendaraan_id']);
            $this->motorService->penjualan($kendaraan->id,$data['jumlah'],$kendaraan->stock);
        }else{
            $kendaraan = $this->mobilService->getById($data['kendaraan_id']);
            $this->mobilService->penjualan($kendaraan->id,$data['jumlah'],$kendaraan->stock);
        }
        $data['harga'] = $kendaraan->kendaraan['harga'];
        $data['kendaraan'] = $kendaraan->toArray();
        unset($data['kendaraan']['stock']);
        $result = $this->penjualanRepository->store($data);

        return $result;
    }


    public function delete($id) : Object
    {
        try {
            $dataMotor = $this->penjualanRepository->delete($id);
        } catch (Exception $e) {
            throw new InvalidArgumentException("Error Data Not Found");
        }
        return $dataMotor;

    }

}
