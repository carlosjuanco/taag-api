<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'unique:companies'],
            'email' => ['required', 'unique:companies', 'email'],
            'logo' => ['required', 'file', 'mimes:png,jpg,jpeg', 
                'dimensions:min_width=150,min_height=150'],
            'website' => ['nullable', 'url']
        ];
    }
}
