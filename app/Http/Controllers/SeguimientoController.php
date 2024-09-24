<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeguimientoStoreRequest;
use App\Http\Requests\SeguimientoUpdateRequest;
use App\Http\Resources\SeguimientoCollection;
use App\Http\Resources\SeguimientoResource;
use App\Models\Seguimiento;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class SeguimientoController extends Controller
{
    public function index(Request $request): SeguimientoCollection
    {
        $seguimientos = Seguimiento::all();

        return new SeguimientoCollection($seguimientos);
    }

    public function filterByClienteId($id)
    {
        $seguimientos = Seguimiento::where('cliente_id', $id)
            ->get();

        if (count($seguimientos) == 0) {
            return response()->json([
                "message" => "No se encontraron seguimiento asociados a este ID",
                "status" => Response::HTTP_NOT_FOUND,
            ]);
        }

        return new SeguimientoCollection($seguimientos);
    }

    public function store(SeguimientoStoreRequest $request): SeguimientoResource | JsonResponse
    {

        $currentUser = $request->user();

        if (!$currentUser->hasAnyRole(["accesor", "monitor", "master"])) {
            return response()->json([
                "message" => "permiso denegado"
            ], 403);
        } else {
            $seguimiento = Seguimiento::create($request->all());
            return response()->json([
                "message" => "Seguimiento creado correctamente",
                "result" => $seguimiento,
            ]);
            // return new SeguimientoResource($seguimiento);
        }
    }

    public function show(Request $request, Seguimiento $seguimiento): SeguimientoResource
    {
        return new SeguimientoResource($seguimiento);
    }

    public function showByClientId(Request $request, $cliente_id): SeguimientoResource
    {
        // Buscar el seguimiento por client_id
        $seguimiento = Seguimiento::where('cliente_id', $cliente_id)
                ->orderByDesc("ultimo_contacto")
                ->first();

        // Verificar si existe el seguimiento
        if (!$seguimiento) {
            return response()->json([
                'message' => 'No movements associated with this client.'
            ], 404); // Código de estado 404 (No encontrado)
        }

        // Si existe, retornar el recurso
        return new SeguimientoResource($seguimiento);
    }

    public function update(SeguimientoUpdateRequest $request, Seguimiento $seguimiento): SeguimientoResource
    {
        $seguimiento->update($request->validated());

        return new SeguimientoResource($seguimiento);
    }

    public function destroy(Request $request, Seguimiento $seguimiento): Response
    {
        $seguimiento->delete();

        return response()->noContent();
    }
}
