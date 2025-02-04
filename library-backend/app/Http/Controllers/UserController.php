<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Para usar el BCRYPT
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $user = User::where('email', $request['email'])->first(); // Buscamos si el EMAIL ya existe

        // Si existe, mostramos mensaje de YA EXISTENTE
        if($user)
        {
            $response['status'] = 1;
            $response['message'] = 'Email Already Exists';
            $response['code'] = 409;
        }
        // Si no existe, creamos el user y devolvemos respuesta de CREADO
        else {
            $user = User::Create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => password_hash($request->email, PASSWORD_BCRYPT)
            ]);

            $response['status'] = 1;
            $response['message'] = 'User Registered Successfully';
            $response['code'] = 200;
        }

        return response()->json($response);
    }
}
