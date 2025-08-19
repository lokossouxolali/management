<?php

namespace App\Http\Requests\Subject;

use App\Helpers\Qs;
use Illuminate\Foundation\Http\FormRequest;

class SubjectCreate extends FormRequest
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
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:50',
            'my_class_id' => 'required|exists:my_classes,id',
            'teacher_id' => 'required|exists:users,id',
            'coefficient' => 'required|integer|min:1|max:6',
            'is_core_subject' => 'boolean',
            'max_score' => 'required|numeric|min:20|max:120',
            'description' => 'nullable|string|max:500'
        ];
    }

    public function attributes()
    {
        return  [
            'my_class_id' => 'Class',
            'teacher_id' => 'Teacher',
            'slug' => 'Short Name',
            'coefficient' => 'Coefficient',
            'is_core_subject' => 'Matière principale',
            'max_score' => 'Score maximum',
            'description' => 'Description',
        ];
    }

    protected function getValidatorInstance()
    {
        $validator = parent::getValidatorInstance();
        
        $validator->after(function ($validator) {
            if (!$this->has('coefficient')) {
                $this->merge(['coefficient' => 1]);
            }
            if (!$this->has('is_core_subject')) {
                $this->merge(['is_core_subject' => false]);
            }
            if (!$this->has('max_score')) {
                $this->merge(['max_score' => 20]);
            }
        });
        
        return $validator;
    }
}
