<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(){
        try{
            return response()->json([
                "user" => UserResource::make(Auth::user()), 
                "message" => "Datos del usuario",
                "status" => 201
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Error al obtener los datos del usuario", 
                "error" => $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }
}
