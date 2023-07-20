<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class authController extends Controller
{
    public function register(Request $request)
    {
        $validatorRequest = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
        ]);

        if($validatorRequest->fails()){
            return response()->json([
                'message' => 'Validación fallida',
                'errors' => $validatorRequest->errors(),
            ], 400);
        }

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->save();

        $tokenUser = $user->createToken('Personal Access Token')->plainTextToken;

        return response()->json([
            'user' => UserResource::make($user),
            'token' => $tokenUser,
            'token_type' => 'Bearer',
            'message' => 'Usuario creado exitosamente!',
        ], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'email|required',
            'password' => 'required|string|min:8',
        ]);
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'No autorizado',
            ], 401);
        }

        auth()->user()->tokens()->delete();

        $user = User::where('email', $request->email)->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user' => UserResource::make($user),
            'token' => $token,
            'token_type' => 'Bearer',
            'message' => 'Login exitoso',
        ], 201);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logout exitoso',
        ], 201);
    }
}
