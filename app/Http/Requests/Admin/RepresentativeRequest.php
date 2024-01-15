<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RepresentativeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:users',
            'mobile_no' => 'required',
            'city' => 'required',
            'password' => 'required',
            'id_number' => 'required',
            'neighborhood' => 'required',
            'neighborhood_1' => 'required',
            'other_doc' => 'required',
            'img' => 'required',
            'id_upload' => 'required',
        ];
    }
}
