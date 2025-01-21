<?php 

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        $login = $request->only('email', 'password');

        // Tentative de login en créant un token et le retourne en json
        if(Auth::attempt($login)) {

            /** @var User $user */
            $user = Auth::user();

            // Methode Sanctum pour génération de token
            $token = $user->createToken('authToken');

            // Convertion SHA-256 en plainText pour le stockage en DB
            return response()->json([
                'token' => $token->plainTextToken,
            ]);
        }

        // Retourne un message d'erreur et erreur 401 si l'email ou mdp est erroné
        return response()->json([
            'message' => 'Email ou mot de passe erroné'
        ], 401);
    }
}