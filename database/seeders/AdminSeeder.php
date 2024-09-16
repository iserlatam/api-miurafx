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
            'email' => 'datacenter@miurafx.com',
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
            'campanna' => 'frspot',
            'afiliador' => 'maik'
        ]);

        $datacenterUser->assignRole('master');

        // Master
        $selfUser = User::create([
            'email' => 'self@miurafx.com',
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
            'campanna' => 'frspot',
            'afiliador' => 'maik'
        ]);

        $selfUser->assignRole('master');

        // Master
        $master1User = User::create([
            'email' => 'master1@miurafx.com',
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
            'campanna' => 'frspot',
            'afiliador' => 'maik'
        ]);

        $master1User->assignRole('master');

        // Master
        $masterUser = User::create([
            'email' => 'master@email.com',
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
            'campanna' => 'frspot',
            'afiliador' => 'maik'
        ]);

        $masterUser->assignRole('master');

        // Monitor
        $monitorUser = User::create([
            'email' => 'monitor@email.com',
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
            'campanna' => 'frspot',
            'afiliador' => 'maik'
        ]);
        $monitorUser->assignRole('monitor');

        // Accesor
        $accesorUser = User::create([
            'email' => 'accesor@email.com',
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
            'campanna' => 'frspot',
            'afiliador' => 'maik'
        ]);

        $accesorUser->assignRole('accesor');

        // Cliente
        $clienteUser = User::create([
            'email' => 'cliente@email.com',
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
            'campanna' => 'frspot',
            'afiliador' => 'maik'
        ]);

        $clienteUser->assignRole('cliente');
    }
}
