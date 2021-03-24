<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'hire_date' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nom du employee est obligatoire !!',
            'email.required' => 'Email du employee est obligatoire !!',
            'phone.required' => 'Téléphone du employee est obligatoire !!',
            'hire_date.required' => 'la date d embouche du employee est obligatoire !!',
        ];
    }
}
