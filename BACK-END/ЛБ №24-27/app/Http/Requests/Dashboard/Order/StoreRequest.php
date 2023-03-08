<?php

namespace App\Http\Requests\Dashboard\Order;

use App\Enums\RoleEnum;
use App\Models\Product;
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
            'client_id' => ['required', 'numeric', 'exists:users,id'],
            'products' => ['required', 'array'],
            'products.*' => ['required', 'numeric', 'exists:products,id']
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
            'price' => Product::query()
                ->whereIn('id', $this->get('products', []))
                ->sum('price'),
            'client_id' => $this->get('client_id')
        ], parent::validated($key, $default));
    }
}
