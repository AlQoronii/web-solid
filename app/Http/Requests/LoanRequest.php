<?php
// filepath: /d:/Project/web-solid/app/Http/Requests/LoanRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoanRequest extends FormRequest
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
            'user_id' => 'required|exists:users,user_id',
            'book_id' => 'required|exists:books,book_id',
            'borrow_date' => 'required|date',
            'return_date' => 'required|date|after:borrow_date',
            'loan_status' => 'required|string|in:borrowed,returned,overdue',
        ];
    }
}