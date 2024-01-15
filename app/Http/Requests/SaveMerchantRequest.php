<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveMerchantRequest extends FormRequest
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
            'business_type'=>'required',
            'contact_number'=>'required',
            'poroduct_category'=>'required',
            'email_communication'=>'required',
            'manager_name'=>'required',
            'mob_of_manger'=>'required',
            'address'=>'required',
            'lat'=>'required',
            'lng'=>'required',
            'license_no'=>'required',
            'communication_reg_no'=>'required',
            'tax_no'=>'required',
            'representative_offer'=>'required',
            'comCertificateFile'=>'required',
            'taxCertificateFile'=>'required',
        ];
    }
}
