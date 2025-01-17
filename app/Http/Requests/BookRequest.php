<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(){
        return [
            'category_id' => 'required',
            'book_title' => 'required|string|max:255',
            'book_author' => 'required|string',
            'book_publisher' => 'required|string',
            'book_status' => 'string',
            'book_year' => 'required|int',
            'book_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];        
    }
}
