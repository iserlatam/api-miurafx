<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AsignacionRequest;
use App\Http\Resources\AsignacionCollection;
use App\Http\Resources\AsignacionResource;
use App\Models\Asignacion;
use App\Models\User;
use Illuminate\Http\Request;

class AsignacionesController extends Controller
{

    public function index(Request $request): AsignacionCollection
    {
        $movimientos = Asignacion::all();

        return new AsignacionCollection($movimientos);
    }

    public function store(AsignacionRequest $request): AsignacionResource
    {
        $movimiento = Asignacion::create($request->validated());

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
    public function assignProfile(Request $request, string $id)
    {
        //
    }
}
