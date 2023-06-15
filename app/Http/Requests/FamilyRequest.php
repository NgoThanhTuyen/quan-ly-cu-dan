<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FamilyRequest extends FormRequest
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
            'name' => 'required',
            'category_id' => 'required',
            'culture' => 'required',
            'policy' => 'required',
            'business' => 'required',
            'export' => 'required',
            'family_users' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'    => 'Dữ liệu không được phép để trống',
            'category_id.required'    => 'Dữ liệu không được phép để trống',
            'culture.required'    => 'Dữ liệu không được phép để trống',
            'policy.required'    => 'Dữ liệu không được phép để trống',
            'business.required'    => 'Dữ liệu không được phép để trống',
            'export.required'    => 'Dữ liệu không được phép để trống',
            'family_users.required'    => 'Dữ liệu không được phép để trống',
        ];
    }
}
