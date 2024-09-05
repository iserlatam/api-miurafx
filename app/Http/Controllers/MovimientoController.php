<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovimientoStoreRequest;
use App\Http\Requests\MovimientoUpdateRequest;
use App\Http\Resources\MovimientoCollection;
use App\Http\Resources\MovimientoResource;
use App\Models\Movimiento;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MovimientoController extends Controller
{
    public function index(Request $request): MovimientoCollection
    {
        $movimientos = Movimiento::all();

        return new MovimientoCollection($movimientos);
    }

    public function store(MovimientoStoreRequest $request): MovimientoResource
    {
        $movimiento = Movimiento::create($request->validated());

        return new MovimientoResource($movimiento);
    }

    public function show(Request $request, Movimiento $movimiento): MovimientoResource
    {
        return new MovimientoResource($movimiento);
    }

    public function update(MovimientoUpdateRequest $request, Movimiento $movimiento): MovimientoResource
    {
        $movimiento->update($request->validated());

        return new MovimientoResource($movimiento);
    }

    public function destroy(Request $request, Movimiento $movimiento): Response
    {
        $movimiento->delete();

        return response()->noContent();
    }
}
