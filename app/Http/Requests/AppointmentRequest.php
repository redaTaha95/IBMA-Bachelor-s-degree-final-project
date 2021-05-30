<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
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
            'description' => 'required',
            'datetime' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'description.required' => __('calendar.please_add_description'),
            'datetime.required' => __('calendar.start_appointment_date_required'),
        ];
    }
}
