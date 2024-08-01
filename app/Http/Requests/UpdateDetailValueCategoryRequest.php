<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDetailValueCategoryRequest extends FormRequest
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
            'value_category_id' => 'required|exists:App\Models\ValueCategory,id',
			'min_grade' => 'required|numeric',
			'max_grade' => 'required|numeric',
			'final_grade' => 'required|numeric',
        ];
    }
}
