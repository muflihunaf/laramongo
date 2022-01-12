<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\KendaraanController;
use App\Http\Controllers\Api\MobilController;
use App\Http\Controllers\Api\MotorController;
use App\Http\Controllers\Api\PenjualanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'api','prefix' =>'kendaraan'], function () {
    Route::get('/', [KendaraanController::class, 'index']);
    Route::post('/', [KendaraanController::class, 'store']);
    Route::get('/{id}', [KendaraanController::class, 'show']);
    Route::put('/{id}', [KendaraanController::class, 'update']);
    Route::delete('/{id}', [KendaraanController::class, 'destroy']);
});

Route::group(['middleware' => 'api','prefix' =>'motor'], function () {
    Route::get('/', [MotorController::class, 'index']);
    Route::post('/', [MotorController::class, 'store']);
    Route::get('/{id}', [MotorController::class, 'show']);
    Route::put('/{id}', [MotorController::class, 'update']);
    Route::delete('/{id}', [MotorController::class, 'destroy']);
});

Route::group(['middleware' => 'api','prefix' =>'mobil'], function () {
    Route::get('/', [MobilController::class, 'index']);
    Route::post('/', [MobilController::class, 'store']);
    Route::get('/{id}', [MobilController::class, 'show']);
    Route::put('/{id}', [MobilController::class, 'update']);
    Route::delete('/{id}', [MobilController::class, 'destroy']);
});

Route::group(['middleware' => 'api','prefix' =>'penjualan'], function () {
    Route::get('/', [PenjualanController::class, 'index']);
    Route::post('/', [PenjualanController::class, 'store']);
    Route::get('/{id}', [PenjualanController::class, 'show']);
    Route::delete('/{id}', [PenjualanController::class, 'destroy']);
    Route::get('/jenis/{jenis}', [PenjualanController::class, 'getByJenis']);
});

Route::group(['midleware' => 'api', 'prefix' => 'auth'],function (){
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
