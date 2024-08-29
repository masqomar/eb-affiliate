<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommissionRequest extends FormRequest
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
            'tenant_id' => 'required|exists:App\Models\Tenant,id',
			'amount' => 'required|numeric',
			'commission_proof' => 'nullable|image|max:248',
			'note' => 'nullable|string|max:255',
        ];
    }
}
