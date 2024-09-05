<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Cliente;
use App\Models\Movimiento;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\MovimientoController
 */
final class MovimientoControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $movimientos = Movimiento::factory()->count(3)->create();

        $response = $this->get(route('movimientos.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\MovimientoController::class,
            'store',
            \App\Http\Requests\MovimientoStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $radicado = $this->faker->word();
        $tipo_solicitud = $this->faker->word();
        $estado_solicitud = $this->faker->word();
        $metodo_pago = $this->faker->word();
        $fecha_solicitud = Carbon::parse($this->faker->date());
        $divisa = $this->faker->word();
        $cantidad = $this->faker->word();
        $razon_rechazo = $this->faker->word();
        $documento = $this->faker->word();
        $cliente = Cliente::factory()->create();

        $response = $this->post(route('movimientos.store'), [
            'radicado' => $radicado,
            'tipo_solicitud' => $tipo_solicitud,
            'estado_solicitud' => $estado_solicitud,
            'metodo_pago' => $metodo_pago,
            'fecha_solicitud' => $fecha_solicitud->toDateString(),
            'divisa' => $divisa,
            'cantidad' => $cantidad,
            'razon_rechazo' => $razon_rechazo,
            'documento' => $documento,
            'cliente_id' => $cliente->id,
        ]);

        $movimientos = Movimiento::query()
            ->where('radicado', $radicado)
            ->where('tipo_solicitud', $tipo_solicitud)
            ->where('estado_solicitud', $estado_solicitud)
            ->where('metodo_pago', $metodo_pago)
            ->where('fecha_solicitud', $fecha_solicitud)
            ->where('divisa', $divisa)
            ->where('cantidad', $cantidad)
            ->where('razon_rechazo', $razon_rechazo)
            ->where('documento', $documento)
            ->where('cliente_id', $cliente->id)
            ->get();
        $this->assertCount(1, $movimientos);
        $movimiento = $movimientos->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $movimiento = Movimiento::factory()->create();

        $response = $this->get(route('movimientos.show', $movimiento));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\MovimientoController::class,
            'update',
            \App\Http\Requests\MovimientoUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $movimiento = Movimiento::factory()->create();
        $radicado = $this->faker->word();
        $tipo_solicitud = $this->faker->word();
        $estado_solicitud = $this->faker->word();
        $metodo_pago = $this->faker->word();
        $fecha_solicitud = Carbon::parse($this->faker->date());
        $divisa = $this->faker->word();
        $cantidad = $this->faker->word();
        $razon_rechazo = $this->faker->word();
        $documento = $this->faker->word();
        $cliente = Cliente::factory()->create();

        $response = $this->put(route('movimientos.update', $movimiento), [
            'radicado' => $radicado,
            'tipo_solicitud' => $tipo_solicitud,
            'estado_solicitud' => $estado_solicitud,
            'metodo_pago' => $metodo_pago,
            'fecha_solicitud' => $fecha_solicitud->toDateString(),
            'divisa' => $divisa,
            'cantidad' => $cantidad,
            'razon_rechazo' => $razon_rechazo,
            'documento' => $documento,
            'cliente_id' => $cliente->id,
        ]);

        $movimiento->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($radicado, $movimiento->radicado);
        $this->assertEquals($tipo_solicitud, $movimiento->tipo_solicitud);
        $this->assertEquals($estado_solicitud, $movimiento->estado_solicitud);
        $this->assertEquals($metodo_pago, $movimiento->metodo_pago);
        $this->assertEquals($fecha_solicitud, $movimiento->fecha_solicitud);
        $this->assertEquals($divisa, $movimiento->divisa);
        $this->assertEquals($cantidad, $movimiento->cantidad);
        $this->assertEquals($razon_rechazo, $movimiento->razon_rechazo);
        $this->assertEquals($documento, $movimiento->documento);
        $this->assertEquals($cliente->id, $movimiento->cliente_id);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $movimiento = Movimiento::factory()->create();

        $response = $this->delete(route('movimientos.destroy', $movimiento));

        $response->assertNoContent();

        $this->assertModelMissing($movimiento);
    }
}
