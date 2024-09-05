<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ClienteController
 */
final class ClienteControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $clientes = Cliente::factory()->count(3)->create();

        $response = $this->get(route('clientes.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ClienteController::class,
            'store',
            \App\Http\Requests\ClienteStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $estado = $this->faker->word();
        $fase = $this->faker->word();
        $origen = $this->faker->word();
        $user = User::factory()->create();

        $response = $this->post(route('clientes.store'), [
            'estado' => $estado,
            'fase' => $fase,
            'origen' => $origen,
            'user_id' => $user->id,
        ]);

        $clientes = Cliente::query()
            ->where('estado', $estado)
            ->where('fase', $fase)
            ->where('origen', $origen)
            ->where('user_id', $user->id)
            ->get();
        $this->assertCount(1, $clientes);
        $cliente = $clientes->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $cliente = Cliente::factory()->create();

        $response = $this->get(route('clientes.show', $cliente));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ClienteController::class,
            'update',
            \App\Http\Requests\ClienteUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $cliente = Cliente::factory()->create();
        $estado = $this->faker->word();
        $fase = $this->faker->word();
        $origen = $this->faker->word();
        $user = User::factory()->create();

        $response = $this->put(route('clientes.update', $cliente), [
            'estado' => $estado,
            'fase' => $fase,
            'origen' => $origen,
            'user_id' => $user->id,
        ]);

        $cliente->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($estado, $cliente->estado);
        $this->assertEquals($fase, $cliente->fase);
        $this->assertEquals($origen, $cliente->origen);
        $this->assertEquals($user->id, $cliente->user_id);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $cliente = Cliente::factory()->create();

        $response = $this->delete(route('clientes.destroy', $cliente));

        $response->assertNoContent();

        $this->assertModelMissing($cliente);
    }
}
