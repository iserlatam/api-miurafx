<?php

use App\Http\Controllers\Api\AsignacionesController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\SeguimientoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Shared routes

// Master, Monitor, Accesor
Route::middleware(['auth:sanctum', 'role:master|monitor|accesor'])->group(function () {

    // Users -> index, show
    Route::apiResource('users', UserController::class)->only([
        'index'
    ]);

    // Clientes -> index, show
    Route::apiResource('clientes', ClienteController::class)->only([
        'index',
    ]);

    // Monitor -> index, show
    Route::apiResource('movimientos', MovimientoController::class)->only([
        'index',
        'show'
    ]);

    Route::apiResource('seguimientos', SeguimientoController::class)->only([
        'index',
        'show',
        'store'
    ]);

    Route::get('seguimientos/buscar/cliente/id/{id}', [SeguimientoController::class, 'filterByClienteId']);

    Route::apiResource('asignaciones', AsignacionesController::class)->only([
        'index',
        'store',
        'show'
    ]);
});
