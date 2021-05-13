<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacationRequest extends FormRequest
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
            'start_date' => 'required',
            'end_date' => 'required',
        ];
    }

    public function messages()
    {
        return [
          'employee_id.required' => 'Séléctionner un employee SVP !!',
          'start_date' => 'La date de sortie est obligatoire !!',
          'end_date' => 'La date d\'entrée est obligatoire',
        ];
    }
}
