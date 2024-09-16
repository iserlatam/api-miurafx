<?php

namespace App\Imports;

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
            'dirección' => $row['direccion'],
            'celular' => $row['celular'],
            'fecha_nacimiento' => $row['fecha_nacimiento'],
            'etiqueta' => $row['etiqueta'],
            'ciudad' => $row['ciudad'],
            'tipo_documento' => $row['tipo_documento'],
            'documento' => $row['documento'],
            'método_pago' => $row['metodo_pago'],
            'pais' => $row['pais'],
        ]);

        // Asignar el rol después de que el usuario haya sido creado
        $user->assignRole('cliente');

        return $user;
    }
}
