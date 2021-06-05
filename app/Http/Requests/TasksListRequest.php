<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TasksListRequest extends FormRequest
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
            'title' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Titre de la liste des tâches est obligatoire !',
        ];
    }
}
