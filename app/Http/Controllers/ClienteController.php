<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteStoreRequest;
use App\Http\Requests\ClienteUpdateRequest;
use App\Http\Resources\ClienteCollection;
use App\Http\Resources\ClienteResource;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClienteController extends Controller
{
    public function index(Request $request): ClienteCollection
    {
        $clientes = Cliente::all();

        return new ClienteCollection($clientes);
    }

    public function store(ClienteStoreRequest $request): ClienteResource
    {
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
