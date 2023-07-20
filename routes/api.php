<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SneakersController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Api routes v1
Route::group(['prefix' => 'v1'], function () {
    // Auth
    Route::post('/register', [authController::class, 'register']);
    Route::post('/login', [authController::class, 'login']);
    // Sneakers
    Route::apiResource('/sneakers', SneakersController::class)->only(['index']);
    // Authenticated routes
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [authController::class, 'logout']);
        Route::get('/user/info', [UserController::class, 'show']);
        // Shopping
        Route::apiResource('/user/purchases', PurchaseController::class)->only(['index', 'store']);
        Route::get('/user/purchases/{purchase}', [PurchaseController::class, 'show'])->middleware('check_user_purchase');
    });
});
