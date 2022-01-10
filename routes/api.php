<?php

use App\Http\Controllers\Api\KendaraanController;
use App\Http\Controllers\Api\MobilController;
use App\Http\Controllers\Api\MotorController;
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

Route::get('/kendaraan', [KendaraanController::class, 'index']);
Route::post('/kendaraan', [KendaraanController::class, 'store']);
Route::get('/kendaraan/{id}', [KendaraanController::class, 'show']);

Route::prefix('motor')->group(function () {
    Route::get('/', [MotorController::class, 'index']);
    Route::post('/', [MotorController::class, 'store']);
    Route::get('/{id}', [MotorController::class, 'show']);
    Route::put('/{id}', [MotorController::class, 'update']);
    Route::delete('/{id}', [MotorController::class, 'destroy']);
});

Route::prefix('mobil')->group(function () {
    Route::get('/', [MobilController::class, 'index']);
    Route::post('/', [MobilController::class, 'store']);
    Route::get('/{id}', [MobilController::class, 'show']);
    Route::put('/{id}', [MobilController::class, 'update']);
    Route::delete('/{id}', [MobilController::class, 'destroy']);
});
