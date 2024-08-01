<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBankRequest extends FormRequest
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
            'bank_name' => 'required|string|max:255',
			'rekening_number' => 'required|string|max:255',
			'rekening_name' => 'required|string|max:255',
			'image' => 'nullable|image|max:2048',
			'is_active' => 'required|numeric',
        ];
    }
}
