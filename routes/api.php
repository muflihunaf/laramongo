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
    Route::get('/', [KendaraanController::class, 'index'])->name('api.kendaraan.index');
    Route::post('/', [KendaraanController::class, 'store'])->name('api.kendaraan.store');
    Route::get('/{id}', [KendaraanController::class, 'show'])->name('api.kendaraan.show');
    Route::put('/{id}', [KendaraanController::class, 'update'])->name('api.kendaraan.update');
    Route::delete('/{id}', [KendaraanController::class, 'destroy'])->name('api.kendaraan.delete');
});

Route::group(['middleware' => 'api','prefix' =>'motor'], function () {
    Route::get('/', [MotorController::class, 'index'])->name('api.motor.index');
    Route::post('/', [MotorController::class, 'store'])->name('api.motor.store');
    Route::get('/{id}', [MotorController::class, 'show'])->name('api.motor.show');
    Route::put('/{id}', [MotorController::class, 'update'])->name('api.motor.update');
    Route::delete('/{id}', [MotorController::class, 'destroy'])->name('api.motor.destroy');
});

Route::group(['middleware' => 'api','prefix' =>'mobil'], function () {
    Route::get('/', [MobilController::class, 'index'])->name('api.mobil.index');
    Route::post('/', [MobilController::class, 'store'])->name('api.mobil.store');
    Route::get('/{id}', [MobilController::class, 'show'])->name('api.mobil.show');
    Route::put('/{id}', [MobilController::class, 'update'])->name('api.mobil.update');
    Route::delete('/{id}', [MobilController::class, 'destroy'])->name('api.mobil.destroy');
});

Route::group(['middleware' => 'api','prefix' =>'penjualan'], function () {
    Route::get('/', [PenjualanController::class, 'index'])->name('api.penjualan.index');
    Route::post('/', [PenjualanController::class, 'store'])->name('api.penjualan.store');
    Route::get('/{id}', [PenjualanController::class, 'show'])->name('api.penjualan.show');
    Route::delete('/{id}', [PenjualanController::class, 'destroy'])->name('api.penjualan.destroy');
    Route::get('/jenis/{jenis}', [PenjualanController::class, 'getByJenis'])->name('api.penjualan.jenis');
});

Route::group(['midleware' => 'api', 'prefix' => 'auth'],function (){
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
