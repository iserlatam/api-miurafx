<?php

namespace App\Http\Controllers\Helpers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserExcelRequest;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Exceptions\LaravelExcelException;

class UserExcelController extends Controller
{
    public function import(Request $request)
    {
        try {

            // return response()->json([
            //     "file" => $request->file('file'),
            // ]);

            // Importar el archivo utilizando la clase UsersImport
            Excel::import(
                new UsersImport,
                $request->file('file')
            );

            // Redirigir con un mensaje de éxito
            return response()->json([
                "message" => 'Datos importados con éxito!',
            ], HttpResponse::HTTP_OK);
        } catch (LaravelExcelException $laravelExcelException) {
            return response()->json([
                "message" => "Hubo un error en el servidor",
                "details" => $laravelExcelException->getMessage()
            ]);
        }
    }
}
