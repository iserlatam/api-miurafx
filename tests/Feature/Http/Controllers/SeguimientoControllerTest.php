<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\;
use App\Models\Cliente;
use App\Models\Seguimiento;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SeguimientoController
 */
final class SeguimientoControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $seguimientos = Seguimiento::factory()->count(3)->create();

        $response = $this->get(route('seguimientos.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SeguimientoController::class,
            'store',
            \App\Http\Requests\SeguimientoStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $ultimo_contacto = Carbon::parse($this->faker->date());
        $observaciones = $this->faker->text();
        $cliente = Cliente::factory()->create();
        $user = ::factory()->create();

        $response = $this->post(route('seguimientos.store'), [
            'ultimo_contacto' => $ultimo_contacto->toDateString(),
            'observaciones' => $observaciones,
            'cliente_id' => $cliente->id,
            'user_id' => $user->id,
        ]);

        $seguimientos = Seguimiento::query()
            ->where('ultimo_contacto', $ultimo_contacto)
            ->where('observaciones', $observaciones)
            ->where('cliente_id', $cliente->id)
            ->where('user_id', $user->id)
            ->get();
        $this->assertCount(1, $seguimientos);
        $seguimiento = $seguimientos->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $seguimiento = Seguimiento::factory()->create();

        $response = $this->get(route('seguimientos.show', $seguimiento));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SeguimientoController::class,
            'update',
            \App\Http\Requests\SeguimientoUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $seguimiento = Seguimiento::factory()->create();
        $ultimo_contacto = Carbon::parse($this->faker->date());
        $observaciones = $this->faker->text();
        $cliente = Cliente::factory()->create();
        $user = ::factory()->create();

        $response = $this->put(route('seguimientos.update', $seguimiento), [
            'ultimo_contacto' => $ultimo_contacto->toDateString(),
            'observaciones' => $observaciones,
            'cliente_id' => $cliente->id,
            'user_id' => $user->id,
        ]);

        $seguimiento->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($ultimo_contacto, $seguimiento->ultimo_contacto);
        $this->assertEquals($observaciones, $seguimiento->observaciones);
        $this->assertEquals($cliente->id, $seguimiento->cliente_id);
        $this->assertEquals($user->id, $seguimiento->user_id);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $seguimiento = Seguimiento::factory()->create();

        $response = $this->delete(route('seguimientos.destroy', $seguimiento));

        $response->assertNoContent();

        $this->assertModelMissing($seguimiento);
    }
}
