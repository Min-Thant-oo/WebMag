<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogCommentRequest extends FormRequest
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
            'comment'       => 'required|string|max:1000'
        ];
    }

}
