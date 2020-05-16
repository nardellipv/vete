<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditPatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'specie_id' => 'required',
            'sex' => 'required',
            'race' => 'required',
            'name' => 'required',
            'customer_id' => 'required',
            'birthday' => 'required | date',
            'nutrition' => 'required',
            'frequency' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'specie_id.required' => 'El campo Especie es requerido',
            'sex.required' => 'El campo Sexo es requerido',
            'race.required' => 'El campo Raza es requerido',
            'name.required' => 'El campo Nombre es requerido',
            'customer_id.required' => 'El combo Cliente es requerido',
            'birthday.required' => 'El campo Cumpleaños es requerido',
            'birthday.date' => 'La fecha de nacimiento tiene un formato erroneo',
            'nutrition.required' => 'El campo Nutrición es requerido',
            'frequency.required' => 'El campo Frecuencia es requerido',
        ];
    }
}
