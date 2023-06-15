<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $validate = [
            'name'  => 'required|max:191',
            'email' => 'required|email|max:191|unique:users,email,'.$this->id,
            'role'  => 'required',
            'phone'  => 'required',
            'images'  => 'nullable|image|mimes:jpeg,jpg,png',
        ];
        if ($request->submit !== 'update') {
            $validate['password'] = 'required | max:191 ';
        }

        return $validate;
    }

    public function messages()
    {
        return [
            'name.required'  => 'Dữ liệu không được phép để trống',
            'phone.required'  => 'Dữ liệu không được phép để trống',
            'email.required' => 'Dữ liệu không được phép để trống',
            'email.unique'   => 'Giá trị bị trùng lặp',
            'email.max'      => 'Giá trị vượt quá số ký tự cho phép',
            'password.required' => 'Dữ liệu không được phép để trống',
            'role.required' => 'Dữ liệu không được phép để trống',
            'images.image'  => 'Định dạng file không cho phép',
            'images.mimes'  => 'Định dạng file không cho phép',
        ];
    }
}
