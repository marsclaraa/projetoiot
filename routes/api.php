<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\SensorController;
use App\Models\Sensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/registro/create', [RegistroController::class, "store"]);

Route::get('/sensor', [SensorController::class, "find"]);

Route::put('/sensor/update', [SensorController::class, "update"]);

Route::get('/sensor/index', [SensorController::class, "index"]);

Route::get('/sensor/{id}/show', [SensorController::class, "show"]);

