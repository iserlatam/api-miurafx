<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helpers\HandleKeysHelper;
use App\Http\Requests\ClienteStoreRequest;
use App\Http\Requests\ClienteUpdateRequest;
use App\Http\Resources\ClienteCollection;
use App\Http\Resources\ClienteResource;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClienteController extends Controller
{

    // Función para generar la key codificada en base64 y redirigir
    public function generarKey($userId)
    {
        $keys = HandleKeysHelper::generarKey($userId);

        // Redirigir a la ruta cliente.deposito con la key codificada
        return response()->json([
            "key" => $keys[0],
            "clear_key" => $keys[1],
            "login_url" => HandleKeysHelper::getClientKeyUrl($userId),
        ]);
    }

    public function changeSaldo(Request $request, $id)
    {
        // Encontrar el cliente por su ID
        $cliente = Cliente::findOrFail($id);
        $changeType = $request->tipo;

        $oldSaldo = $cliente->saldo;
        $incomingSaldo =  $request->saldo;

        switch ($changeType) {
            case "retiro":
                if ($incomingSaldo <= $oldSaldo) {
                    $finalSaldo = $oldSaldo - $incomingSaldo;
                } else if ($incomingSaldo >= $oldSaldo || $oldSaldo == 0) {
                    return response()->json(['message' => 'El cliente no cuenta con fondos suficientes']);
                }
                break;

            case "deposito":
                $finalSaldo = $oldSaldo + $incomingSaldo;
                break;

            default:
                return response()->json([
                    "message" => "tipo de solicitud inválida",
                ], Response::HTTP_BAD_REQUEST);
        }


        // Actualizar solo la columna 'saldo'
        $cliente->update([
            'saldo' => $finalSaldo,
        ]);

        // Retornar una respuesta de éxito
        return response()->json([
            'message' => 'Saldo actualizado con éxito',
            'cliente_id' => $cliente->id,
            'saldo_anterior' => $oldSaldo,
            'saldo_nuevo' => $finalSaldo
        ], Response::HTTP_OK);
    }

    public function getSaldo($id)
    {
        // Encontrar el cliente por su ID
        $cliente = Cliente::findOrFail($id);

        // Retornar una respuesta de éxito
        return response()->json([
            'saldo' => $cliente->saldo
        ], 200);
    }

    public function getRetiros($id)
    {
        // Encontrar el cliente por su ID
        $cliente = Cliente::where('id', $id)
            ->with(['movimientos' => function ($query) {
                // Filtrar solo los movimientos de tipo 'retiro'
                $query->where('tipo_solicitud', 'retiro');
            }])
            ->get();

        $totalRetiros = $cliente->first()->movimientos->sum('cantidad');

        // Retornar una respuesta de éxito
        return response()->json([
            "total_retiros" => $totalRetiros
        ], 200);
    }

    public function getClienteUserId($id)
    {
        // Encontrar el cliente por su ID
        $cliente = Cliente::findOrFail($id);

        // Retornar una respuesta de éxito
        return response()->json([
            'id' => $cliente->user->id
        ], 200);
    }


    public function index(Request $request): ClienteCollection
    {
        $clientes = Cliente::all();

        return new ClienteCollection($clientes);
    }

    public function store(ClienteStoreRequest $request): ClienteResource | JsonResponse
    {
        // Buscar si ya existe un cliente con el user_id proporcionado
        $existingCliente = Cliente::where('user_id', $request->user_id)->first();

        // Si ya existe, devolver un error
        if ($existingCliente) {
            return response()->json([
                'message' => 'El usuario ya está asociado a un cliente.',
            ], 422);
        }

        $cliente = Cliente::create($request->validated());

        return new ClienteResource($cliente);
    }

    public function show(Request $request, Cliente $cliente): ClienteResource
    {
        return new ClienteResource($cliente);
    }

    public function update(Request $request, $id): ClienteResource
    {
        $cliente = Cliente::findOrFail($id);

        $cliente->update([
            "estado" => $request->estado,
            "fase" => $request->fase,
            "origen" => $request->origen
        ]);

        return new ClienteResource($cliente);
    }

    public function destroy(Request $request, Cliente $cliente): Response
    {
        $cliente->delete();

        return response()->noContent();
    }
}
