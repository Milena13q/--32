<?php

namespace App\Http\Requests\Dashboard\Developer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
//            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore((int)$this->route('id'), 'id')], // DISABLED
            'phone' => ['required', 'string'],
            'address' => ['required', 'string'],
            'position' => ['nullable', 'string']
        ];
    }
}
