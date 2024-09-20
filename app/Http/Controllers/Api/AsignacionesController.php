<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AsignacionRequest;
use App\Http\Resources\AsignacionCollection;
use App\Http\Resources\AsignacionResource;
use App\Models\Asignacion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AsignacionesController extends Controller
{

    public function index(Request $request): AsignacionCollection
    {
        $asignaciones = Asignacion::all();

        return new AsignacionCollection($asignaciones);
    }

    public function show($id): AsignacionResource
    {
        $asignacion = Asignacion::findOrFail($id);

        return new AsignacionResource($asignacion);
    }

    public function store(AsignacionRequest $request): AsignacionResource
    {
        $movimiento = Asignacion::create($request->all());

        return new AsignacionResource($movimiento);
    }

    /**
     *  Asign a new role based on the ID
     */
    public function assignRole(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $newRole = $request->role;

        $user->syncRoles($newRole);

        return response()->json([
            "message" => "Role actualizado con éxito",
            "user" => $user,
        ]);
    }

    /**
     * Assign a profile to a client
     */
    public function updateAccesor(Request $request, string $id)
    {
        $asignacion = Asignacion::findOrFail($id);

        $asignacion->update([
            "user_id" => $request->accesor_id
        ]);

        // Retornar una respuesta de éxito
        return response()->json([
            'message' => 'Asesor asignado con éxito nuevamente',
            'asignacion' => $asignacion,
        ], Response::HTTP_OK);
    }
}
