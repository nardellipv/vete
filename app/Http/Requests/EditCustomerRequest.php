<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCustomerRequest extends FormRequest
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
            'dni' => 'required | numeric | unique:customers,dni,' .$this->id,
            'province' => 'required',
            'city_id' => 'required',
            'phone' => 'required | numeric',
            'email' => 'sometimes | required | email | unique:customers,email,' .$this->id,
            'address' => 'required | min:10',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo Nombre es requerido',
            'dni.required' => 'El campo DNI es requerido',
            'dni.numeric' => 'El campo DNI debe ser numérico',
            'dni.unique' => 'El DNI ya lo posee otro cliente',
            'email.unique' => 'El email ya se encuentra registrado',
            'phone.required' => 'El campo Teléfono es requerido',
            'phone.numeric' => 'El campo Teléfono debe ser numérico',
            'address.required' => 'El campo Dirección es requerido',
            'address.min' => 'El campo Dirección debe tener una dirección válida',
        ];
    }
}
