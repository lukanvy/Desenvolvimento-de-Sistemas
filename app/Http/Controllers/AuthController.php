<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

public function login(Request $request)
{
    
   $credenciais = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (!Auth::attempt($credenciais)) {
        return response()->json(['message' => 'Credenciais inválidas'], 401);
    }

    $user = Auth::user();
    $token = generateToken($user);

    return response()->json([
    'user' => $user,   
    'token' => $token]);

}

public function register(Request $request)
{
    $dados = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8'],
        'role' => ['required', 'string'],
    ]);

    $dados['password'] = Hahsh::make($dados['password']);

    $user = User::create($dados);
    $token = generateToken($user);

    return response()->json([
        'user' => $user,
        'token' => $token
    ], 201);

}

}
