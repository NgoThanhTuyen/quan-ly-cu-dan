<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class TrooperReques extends FormRequest
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
            'ten_hien_tai'  => 'required|max:191',
            'ma_cu_dan'  => 'required|min:9|max:12|unique:users,ma_cu_dan,'.$this->id,
            'ten_khai_sinh'  => 'required|max:191',
            'email' => 'required|email|max:191|unique:users,email,'.$this->id,
            'ngay_sinh'  => 'required',
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
            'ten_hien_tai.required' => 'Dữ liệu không được phép để trống',
            'ten_khai_sinh.required' => 'Dữ liệu không được phép để trống',
            'ngay_sinh.required' => 'Dữ liệu không được phép để trống',
            'ma_cu_dan.required' => 'Dữ liệu không được phép để trống',
            'ma_cu_dan.min' => 'Giá trị phải có ít nhất 9 ký tự',
            'ma_cu_dan.max' => 'Giá trị phải có số ký tự nhỏ hơn hoặc bằng 12',
            'ma_cu_dan.unique' => 'Giá trị bị trùng lặp',
            'email.required' => 'Dữ liệu không được phép để trống',
            'email.unique' => 'Giá trị bị trùng lặp',
            'email.max' => 'Giá trị vượt quá số ký tự cho phép',
            'password.required' => 'Dữ liệu không được phép để trống',
            'role.required' => 'Dữ liệu không được phép để trống',
            'images.image'  => 'Định dạng file không cho phép',
            'images.mimes'  => 'Định dạng file không cho phép',
            'phone.required'  => 'Dữ liệu không được phép để trống',
        ];
    }
}
