<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nom du client est obligatoire !!',
            'phone.required' => 'Téléphone du client est obligatoire !!',
            'email.required' => 'Email du client est obligatoire !!',
        ];
    }
}
