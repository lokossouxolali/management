<?php

namespace App\Http\Requests\Exam;

use Illuminate\Foundation\Http\FormRequest;

class ExamUpdate extends FormRequest
{

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
            'name' => 'required|string',
            'term' => 'required|numeric',
            'class_type_id' => 'required|exists:class_types,id',
        ];
    }

    public function messages()
    {
        return [
            'class_type_id.required' => 'Le type de classe est requis.',
            'class_type_id.exists' => 'Le type de classe sélectionné n\'existe pas.',
        ];
    }
}
