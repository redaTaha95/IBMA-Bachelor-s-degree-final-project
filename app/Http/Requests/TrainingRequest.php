<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class TrainingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'description_training' => 'required',
            'graduation_year' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'description_training.required' => 'Déscription de formation est obligatoire !',
            'graduation_year.required' => 'Année de formation est obligatoire !',
        ];
    }
}
