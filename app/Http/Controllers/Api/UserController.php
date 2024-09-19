<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\ProvidersUserCollection;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\Cliente;
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

    public function providersIndex(): JsonResponse
    {
        return (new ProvidersUserCollection(User::all()))->response();
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): JsonResponse
    {
        return (new UserResource($user))->response();
    }

    public function providersStore(UserRequest $request)
    {

        $fullName = "$request->first_name $request->last_name";

        // Verificar si el correo ya existe en la base de datos
        $existingUser = User::where('email', $request->email)->first();

        if ($existingUser) {
            // Si el usuario ya existe, puedes manejar el error de la forma que desees
            return response()->json([
                'message' => 'This email has been already taken',
            ], 400); // Error 400: Bad Request
        }


        $newUser = [
            "nombre_completo" => $fullName,
            "email" => $request->email,
            "celular" => $request->phone,
            "pais" => $request->country,
            // "password" => Hash::make($request->password),
            "password" => Hash::make("Aa123456"),
        ];

        // Creación del usuario
        $user = User::create($newUser);

        // Asignar rol al usuario
        $user->assignRole('cliente');

        $cliente = Cliente::create([
            'estado' => 'nuevo',
            'fase' => 'prospecto nuevo',
            'origen' => 'petróleo',
            'saldo' => 0.00,
            'user_id' => $user->id,
        ]);

        // Response
        return response()->json([
            'message' => 'User created succesfully',
            'CustomerID' => $user->id,
            'status' => 201,
        ], 201);
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
