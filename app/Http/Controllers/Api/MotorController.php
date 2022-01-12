<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\MotorService;
use Exception;
use Illuminate\Http\Request;

class MotorController extends Controller
{
    protected $motorService;

    public function __construct(MotorService $motorService)
    {
        $this->middleware('auth:api');
        $this->motorService = $motorService;
    }

    public function index() : Object
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->motorService->getAll();
        } catch (Exception $e) {
            $result = [
                'status' => '500',
                'error' => $e->getMessage(),
            ];
        }

        return response()->json($result,$result['status']);

    }

    public function store(Request $request) : Object
    {
        $data = $request->only(['kendaraan_id','mesin','tipe_suspensi','tipe_transmisi','stock']);

        $result = ['status' => 201];

        try {
            $result['data'] = $this->motorService->store($data);
        } catch (Exception $e) {
            $result = [
                'status' => '422',
                'error' => $e->getMessage(),
            ];
        }

        return response()->json($result,$result['status']);
    }

    public function show($id) : Object
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->motorService->getById($id);
        } catch (Exception $e) {
            $result = [
                'status' => '404',
                'error' => $e->getMessage(),
            ];
        }

        return response()->json($result,$result['status']);
    }

    public function update(Request $request, $id) : Object
    {
        $data = $request->only(['kendaraan_id','mesin','tipe_suspensi','tipe_transmisi','stock']);
        $result = ['status' => 200];

        try {
            $result['data'] = $this->motorService->update($data,$id);
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
            $result['data'] = $this->motorService->delete($id);
        } catch (Exception $e) {
            $result = [
                'status' => '500',
                'error' => $e->getMessage(),
            ];
        }

        return response()->json($result,$result['status']);
    }
}
