<?php

namespace App\Http\Requests\Engagement;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class EngagementRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'bride_name' => 'required|string',
            'bride_qualification' => 'required|string',
            'bride_grandparents' => 'required|string',
            'bride_parents' => 'required|string',
            'bride_current_city' => 'required|exists:cities,id',
            'bride_native_city' => 'required|exists:cities,id',
            'groom_name' => 'required|string',
            'groom_qualification' => 'required|string',
            'groom_grandparents' => 'required|string',
            'groom_parents' => 'required|string',
            'groom_current_city' => 'required|exists:cities,id',
            'groom_native_city' => 'required|exists:cities,id',
            'bride_image_url' => 'nullable|image',
            'groom_image_url' => 'nullable|image',
        ];
    }
}
