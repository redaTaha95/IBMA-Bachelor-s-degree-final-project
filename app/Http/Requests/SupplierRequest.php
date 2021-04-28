<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'full_name' => 'required',
            'cin' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'full_name.required' => 'Nom & Prénom du fournisseur sont obligatoires !',
            'cin.required' => 'CIN du fournisseur est obligatoire !',
            'address.required' => 'Adresse du fournisseur est obligatoire !',
            'phone.required' => 'Téléphone du fournisseur est obligatoire !',
            'email.required' => 'Email du fournisseur est obligatoire !',
        ];
    }
}
