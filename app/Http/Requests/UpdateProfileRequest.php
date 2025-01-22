<?php 

namespace App\Http\Requests;

use App\Enums\ProfileStatus;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
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
            'firstName' => ["required","string"],
            'lastName' => ["required","string"],
            'image' => ["image"],
            'status' => ["required","string",Rule::enum(ProfileStatus::class)],
        ];
    }
}