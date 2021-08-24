<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class ExperienceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'description' => 'required',
            'post' => 'required',
            'year' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'description.required' => 'Déscription est obligatoire !',
            'post.required' => 'Post du candidat est obligatoire !',
            'year.required' => "Année d'expérience est obligatoire !",
        ];
    }
}
