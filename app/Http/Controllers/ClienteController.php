<?php

namespace App\Http\Controllers;

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

    public function changeSaldo(Request $request, $id)
    {
        // Encontrar el cliente por su ID
        $cliente = Cliente::findOrFail($id);
        $changeType = $request->tipo;

        $oldSaldo = $cliente->saldo;
        $incomingSaldo =  $request->saldo;


        switch ($changeType) {
            case "retiro":
                $finalSaldo = $oldSaldo - $incomingSaldo;
                break;

            case "deposito":
                // Movimiento validation
                if ($incomingSaldo < 250) {
                    return response()->json(['message' => 'La cantidad de deposito mínima es de 250']);
                }
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

    public function update(ClienteUpdateRequest $request, Cliente $cliente): ClienteResource
    {
        $cliente->update($request->validated());

        return new ClienteResource($cliente);
    }

    public function destroy(Request $request, Cliente $cliente): Response
    {
        $cliente->delete();

        return response()->noContent();
    }
}
