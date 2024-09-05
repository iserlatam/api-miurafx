<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeguimientoStoreRequest;
use App\Http\Requests\SeguimientoUpdateRequest;
use App\Http\Resources\SeguimientoCollection;
use App\Http\Resources\SeguimientoResource;
use App\Models\Seguimiento;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SeguimientoController extends Controller
{
    public function index(Request $request): SeguimientoCollection
    {
        $seguimientos = Seguimiento::all();

        return new SeguimientoCollection($seguimientos);
    }

    public function store(SeguimientoStoreRequest $request): SeguimientoResource
    {
        $seguimiento = Seguimiento::create($request->validated());

        return new SeguimientoResource($seguimiento);
    }

    public function show(Request $request, Seguimiento $seguimiento): SeguimientoResource
    {
        return new SeguimientoResource($seguimiento);
    }

    public function update(SeguimientoUpdateRequest $request, Seguimiento $seguimiento): SeguimientoResource
    {
        $seguimiento->update($request->validated());

        return new SeguimientoResource($seguimiento);
    }

    public function destroy(Request $request, Seguimiento $seguimiento): Response
    {
        $seguimiento->delete();

        return response()->noContent();
    }
}
