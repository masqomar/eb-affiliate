<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExamRequest extends FormRequest
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
			'question_title_id' => 'required|exists:App\Models\QuestionTitle,id',
			'title' => 'required|string|max:255',
			'price' => 'required|numeric',
			'duration_type' => 'required|numeric',
			'duration' => 'nullable|numeric',
			'description' => 'required|string',
			'random_question' => 'required|numeric',
			'random_answer' => 'required|numeric',
			'show_answer' => 'required|numeric',
			'show_question_number_navigation' => 'required|numeric',
			'show_question_number' => 'required|numeric',
			'next_question_automatically' => 'required|numeric',
			'show_prev_next_button' => 'required|numeric',
			'type_option' => 'required|numeric',
			'total_tolerance' => 'nullable|numeric',
        ];
    }
}
