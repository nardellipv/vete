<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddNewStockRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'provider' => 'required',
            'category_id' => 'required',
            'buyPrice' => 'required | numeric',
            'quantity' => 'required | numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo Nombre es requerido',
            'provider.required' => 'El campo Proveedor es requerido',
            'category_id.required' => 'El combo Categoría es requerido',
            'buyPrice.required' => 'El precio de compra es requerido',
            'buyPrice.numeric' => 'El precio de compra debe ser un número',
            'quantity.required' => 'La cantidad es requerido',
            'quantity.numeric' => 'La cantidad debe ser un número',
        ];
    }
}
