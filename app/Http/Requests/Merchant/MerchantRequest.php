<?php

namespace App\Http\Requests\Merchant;

use Illuminate\Foundation\Http\FormRequest;

class MerchantRequest extends FormRequest
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
            'business_name'=>'required',
            'contact_number'=>'required',
            'email'=>'required',
            'manager_name'=>'required',
            'mob_of_manger'=>'required',
            'license_no'=>'required',
            'communication_reg_no'=>'required',
            'representative_offer'=>'required',
            'tax_no'=>'required',
            'commercial_certificate'=>'required',
            'tax_certificate'=>'required',
        ];
    }
}
