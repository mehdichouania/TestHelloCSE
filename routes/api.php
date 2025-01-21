<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Attribution de la route /login pour l'authentification
Route::get('/login', [AuthController::class, 'login']);


