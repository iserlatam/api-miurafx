<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Cliente;
use App\Models\Movimiento;

class MovimientoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movimiento::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'radicado' => $this->faker->word(),
            'tipo_solicitud' => $this->faker->word(),
            'estado_solicitud' => $this->faker->word(),
            'metodo_pago' => $this->faker->word(),
            'fecha_solicitud' => $this->faker->date(),
            'divisa' => $this->faker->word(),
            'cantidad' => $this->faker->word(),
            'razon_rechazo' => $this->faker->word(),
            'documento' => $this->faker->word(),
            'cliente_id' => Cliente::factory(),
        ];
    }
}
