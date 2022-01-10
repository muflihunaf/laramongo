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
        $this->motorService = $motorService;
    }
    public function index()
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only(['mesin','tipe_suspensi','tipe_transmisi']);

        $result = ['status' => 201];

        try {
            $result['data'] = $this->motorService->store($data);
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
            $result['data'] = $this->motorService->getById($id);
        } catch (Exception $e) {
            $result = [
                'status' => '500',
                'error' => $e->getMessage(),
            ];
        }

        return response()->json($result,$result['status']);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only(['mesin','tipe_suspensi','tipe_transmisi']);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Motor  $motor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
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
