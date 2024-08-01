<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProgramRequest extends FormRequest
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
            'name' => 'required|string|max:255',
			'price' => 'required|numeric',
			'image' => 'nullable|image|max:2048',
			'is_active' => 'nullable|numeric',
			'period_id' => 'required|exists:App\Models\Period,id',
			'program_type_id' => 'required|exists:App\Models\ProgramType,id',
        ];
    }
}
