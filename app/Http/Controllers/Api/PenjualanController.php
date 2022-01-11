<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use App\Services\PenjualanService;
use Exception;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{

    protected $penjualanService;

    public function __construct(PenjualanService $penjualanService)
    {
        $this->penjualanService = $penjualanService;
    }


    public function index()
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->penjualanService->getAll();
        } catch (Exception $e) {
            $result = [
                'status' => '500',
                'error' => $e->getMessage(),
            ];
        }

        return response()->json($result,$result['status']);

    }

    public function show($id)
    {
        $result = ['status' => 200];
        try {
            $result['data'] = $this->penjualanService->getById($id);
        } catch (Exception $e) {
            $result = [
                'status' => '500',
                'error' => $e->getMessage(),
            ];
        }

        return response()->json($result,$result['status']);
    }

    public function getByJenis($jenis)
    {
        $result = ['status' => 200];
        try {
            $result['data'] = $this->penjualanService->getByJenis($jenis);
        } catch (Exception $e) {
            $result = [
                'status' => '500',
                'error' => $e->getMessage(),
            ];
        }

        return response()->json($result,$result['status']);
    }

    public function store(Request $request)
    {
        $data = $request->only(['kendaraan_id','jumlah','tanggal_beli','jenis_kendaraan']);

        $result = ['status' => 201];
        try {
            $result['data'] = $this->penjualanService->store($data);
        } catch (Exception $e) {
            $result = [
                'status' => '422',
                'error' => $e->getMessage(),
            ];
        }

        return response()->json($result,$result['status']);
    }

    public function destroy($id)
    {
        $result = ['status' => 200];
        try {
            $result['data'] = $this->penjualanService->delete($id);
        } catch (Exception $e) {
            $result = [
                'status' => '500',
                'error' => $e->getMessage(),
            ];
        }

        return response()->json($result,$result['status']);
    }
}
