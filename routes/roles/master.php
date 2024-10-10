<?php

use App\Http\Controllers\Api\AsignacionesController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\Helpers\UserExcelController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\SeguimientoController;
use Illuminate\Support\Facades\Route;

// Master
Route::middleware(['auth:sanctum', 'role:master'])->group(function () {
    // Users, Clientes, Movimientos -> update, delete
    Route::apiResource('users', UserController::class)->only([
        'destroy'
    ]);

    Route::delete('/users/delete/clienteId/{id}', [UserController::class, 'deleteUserByClienteId']);

    // Upload users
    Route::post('/users/import', [UserExcelController::class, 'import'])->name('import');

    // Special users route
    Route::get('/providers/users', [UserController::class, 'providersIndex']);

    Route::post('/providers/users/create', [UserController::class, 'providersStore']);

    Route::apiResource('clientes', ClienteController::class)->only([
        'destroy'
    ]);

    Route::put('clientes/{id}/saldo/actualizar', [ClienteController::class, 'changeSaldo']);

    Route::apiResource('movimientos', MovimientoController::class)->only([
        'update',
        'destroy'
    ]);

    Route::put('movimientos/estado/{id}', [MovimientoController::class, 'updateStatus']);

    Route::apiResource('seguimientos', SeguimientoController::class)->only([
        'update',
        'destroy'
    ]);

    // Asignar rol
    Route::put('users/roles/asignar/{id}', [AsignacionesController::class, 'assignRole']);

    // Asignar cliente y perfil
    Route::put('clientes/asignar/{id}', [AsignacionesController::class, 'assignProfile']);

    // Obtener unicamente ID Cliente
    Route::get('clientes/get/user-id/{id}', [ClienteController::class, 'getClienteUserId']);

    Route::put('asignaciones/{id}/updateAccesor', [AsignacionesController::class, 'updateAccesor']);

    Route::get('asignaciones/clienteId/{clientId}', [AsignacionesController::class, 'showBasicData']);
});
