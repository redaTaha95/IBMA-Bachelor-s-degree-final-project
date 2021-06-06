<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailRequest extends FormRequest
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
            'users_id' => 'required',
            'subject' => 'required',
            'content' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'users_id.required' => 'Sélectionnez des récepteurs SVP !!',
            'subject.required' => 'Sujet est obligatoire !!',
            'content.required' => 'Content est obligatoire !!'
        ];
    }
}
