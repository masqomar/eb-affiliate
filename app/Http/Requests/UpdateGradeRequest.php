<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGradeRequest extends FormRequest
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
			'exam_id' => 'required|exists:App\Models\Exam,id',
			'user_id' => 'required|exists:App\Models\User,id',
			'duration' => 'required|numeric',
			'number' => 'required|numeric',
			'section' => 'required|numeric',
			'total_section' => 'required|numeric',
			'start_time' => 'nullable',
			'end_time' => 'nullable',
			'total_correct' => 'required|numeric',
			'grade_old' => 'required|numeric',
			'grade' => 'required|numeric',
			'answers' => 'nullable|string|max:255',
			'is_finished' => 'required|numeric',
			'total_tolerance' => 'required|numeric',
			'is_blocked' => 'required|numeric',
        ];
    }
}
