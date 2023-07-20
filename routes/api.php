<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Api routes v1
Route::group(['prefix' => 'v1'], function () {
    Route::post('/register', [authController::class, 'register']);
    Route::post('/login', [authController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [authController::class, 'logout']);
        Route::get('/user/info', [UserController::class, 'show']);
    });
});
