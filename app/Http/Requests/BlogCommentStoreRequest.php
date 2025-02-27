<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogCommentStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'          => 'required|max:75',
            'email'         => 'required|email:rfc,dns|max:75',
            'website'       => 'nullable|max:150|url',
            'comment'       => 'required|string|max:1000',
            'blog_id'       => 'required|numeric|exists:blogs,id'
        ];
    }
}
