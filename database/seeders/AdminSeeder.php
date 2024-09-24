<?php

namespace Database\Seeders;

use App\Models\Asignacion;
use App\Models\Cliente;
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
        // Accesor
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
            'afiliador' => 'maik',
            'offerName' => 'marketing_aliases',
            'offerWebsite' => 'website.com',
            'comment' => 'this is a comment from a marketing website',
        ]);

        $selfUser->assignRole('accesor');

        Cliente::create([
            'estado' => 'nuevo',
            'fase' => 'prospecto nuevo',
            'origen' => 'petróleo',
            'saldo' => 0.00,
            'user_id' => $selfUser->id,
        ]);

        // Master user
        $datacenterUser = User::create([
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
            "user_id" => $selfUser->id,
            "asignacion" => "no asignado"
        ]);

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
            'afiliador' => 'maik',
            'offerName' => 'marketing_aliases',
            'offerWebsite' => 'website.com',
            'comment' => 'this is a comment from a marketing website',
        ]);

        $master1User->assignRole('master');

        $master1Cliente = Cliente::create([
            'estado' => 'nuevo',
            'fase' => 'prospecto nuevo',
            'origen' => 'petróleo',
            'saldo' => 0.00,
            'user_id' => $master1User->id,
        ]);

        // Asignacion
        Asignacion::create([
            "cliente_id" => $master1Cliente->id,
            "user_id" => $selfUser->id,
            "asignacion" => "no asignado"
        ]);
    }
}
