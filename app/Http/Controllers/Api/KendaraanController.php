<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\KendaraanService;
use Exception;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{

    protected $kendaraanService;

    public function __construct(KendaraanService $kendaraanService)
    {
        $this->middleware('auth:api');
        $this->kendaraanService = $kendaraanService;
    }

    public function index()
    {
        $result = ['status' => 200];
        try {
            $result['data'] = $this->kendaraanService->getAll();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result,$result['status']);
    }


    public function store(Request $request)
    {
        $data = $request->only(['tahun_keluaran','warna','harga']);

        $result = ['status' => 201];

        try {
            $result['data'] = $this->kendaraanService->store($data);
        } catch (Exception $e) {
            $result = [
                'status' => '422',
                'error' => $e->getMessage(),
            ];
        }

        return response()->json($result,$result['status']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = ['status' => 200,'message' => 'Success'];
        try {
            $result['data'] = $this->kendaraanService->getById($id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result,$result['status']);

    }

    public function update(Request $request, $id) : Object
    {
        $data = $request->only(['tahun_keluaran','warna','harga']);
        $result = ['status' => 200];

        try {
            $result['data'] = $this->kendaraanService->update($data,$id);
        } catch (Exception $e) {
            $result = [
                'status' => '500',
                'error' => $e->getMessage(),
            ];
        }

        return response()->json($result,$result['status']);
    }


    public function destroy($id) : Object
    {
        $result = ['status' => 200];
        try {
            $result['data'] = $this->kendaraanService->delete($id);
        } catch (Exception $e) {
            $result = [
                'status' => '500',
                'error' => $e->getMessage(),
            ];
        }

        return response()->json($result,$result['status']);
    }
}
