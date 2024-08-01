<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
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
			'exam_id' => 'nullable|exists:App\Models\Exam,id',
			'code' => 'required|string|max:255',
			'voucher_activated' => 'required|numeric',
			'voucher_used' => 'required|numeric',
			'total_purchases' => 'required|numeric',
			'maximum_payment_time' => 'required',
			'transaction_status' => 'required|in:pending,paid,failed,done',
			'voucher_token' => 'nullable|string|max:255',
			'invoice' => 'nullable|string|max:255',
			'program_id' => 'nullable|exists:App\Models\Program,id',
			'snap_token' => 'nullable|string|max:255',
			'program_date' => 'nullable|date',
			'program_time' => 'nullable',
			'note' => 'nullable|string|max:255',
			'discount' => 'nullable|numeric',
			'admin_fee' => 'nullable|numeric',
			'down_payment' => 'nullable|numeric',
        ];
    }
}
