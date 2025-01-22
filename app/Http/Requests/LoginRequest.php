<?php 

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ["required","string","email"],
            'password' => ["required","string"]
        ];
    }

    /**
     * Retourne des alertes lorsqu'un ou plusieurs inputs sont incorrects.
     */
    public function alerts(): array
    {
        return [
            'email.required' => 'Veuillez valider votre email',
            'email.string' => 'Votre email doit être une chaîne de caractères',
            'email.email' => 'Le format est incorrect',
            'password.required' => 'Veuillez valider votre mot de passe',
            'password.string' => 'Votre mot de passe doit être une chaine de caractères',
        ];
    }
}