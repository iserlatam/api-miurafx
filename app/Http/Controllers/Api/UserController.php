<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\HandleKeysHelper;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\ProvidersUserCollection;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\Asignacion;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return (new UserCollection(User::orderByDesc('id')->get()))->response();
    }

    public function providersIndex(): JsonResponse
    {
        // $usersBasicFiltering = QueryBuilder::for(User::class)
        //     ->allowedFilters(["pais", "created_at"])
        //     ->where('id', '>', 3)
        //     ->get();

        $usersAdvancedFiltering = QueryBuilder::for(User::class)
            ->allowedFilters([
                'cliente.estado',
                'pais',
                'afiliador',
                AllowedFilter::scope('starts_between'),
                AllowedFilter::scope('starts_before'),
                AllowedFilter::scope('starts_after'),
            ])
            ->where([
                ['id', '!=', '20'],
                ['id', '>', '3']
            ])
            ->get();

        return (new ProvidersUserCollection(
            // User::where('id', '>', 3)->filter()->get()
            // $usersBasicFiltering
            $usersAdvancedFiltering
        )
            // User::filter()->get()
        )->response();
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): JsonResponse
    {
        return (new UserResource($user))->response();
    }

    public function store(UserRequest $request)
    {
        // Verificar si el correo ya existe en la base de datos
        $existingUser = User::where('email', $request->email)->first();

        if ($existingUser) {
            // Si el usuario ya existe, puedes manejar el error de la forma que desees
            return response()->json([
                'message' => 'This email has been already taken',
            ], 400); // Error 400: Bad Request
        }

        $newUser = [
            "nombre_completo" => $request->nombre_completo,
            "celular" => $request->celular,
            "fecha_nacimiento" => $request->fecha_nacimiento,
            "pais" => $request->pais,
            "dirección" => $request->direccion,
            "email" => $request->email,
            "documento" => $request->documento,
            "tipo_documento" => $request->tipo_documento,
            "etiqueta" => $request->etiqueta,
            "afiliador" => $request->afiliador,
            "password" => Hash::make("Aa123456"),
        ];

        // Creación del usuario
        $user = User::create($newUser);

        // Asignar rol al usuario
        $user->assignRole('cliente');

        // Asignar nuevo cliente
        $cliente = Cliente::create([
            'estado' => 'nuevo',
            'fase' => 'prospecto nuevo',
            'origen' => 'petróleo',
            'saldo' => 0.00,
            'user_id' => $user->id,
        ]);

        $selfAccesor = Asignacion::findOrFail(1);

        // Asignacion de asesor self
        Asignacion::create([
            "cliente_id" => $cliente->id,
            "user_id" => $selfAccesor->id,
            "asignacion" => "no asignado"
        ]);

        // Response
        return response()->json([
            'message' => 'Usuario creado éxitosamente',
            'CustomerID' => $user->id,
            'status' => 201,
            "autologin_url" => HandleKeysHelper::getClientKeyUrl($cliente->id),
            "user_credentials" => [
                "email" => $user->email,
                "password" => "Aa123456",
                "login_url" => "http://localhost:8000/iniciar-sesion"
            ],
        ], 201);
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
            'offerName' => $request->offerName,
            'offerWebsite' => $request->offerWebsite,
            'comment' => $request->comment,
            'afiliador' => $request->afiliador,
            // "password" => Hash::make($request->password),
            "password" => Hash::make("Aa123456"),
        ];

        // Creación del usuario
        $user = User::create($newUser);

        // Asignar rol al usuario
        $user->assignRole('cliente');

        // Asignar nuevo cliente
        $cliente = Cliente::create([
            'estado' => "pending",
            'sub_estado' => "pending",
            'fase' => 'prospecto nuevo',
            'origen' => 'petróleo',
            'saldo' => 0.00,
            'user_id' => $user->id,
        ]);

        // Asignacion de asesor self
        Asignacion::create([
            "cliente_id" => $cliente->id,
            "user_id" => 1,
            "asignacion" => "no asignado"
        ]);

        // Response
        return response()->json([
            'message' => 'User created succesfully',
            'CustomerID' => $user->id,
            'status' => 201,
            "autologin_url" => HandleKeysHelper::getClientKeyUrl($cliente->id),
            "user_credentials" => [
                "email" => $user->email,
                "password" => "Aa123456",
                "login_url" => "http://localhost:8000/iniciar-sesion"
            ],
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



    public function resetPassword(Request $request)
    {
        // Buscar el usuario por email
        $user = User::where('email', $request->email)->first();

        if ($user) {

            $user->update(
                [
                    'password' => Hash::make($request->password)
                ]
            );

            $user->refresh();

            // Respuesta de éxito
            return response()->json([
                'message' => 'Contraseña reseteada éxitosamente',
            ], 200);
        }

        // Si no se encuentra el usuario
        return response()->json([
            'message' => 'Usuario no encontrado',
        ], 404);
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

    public function deleteUserByClienteId($id)
    {
        // Encuentra al usuario
        $user = User::findOrFail($id);

        // Encuentra el cliente asociado al usuario
        $cliente = $user->cliente;

        if ($cliente) {
            // Elimina todas las asignaciones asociadas al cliente
            $cliente->asignaciones()->delete();

            // Elimina al cliente
            $cliente->delete();
        }

        // Finalmente, elimina al usuario
        $user->delete();

        return response()->json([
            "message" => "Usuario eliminado satisfactoriamente de la base de datos",
        ], Response::HTTP_NO_CONTENT);
    }
}
