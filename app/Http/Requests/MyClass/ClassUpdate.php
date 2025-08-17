<?php

namespace App\Http\Requests\MyClass;

use Illuminate\Foundation\Http\FormRequest;

class ClassUpdate extends FormRequest
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
            'name' => 'required|string|min:3',
            'class_type_id' => 'required|exists:class_types,id',
            'series_id' => 'nullable|exists:series,id',
        ];
    }

    public function attributes()
    {
        return  [
            'class_type_id' => 'Type de classe',
            'series_id' => 'Série',
        ];
    }
}
