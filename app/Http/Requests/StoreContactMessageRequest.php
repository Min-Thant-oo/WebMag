<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactMessageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email'     => 'required|email:rfc,dns',
            'subject'   => 'required|string|max:255',
            'message'   => 'required|string|max:2000',
        ];
    }
}
