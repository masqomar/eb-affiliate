<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTransactionDetailRequest extends FormRequest
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
            'transaction_id' => 'required|exists:App\Models\Transaction,id',
			'invoice' => 'required|string|max:255',
			'tshirt_size' => 'required|string|max:255',
			'full_payment' => 'required|numeric',
			'snap_token' => 'nullable|string|max:255',
			'payment_status' => 'required|in:pending,paid,failed,done',
        ];
    }
}
