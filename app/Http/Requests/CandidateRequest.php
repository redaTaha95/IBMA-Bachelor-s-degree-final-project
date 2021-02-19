<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'last_name' => 'required',
            'first_name' => 'required',
            'cin' => 'required',
            'email' => 'required',
            'phone' => 'required',

        ];
    }


    public function messages()
    {
        return [
            'last_name.required' => 'Nom du candidat est obligatoire !',
            'first_name.required' => 'Prénom du candidat est obligatoire !',
            'cin.required' => 'CIN du candidat est obligatoire !',
            'email.required' => 'Email du candidat est obligatoire !',
            'phone.required' => 'Téléphone du candidat est obligatoire !',
        ];
    }
}
