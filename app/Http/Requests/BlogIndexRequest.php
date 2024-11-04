<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogIndexRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'search'            => 'nullable|string|max:255',
            'blog_status_id'    => 'nullable|string|exists:blog_statuses,id',
            'category_id'       => 'nullable|string|exists:categories,id',
            'per_page'          => 'nullable|integer|min:1',

        ];
    }
}
