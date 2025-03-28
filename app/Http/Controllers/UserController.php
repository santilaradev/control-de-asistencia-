<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Método para obtener todos los usuarios activos
    public function getActiveUsers()
    {
        // Obtener todos los usuarios activos
        $activeUsers = User::active()->get();

        // Retornar los usuarios activos como respuesta JSON
       // Retornar la vista y pasarle los usuarios activos
       return view('users.index', compact('activeUsers'));
    }

    public function show($id)
    {
        // Buscar al usuario por ID
        $user = User::find($id);

        // Verificar si el usuario existe
        if (!$user) {
            return redirect()->route('users.index')->with('error', 'User not found');
        }

        // Formatear la fecha de creación
        $formattedDate = $user->getCreatedAtFormatted();

        // Retornar la vista con el usuario y su fecha formateada
        return view('users.show', compact('user', 'formattedDate'));
    }
}