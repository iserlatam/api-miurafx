<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovimientoStoreRequest;
use App\Http\Requests\MovimientoUpdateRequest;
use App\Http\Resources\MovimientoCollection;
use App\Http\Resources\MovimientoResource;
use App\Models\Cliente;
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

        $cliente = Cliente::findOrFail(6);

        if ($request->estado == 'aprobado') {
            if ( $cliente->sub_estado != 'ftd') {
                $cliente->update([
                    "sub_estado" => "ftd",
                ]);
            }
        }

        // Actualizar solo la columna 'estado'
        $movimiento->update([
            'estado_solicitud' => $request->estado,
        ]);

        // Retornar una respuesta de éxito
        return response()->json([
            'message' => 'Estado actualizado con éxito',
            'movimiento' => $movimiento,
        ], Response::HTTP_OK);
    }

    public function index(Request $request): MovimientoCollection
    {
        $movimientos = Movimiento::orderBy('id', 'desc')->get();

        return new MovimientoCollection($movimientos);
    }

    public function store(Request $request)
    {

        $cliente = Cliente::findOrFail($request->cliente_id);

        $changeType = $request->tipo_solicitud;

        $clienteSaldo = $cliente->saldo;
        $incomingSaldo =  $request->cantidad;

        $movimientoBody = [
            'radicado' => $request->radicado,
            'tipo_solicitud' => $request->tipo_solicitud,
            'estado_solicitud' => $request->estado_solicitud,
            'metodo_pago' => $request->metodo_pago,
            'fecha_solicitud' => now(),
            'cod_banco_red' => $request->cod_banco_red,
            'no_cuenta_billetera' => $request->no_cuenta_billetera,
            'divisa' => $request->divisa,
            'cantidad' => $request->cantidad,
            'razon_rechazo' => $request->razon_rechazo,
            'documento' => $request->documento,
            'cliente_id' => $request->cliente_id,
        ];

        switch ($changeType) {
            case "retiro":
                if ($incomingSaldo <= $clienteSaldo) {
                    $movimiento = Movimiento::create($movimientoBody);
                    return response()->json(['message' => "¡Solicitud de retiro éxitosa! # Radicado $request->radicado"]);
                } else if ($incomingSaldo >= $clienteSaldo || $clienteSaldo == 0) {
                    return response()->json(['message' => 'No cuentas con fondos suficientes. Recarga tu cuenta']);
                }
                break;
            case "deposito":
                $movimiento = Movimiento::create($movimientoBody);
                return response()->json(['message' => "¡Solicitud de retiro éxitosa! # Radicado $request->radicado"]);
            default:
                return response()->json([
                    "message" => "tipo de solicitud inválida",
                ], Response::HTTP_BAD_REQUEST);
        }
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

    public function showUserMovements(Request $request, $clienteId)
    {
        $movimiento = Movimiento::where('cliente_id', $clienteId)->orderByDesc('id')->get();

        return new MovimientoCollection($movimiento);
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
