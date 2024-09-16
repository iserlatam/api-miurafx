<?php

namespace App\Imports;

use App\Models\Cliente;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Crear el usuario primero
        $user = User::create([
            'email' => $row['email'],
            'password' => 'Aa123456', // Asegúrate de hashear la contraseña
            'nombre_completo' => $row['nombre_completo'],
            'celular' => $row['celular'],
            'campanna' => $row['campanna'],
            'afiliador' => $row['afiliador'],
            'pais' => $row['pais'],
        ]);

        // Asignar el rol después de que el usuario haya sido creado
        $user->assignRole('cliente');

        // Asignar el usuario a un cliente de forma automática
        $cliente = Cliente::create([
            'estado' => 'nuevo',
            'fase' => 'prospecto nuevo',
            'origen' => 'frspot',
            'saldo' => 0.00,
            'user_id' => $user->id,
        ]);

        return $user;
    }
}
