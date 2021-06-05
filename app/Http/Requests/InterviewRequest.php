<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InterviewRequest extends FormRequest
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
            'employee_id' => 'required',
            'candidate_id' => 'required',
            'datetime' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'employee_id.required' => 'Séléctionner un employé SVP !!',
            'candidate_id.required' => 'Séléctionner le candidat SVP !!',
            'datetime.required' => 'La date & heure sont obligatoires',
        ];
    }
}
