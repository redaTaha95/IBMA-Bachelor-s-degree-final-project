<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeetingRequest extends FormRequest
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
            'employee_id' => 'required',
            'start_datetime' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'description.required' => __('calendar.please_add_description'),
            'employee_id.required' => __('calendar.please_select_employee'),
            'start_datetime.required' => __('calendar.start_meeting_date_required'),
        ];
    }
}
