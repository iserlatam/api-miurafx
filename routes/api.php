<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MovimientoController;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Shared routes

// Master, Monitor, Accesor
Route::middleware(['auth:sanctum', 'role:master|monitor|accesor'])->group(function () {
    // Users -> index, show
    Route::apiResource('/users', UserController::class)->only([
        'index',
        'show'
    ]);

    // Clientes -> index
    Route::apiResource('clientes', ClienteController::class)->only(['index']);

    // Monitor -> index, show
    Route::apiResource('movimientos', MovimientoController::class)->only(['index', 'show']);
});

Route::middleware(['auth:sanctum', 'role:master|monitor|accesor|cliente'])->group(function () {
    // clientes -> show,
    Route::apiResource('clientes', ClienteController::class)->only('show');
});

// Master, Monitor
Route::middleware(['auth:sanctum', 'role:master|monitor'])->group(function () {
    // Users -> create
    Route::apiResource('movimientos', MovimientoController::class)->only(['store']);
});

Route::apiResource('/users', UserController::class)->only([
    'store'
])->middleware(['auth:sanctum', 'role:master|monitor']);

// Master
Route::middleware(['auth:sanctum', 'role:master'])->group(function () {
    // Users, Clientes, Movimientos -> update, delete
    Route::apiResource('users', UserController::class)->only([
        'update',
        'destroy'
    ]);

    Route::apiResource('clientes', ClienteController::class)->only([
        'update',
        'destroy'
    ]);

    Route::apiResource('movimientos', MovimientoController::class)->only([
        'update',
        'destroy'
    ]);
});
