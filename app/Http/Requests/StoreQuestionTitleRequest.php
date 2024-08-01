<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionTitleRequest extends FormRequest
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
            'category_id' => 'required|exists:App\Models\Category,id',
			'name' => 'required|string|max:255',
			'total_choices' => 'required|numeric',
			'total_section' => 'required|numeric',
			'add_value_category' => 'required|numeric',
			'assessment_type' => 'required|numeric',
			'show_answer' => 'required|numeric',
			'minimum_grade' => 'nullable|numeric',
        ];
    }
}
