<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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
            'first_name' => 'required',
            'last_name' => 'required',
            'hire_date' => 'required',
            'phone' => 'required',
            //'email' => ['required' , Rule::unique('employees')->ignore($this->employee->id)],
            //'email' => 'required | unique:users,email',
            'email'=>[
                Rule::unique('users')->ignore($this->id),
            ]
        ];
    }

    public function ignore(){
        return ['email'];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nom d\'employé est obligatoire !!',
            'email.required' => 'Email d\'employé est obligatoire !!',
            'phone.required' => 'Téléphone d\'employé est obligatoire !!',
            'hire_date.required' => 'la date d embouche d\'employé est obligatoire !!',
        ];
    }
}
