<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\MobilService;
use Exception;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    protected $mobilService;

    public function __construct(MobilService $mobilService)
    {
        $this->mobilService = $mobilService;
    }

    public function index() : Object
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->mobilService->getAll();
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
        $data = $request->only(['mesin','kapasitas_penumpang','tipe']);

        $result = ['status' => 201];

        try {
            $result['data'] = $this->mobilService->store($data);
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
            $result['data'] = $this->mobilService->getById($id);
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
        $data = $request->only(['mesin','kapasitas_penumpang','tipe']);
        $result = ['status' => 200];

        try {
            $result['data'] = $this->mobilService->update($data,$id);
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
            $result['data'] = $this->mobilService->delete($id);
        } catch (Exception $e) {
            $result = [
                'status' => '500',
                'error' => $e->getMessage(),
            ];
        }

        return response()->json($result,$result['status']);
    }
}
