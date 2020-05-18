<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddNewTaskRequest extends FormRequest
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
            'title' => 'required',
            'motive' => 'required',
            'date' => 'required | date',
            'priority' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'El campo Título es requerido',
            'motive.required' => 'El campo Tarea es requerido',
            'date.required' => 'La fecha es requerido',
            'date.date' => 'El formato de la fecha es erroneo',
            'priority.required' => 'La prioridad es requerida',
        ];
    }
}
