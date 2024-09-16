<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\SeguimientoController;
use Illuminate\Support\Facades\Route;


// Master, Monitor
Route::middleware(['auth:sanctum', 'role:master|monitor'])->group(function () {

    Route::apiResource('users', UserController::class)->only([
        'store'
    ]);

    Route::apiResource('clientes', ClienteController::class)->only([
        'store'
    ]);
});

