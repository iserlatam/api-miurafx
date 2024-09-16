<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Master
        $datacenterUser = User::create([
            'email' => 'datacenter@email.com',
            'password' => Hash::make('password'),
            'nombre_completo' => 'Habid Sarif',
            'dirección' => '123 Main St',
            'celular' => '1234567890',
            'fecha_nacimiento' => '1980-01-01',
            'etiqueta' => 'Contactado',
            'ciudad' => 'Ciudad Ejemplo',
            'tipo_documento' => 'CC', // por ejemplo, CC para cédula de ciudadanía
            'documento' => '123456789',
            'método_pago' => 'Tarjeta de Crédito',
            'pais' => 'Colombia',
        ]);

        $datacenterUser->assignRole('master');

        // Master
        $selfUser = User::create([
            'email' => 'self@email.com',
            'password' => Hash::make('password'),
            'nombre_completo' => 'Habid Sarif',
            'dirección' => '123 Main St',
            'celular' => '1234567890',
            'fecha_nacimiento' => '1980-01-01',
            'etiqueta' => 'Contactado',
            'ciudad' => 'Ciudad Ejemplo',
            'tipo_documento' => 'CC', // por ejemplo, CC para cédula de ciudadanía
            'documento' => '123456789',
            'método_pago' => 'Tarjeta de Crédito',
            'pais' => 'Colombia',
        ]);

        $selfUser->assignRole('master');

        // Master
        $master1User = User::create([
            'email' => 'master1@email.com',
            'password' => Hash::make('password'),
            'nombre_completo' => 'Habid Sarif',
            'dirección' => '123 Main St',
            'celular' => '1234567890',
            'fecha_nacimiento' => '1980-01-01',
            'etiqueta' => 'Contactado',
            'ciudad' => 'Ciudad Ejemplo',
            'tipo_documento' => 'CC', // por ejemplo, CC para cédula de ciudadanía
            'documento' => '123456789',
            'método_pago' => 'Tarjeta de Crédito',
            'pais' => 'Colombia',
        ]);

        $master1User->assignRole('master');
    }
}
