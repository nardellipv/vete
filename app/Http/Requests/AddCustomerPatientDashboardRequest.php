<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCustomerPatientDashboardRequest extends FormRequest
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
            'nameCustomer' => 'required',
            'dni' => 'required | numeric | unique:customers,dni',
            'province' => 'required',
            'city_id' => 'required',
            'phone' => 'required | numeric',
            'email' => 'required | email | unique:customers,email',
            'address' => 'required | min:10',

            'specie_id' => 'required',
            'sex' => 'required',
            'race' => 'required',
            'namePatient' => 'required',
            'birthday' => 'required',
            'nutrition' => 'required',
            'frequency' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nameCustomer.required' => 'El campo Nombre es requerido',
            'dni.required' => 'El campo DNI es requerido',
            'dni.numeric' => 'El campo DNI debe ser numérico',
            'dni.unique' => 'El DNI ya lo posee otro cliente',
            'city_id.required' => 'El campo Ciudad es requerido',
            'email.unique' => 'El email ya se encuentra registrado',
            'phone.required' => 'El campo Teléfono es requerido',
            'phone.numeric' => 'El campo Teléfono debe ser numérico',
            'address.required' => 'El campo Dirección es requerido',
            'address.min' => 'El campo Dirección debe tener una dirección válida',

            'specie_id.required' => 'El campo Especie es requerido',
            'sex.required' => 'El campo Sexo es requerido',
            'race.required' => 'El campo Raza es requerido',
            'namePatient.required' => 'El campo Nombre es requerido',
            'birthday.required' => 'El campo Cumpleaños es requerido',
            'nutrition.required' => 'El campo Nutrición es requerido',
            'frequency.required' => 'El campo Frecuencia es requerido',
        ];
    }
}
