<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCouponRequest extends FormRequest
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
            'code' => 'required|string|max:255',
			'amount' => 'required|numeric',
			'qty' => 'nullable|numeric',
			'program_id' => 'nullable|exists:App\Models\Program,id',
			'start_date' => 'nullable|date',
			'end_date' => 'nullable|date',
        ];
    }
}
