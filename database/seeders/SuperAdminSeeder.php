<?php

namespace Database\Seeders;

use App\Models\Asignacion;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Master user
        $datacenterUser = User::create([
            'email' => 'datacenter@miurafx.com',
            'password' => Hash::make('..p4ssword$'),
            'nombre_completo' => 'Super Master',
            'dirección' => 'miurafx',
            'celular' => '1234567890',
            'fecha_nacimiento' => '1980-01-01',
            'etiqueta' => 'Nuevo',
            'ciudad' => 'miurafx',
            'tipo_documento' => 'CC', // por ejemplo, CC para cédula de ciudadanía
            'documento' => '123456789',
            'método_pago' => 'BTC',
            'pais' => 'Colombia',
            'campanna' => 'miurafx',
            'afiliador' => 'miurafx',
            'offerName' => 'miurafx',
            'offerWebsite' => 'miurafx.com',
            'comment' => 'Super Master User ¡NO BORRAR!',
        ]);

        $datacenterUser->assignRole('master');

        // Master cliente
        $clienteDC = Cliente::create([
            'estado' => 'nuevo',
            'fase' => 'prospecto nuevo',
            'origen' => 'petróleo',
            'saldo' => 0.00,
            'user_id' => $datacenterUser->id,
        ]);

        // Asignacion
        Asignacion::create([
            "cliente_id" => $clienteDC->id,
            "user_id" => 1,
            "asignacion" => "no asignado"
        ]);
    }
}
