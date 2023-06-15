<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsuranceCardRequest extends FormRequest
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
            //
            'user_id' => 'required',
            'code_card' => 'required',
            'time_card' => 'required',
            'register_place' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required'    => 'Dữ liệu không được phép để trống',
            'code_card.required'    => 'Dữ liệu không được phép để trống',
            'time_card.required'    => 'Dữ liệu không được phép để trống',
            'policy.required'    => 'Dữ liệu không được phép để trống',
            'register_place.required'    => 'Dữ liệu không được phép để trống',
        ];
    }
}
