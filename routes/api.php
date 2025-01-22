<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use PHPUnit\Framework\Attributes\Group;

// Attribution de la route /login pour l'authentification
Route::post('/login', [AuthController::class, 'login']);

Route::prefix('profiles')->group(function() {
    Route::get('/', [ProfileController::class, 'index']);

    Route::middleware('auth:sanctum')->group(function() {
        Route::get('{id}', [ProfileController::class, 'get']);
        Route::post('', [ProfileController::class, 'create']);
        Route::post('{id}', [ProfileController::class, 'update']);
        Route::delete('{id}', [ProfileController::class, 'delete']);
    });
});
