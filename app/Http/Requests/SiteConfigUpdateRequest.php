<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteConfigUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'logo'              => 'nullable|file|image|max:512',
            'facebook'          => 'required|string|url',
            'twitter'           => 'required|string|url',
            'google'            => 'required|string|url',
            'github'            => 'required|string|url',
            'policy'            => 'required|string|max:10000',
            'about'             => 'required|string|max:10000',
            'email'             => 'required|string|email:rfc,dns',
            'phone'             => 'required|string|max:30',
            'address'           => 'required|string|max:255',
            'contact_message'   => 'required|string|max:1000',
        ];
    }
}
