<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|string',
            'book_id' => 'required|string',
            'borrow_date' => 'required|date',
            'return_date' => 'required|date',
            'loan_status' => [
                'string',
                'in:borrowed,returned,overdue',
                'default:borrowed',
            ],
        ];
    }
}
