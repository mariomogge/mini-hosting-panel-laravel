<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServerCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check(); // only logged in users
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:150',
            'meta' => 'nullable|array',
        ];
    }
}
