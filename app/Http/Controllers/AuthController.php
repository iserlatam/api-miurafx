<?php

namespace App\Http\Controllers;

use App\Models\Asignacion;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $messages = [
            'email.required' => 'El campo email es obligatorio.',
            'email.email' => 'El campo email debe ser una dirección de correo válida.',
            'email.unique' => 'El correo electrónico ya está registrado.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'dirección.required' => 'El campo dirección es obligatorio.',
            'celular.required' => 'El campo celular es obligatorio.',
            'clave.required' => 'El campo clave es obligatorio.',
            'fecha_nacimiento.required' => 'El campo fecha de nacimiento es obligatorio.',
            'fecha_nacimiento.date' => 'La fecha de nacimiento debe ser una fecha válida.',
            'estado.required' => 'El campo estado es obligatorio.',
            'estado.integer' => 'El estado debe ser un número entero.',
            'ciudad.required' => 'El campo ciudad es obligatorio.',
            'tipo_documento.required' => 'El campo tipo de documento es obligatorio.',
            'documento.required' => 'El campo documento es obligatorio.',
            'documento.unique' => 'El documento ya está registrado.',
            'pais.required' => 'El campo país es obligatorio.',
        ];

        // Validación de los datos de entrada
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'nombre_completo' => 'required|string',
            'celular' => 'required|string|max:15',
            'pais' => 'required|string|max:100',
        ], $messages);

        // Manejo de errores de validación
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        // return response()->json($request);

        // Creación del usuario
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nombre_completo' => $request->nombre_completo,
            'dirección' => $request->dirección,
            'celular' => $request->celular,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'estado' => $request->estado,
            'etiqueta' => $request->etiqueta,
            'ciudad' => $request->ciudad,
            'tipo_documento' => $request->tipo_documento,
            'documento' => $request->documento,
            'método_pago' => $request->método_pago,
            'pais' => $request->pais,
        ]);

        // Asignar rol al usuario
        $user->assignRole('cliente');

        // Asignar el usuario a un cliente de forma automática
        $cliente = Cliente::create([
            'estado' => 'nuevo',
            'fase' => 'prospecto nuevo',
            'origen' => 'BITCOIN',
            'saldo' => 0.00,
            'user_id' => $user->id,
        ]);

        // Asignacion de asesor self
        Asignacion::create([
            "cliente_id" => $cliente->id,
            "user_id" => 1, // Asesor self@miurafx.com
            "asignacion" => "no asignado"
        ]);

        // Retornar respuesta JSON con los datos del usuario creado
        return response()->json([
            'message' => 'Usuario creado exitosamente',
            'cliente_id' => $cliente->id,
        ], 201);
    }

    public function login(Request $request)
    {

        $fields = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $fields['email'])->first();

        if (!$user) {
            return response([
                "message" => "Este correo no está registrado en el sistema",
                "status" => 404
            ], 404);
        }

        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Credenciales incorrectas',
            'status' => Response::HTTP_UNAUTHORIZED,
            ], 401);
        }

        $token = $user->createToken('app-client-token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'Type' => 'Bearer',
            'role' => $user->roles->pluck('name'), // include user role in response
            'id' => $user->id,
            'email' => $user->email,
            'status' => Response::HTTP_OK,
            'cliente_id' => $user->cliente?->id ?? 'usuario no asociado a un cliente',
            'hasCliente' => $user->cliente?->id ? true : false,
        ]);
    }
}
