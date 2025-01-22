<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

// Attribution de la route /login pour l'authentification
Route::post('/login', [AuthController::class, 'login']);

Route::prefix('profiles')->group(function() {
    Route::get('/', [ProfileController::class, 'index']);
    Route::get('{id}', [ProfileController::class, 'get']);
    Route::post('', [ProfileController::class, 'create'])->middleware('auth:sanctum');;
    Route::post('{id}', [ProfileController::class, 'update'])->middleware('auth:sanctum');;
    Route::delete('{id}', [ProfileController::class, 'delete'])->middleware('auth:sanctum');;
});
