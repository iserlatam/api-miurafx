<?php

namespace App\Http\Controllers\Helpers;

class HandleKeysHelper
{
    public static function generarKey($userId): array
    {
        $secretPhrase = 'par4ngaricut1rimicu4ro'; // Frase secreta
        $data = "{$userId},{$secretPhrase}"; // Formato de la cadena
        $encodedKey = base64_encode($data); // Codificar en base64
        $decodedKey = base64_decode($encodedKey);

        return [$encodedKey, $decodedKey];
    }

    public static function getClientKeyUrl($userId): string
    {
        $keys = HandleKeysHelper::generarKey($userId);
        $userUniqueUrl = "https://users.miurafx.com/cliente/deposito/$keys[0]";
        return $userUniqueUrl;
    }
}
