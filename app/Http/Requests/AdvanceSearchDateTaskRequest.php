<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvanceSearchDateTaskRequest extends FormRequest
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
            'from' => 'required',
            'to' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'from.required' => 'El campo Desde es requerido',
            'to.required' => 'El campo Hasta es requerido',
        ];
    }
}
