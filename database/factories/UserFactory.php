<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('Aa123456'), // Mantener la contraseña fija
            'nombre_completo' => $this->faker->name,
            'dirección' => $this->faker->address,
            'celular' => $this->faker->phoneNumber,
            'fecha_nacimiento' => $this->faker->date(),
            'etiqueta' => 'Contactado',
            'ciudad' => $this->faker->city,
            'tipo_documento' => 'CC', // O cualquier tipo de documento
            'documento' => $this->faker->randomNumber(9, true),
            'método_pago' => 'theter',
            'pais' => $this->faker->country,
            'campanna' => 'test campaña',
            'afiliador' => "test afiliador",
            'offerName' => 'marketing_aliases',
            'offerWebsite' => $this->faker->domainName,
            'comment' => $this->faker->sentence,
        ];
    }
}
