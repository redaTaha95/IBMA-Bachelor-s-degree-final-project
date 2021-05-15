<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'client_id' => 'required',
            'name' => 'required',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'client_id.required' => 'client du projet est obligatoire',
            'name.required' => 'Nom du project est obligatoire !!',
            'description.required' => 'Description du project est obligatoire !!',
        ];
    }
}
