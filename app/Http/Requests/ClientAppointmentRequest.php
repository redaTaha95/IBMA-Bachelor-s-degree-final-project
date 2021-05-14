<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientAppointmentRequest extends FormRequest
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
            'datetime' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'client_id.required' => 'Séléctionner un client SVP !!',
            'datetime.required' => 'La date & heure sont obligatoires !!',
        ];
    }
}
