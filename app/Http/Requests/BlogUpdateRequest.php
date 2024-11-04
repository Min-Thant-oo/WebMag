<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'                 => 'required|string|max:255',
            'content'               => 'required|string|max:10000',
            'thumbnail'             => 'nullable|image|file|max:1024',
            'image'                 => 'nullable|image|file|max:5000',
            'category_id'           => 'required|exists:categories,id',
            'blog_status_id'        => 'required|exists:blog_statuses,id',
            'published_at'          => 'nullable|date|date_format:Y-m-d\TH:i',
            'is_featured'           => 'required|boolean',
        ];
    }
}
