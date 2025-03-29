<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function getUserInfo()
    {
        // Simulamos datos de usuario
        $userData = [
            'id' => 1,
            'name' => 'Juan Pérez',
            'email' => 'juanperez@example.com'
        ];

        // Usamos el método heredado de BaseController
        return $this->sendSuccessResponse('Usuario encontrado', $userData);
    }

    public function errorExample()
    {
        // Simulación de un error
        return $this->sendErrorResponse('No se encontró el usuario');
    }
}
