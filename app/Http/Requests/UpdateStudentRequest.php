<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'user_id' => 'required|exists:App\Models\User,id',
			'province_id' => 'nullable|numeric',
			'city_id' => 'nullable|numeric',
			'district_id' => 'nullable|numeric',
			'village_id' => 'nullable|numeric',
			'address' => 'nullable|string|max:255',
			'phone_number' => 'required|string|max:255',
			'gender' => 'required|in:F,M',
			'is_member' => 'required|numeric',
			'member_access' => 'required|string|max:255',
        ];
    }
}
