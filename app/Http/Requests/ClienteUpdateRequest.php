<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteUpdateRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'estado' => ['required', 'string'],
            'fase' => ['required', 'string'],
            'origen' => ['required', 'string'],
            'user_id' => ['required', 'integer', 'exists:Users,id'],
        ];
    }
}
