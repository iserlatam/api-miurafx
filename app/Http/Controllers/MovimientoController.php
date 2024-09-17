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

        $movimiento = Movimiento::create($request->all());

        return new MovimientoResource($movimiento);
    }

    public function storeWithKey(Request $request, $key)
    {

        // Decodificar la key en base64
        $decodedKey = base64_decode($key);

        // Verificar si la key contiene la palabra "par4ngaricut1rimicu4ro"
        if (strpos($decodedKey, 'par4ngaricut1rimicu4ro') === false) {
            return response()->json(['error' => 'Key inválida'], 400); // Si no contiene, error
        }

        // Extraer el userId de la key decodificada
        [$userId, $secretPhrase] = explode(',', $decodedKey);

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
