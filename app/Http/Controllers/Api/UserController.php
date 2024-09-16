<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return (new UserCollection(User::all()))->response();
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): JsonResponse
    {
        return (new UserResource($user))->response();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): UserResource
    {
        $user->update($request->only([
            'email',
            'nombre_completo',
            'dirección',
            'celular',
            'fecha_nacimiento',
            'etiqueta',
            'ciudad',
            'tipo_documento',
            'documento',
            'método_pago',
            'pais',
        ]));

        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        Log::info("User ID {$user->id} deleted successfully.");

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
