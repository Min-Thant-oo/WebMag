<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexBlogsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category'      => 'nullable|exists:categories,slug',
            'search'        => 'nullable|max:150',
        ];
    }
}
