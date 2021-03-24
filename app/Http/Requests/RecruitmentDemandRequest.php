<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecruitmentDemandRequest extends FormRequest
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

    public function rules()
    {
        return [
            'post_name' => 'required',
            'number_of_profiles' => 'required',
            'number_of_years_of_experience' => 'required',
            'date_of_demand' => 'required',
            'status_of_demand' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'post_name.required' => 'Poste est obligatoire !',
            'number_of_profiles.required' => 'Nombre de profil est obligatoire !',
            'number_of_years_of_experience.required' => "Nombre d'années d'expérience est obligatoire !",
            'date_of_demand.required' => 'Date de la demande est obligatoire !',
            'status_of_demand.required' => 'Statut de la demande est obligatoire !',
        ];
    }
}
