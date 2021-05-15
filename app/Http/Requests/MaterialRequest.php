<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaterialRequest extends FormRequest
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
            'reference' => 'required',
            'designation' => 'required',
            'category' => 'required',
            'quantity' => 'required',
            'origin' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'material_reference.required' => 'Le référence d matériel est obligatoire !!',
            'designation.required' => 'La désignation du matériel est obligatoire !!',
            'category.required' => 'la catégorie du matériel est obligatoire !!',
            'quantity.required' => 'la quantité du matériel est obligatoire !!',
            'origin.required' => 'l origine du matériel est obligatoire !!',
        ];
    }
}
