<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MovimientoController;
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

// All
require __DIR__ . "/roles/all.php";
// Master
require __DIR__ . "/roles/master.php";
// Master, Monitor
require __DIR__ . "/roles/masterMonitor.php";
// Master, Monitor, Accesor
require __DIR__ . "/roles/masterMonitorAccesor.php";

// Guest users
Route::get('/clientes/generar-key/{userId}', [ClienteController::class, 'generarKey'])->name('cliente.generarKey');

Route::post('movimientos/key/{key}', [MovimientoController::class, 'storeWithKey']);
