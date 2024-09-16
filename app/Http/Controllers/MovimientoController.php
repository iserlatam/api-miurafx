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
    // Custom Methods
    public function updateStatus(Request $request, $id)
    {
        // Encontrar el movimiento por su ID
        $movimiento = Movimiento::findOrFail($id);

        // Actualizar solo la columna 'estado'
        $movimiento->update([
            'estado_solicitud' => $request->estado,
        ]);

        // Retornar una respuesta de éxito
        return response()->json([
            'message' => 'Estado actualizado con éxito',
            'movimiento' => $movimiento,
        ], 200);
    }
    public function index(Request $request): MovimientoCollection
    {
        $movimientos = Movimiento::all();

        return new MovimientoCollection($movimientos);
    }

    public function store(Request $request)
    {

        // if ($request->hasFile('documento')) {
        //     return 'tiene documento';
        // } else {
        //     return 'no tiene doc';
        // }

        $movimiento = Movimiento::create($request->all());

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
