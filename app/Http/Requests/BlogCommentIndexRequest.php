<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogCommentIndexRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'search'            => 'nullable|string|max:255',
            'blog_id'           => 'nullable|numeric|exists:blogs,id'
        ];
    }
}
