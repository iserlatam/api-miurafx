<?php

// MASTER MONITOR ACCESOR CLIENTE - ALL

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MovimientoController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'role:master|monitor|accesor|cliente'])->group(function () {
    // clientes -> show,
    Route::apiResource('clientes', ClienteController::class)->only('show');

    Route::get('clientes/{id}/saldo', [ClienteController::class, 'getSaldo']);

    Route::apiResource('movimientos', MovimientoController::class)->only([
        'store'
    ]);

    Route::get('movimientos/clienteId/{clienteId}', [MovimientoController::class, 'showUserMovements']);

    Route::get('movimientos/clienteId/{clienteId}', [MovimientoController::class, 'showUserMovements']);

    // Users -> index, show
    Route::apiResource('users', UserController::class)->only([
        'show'
    ]);
});
