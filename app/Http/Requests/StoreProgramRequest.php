<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProgramRequest extends FormRequest
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
            'is_active' => 'nullable|numeric',
            'program_type_id' => 'required|exists:App\Models\ProgramType,id',
            'periods' => 'required|array',
            'periods.*' => 'exists:periods,id',
            'image' => 'nullable|image|max:2048',
        ];
    }
}
