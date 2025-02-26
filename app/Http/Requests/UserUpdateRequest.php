<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {

        $userId = $this->route('user');
        // dd($userId);
        $rules =  [
            'role_id' => 'required|string',
            'username' => 'required|string|max:255',
            'email' => 'required|email|', Rule::unique('users')->ignore($userId, 'user_id'),
            'current_password' => 'required|string|min:6',
            'password' => 'nullable|string|min:6|confirmed',
        ];


        return $rules;
    }
}
