<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Cliente;
use App\Models\User;

class ClienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cliente::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'estado' => $this->faker->word(),
            'fase' => $this->faker->word(),
            'origen' => $this->faker->word(),
            'user_id' => User::factory(),
        ];
    }
}
