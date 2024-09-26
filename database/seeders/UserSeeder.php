<?php

namespace Database\Seeders;

use App\Models\Asignacion;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Master user
        $user = User::create([
            'email' => 'datacenter@miurafx.com',
            'password' => Hash::make('..p4ssword$'),
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
            'afiliador' => 'maik',
            'offerName' => 'marketing_aliases',
            'offerWebsite' => 'website.com',
            'comment' => 'this is a comment from a marketing website',
        ]);

        $user->assignRole('master');

        // Master cliente
        $selfCliente = Cliente::create([
            'estado' => 'nuevo',
            'fase' => 'prospecto nuevo',
            'origen' => 'petróleo',
            'saldo' => 0.00,
            'user_id' => $user->id,
        ]);

        // Asignacion
        Asignacion::create([
            "cliente_id" => $selfCliente->id,
            "user_id" => 1,
            "asignacion" => "no asignado"
        ]);
    }
}
