<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\;
use App\Models\Cliente;
use App\Models\Seguimiento;

class SeguimientoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Seguimiento::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'ultimo_contacto' => $this->faker->date(),
            'observaciones' => $this->faker->text(),
            'cliente_id' => Cliente::factory(),
            'user_id' => ::factory(),
        ];
    }
}
