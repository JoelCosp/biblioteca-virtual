<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Para usar el BCRYPT
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTExceptions;

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
                'password' => Hash::make($request->password)
            ]);

            $response['status'] = 1;
            $response['message'] = 'User Registered Successfully';
            $response['code'] = 200;
        }

        return response()->json($response);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try
        {
            if(!JWTAuth::attempt($credentials))
            {
                $response['status'] = 0;
                $response['code'] = 401;
                $response['data'] = null;
                $response['message'] = 'Email or Password is incorrect';
                return response()->json($response);
            }
        }
        catch(JWTException $e)
        {
            $response['code'] = 500;
            $response['data'] = null;
            $response['message'] = 'Could Not Create Token';
            return response()->json($response);
        }
        $user = auth()->user();
        $data['token'] = auth()->claims([
            'user_id' => $user->id,
            'email' => $user->email
        ])->attempt($credentials);

        $response['status'] = 1;
        $response['code'] = 200;
        $response['data'] = $data;
        $response['message'] = 'Login Successfully';
        return response()->json($response);
    }
}
