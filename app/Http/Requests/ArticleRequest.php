<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Set to true if authorization is not required
    }

    public function rules()
    {
        return [
            'article_title' => 'required|string|max:255',
            'article_content' => 'required|string',
            'article_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}