<?php

namespace App\Http\Requests\Dashboard\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'phone' => ['required', 'string'],
            'address' => ['required', 'string'],
        ];
    }

    /**
     * @param $key
     * @param $default
     * @return array|mixed|string[]
     */
    public function validated($key = null, $default = null)
    {
        return array_merge([
            'password' => Str::random()
        ], parent::validated($key, $default));
    }
}
