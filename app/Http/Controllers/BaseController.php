<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    // Respuesta de éxito
    public function successResponse($data, $message = 'Success', $code = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    // Respuesta de error
    public function errorResponse($error, $code = 400)
    {
        return response()->json([
            'success' => false,
            'message' => $error,
        ], $code);
    }
}

