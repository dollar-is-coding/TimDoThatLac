<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'old_password'=>'required|min:8',
            'new_password'=>'required|min:8',
            'confirm_new_password'=>'required|same:new_password',
        ];
    }
    public function messages()
    {
        return [
            'old_password.required'=>'Vui lòng nhập mật khẩu cũ',
            'new_password.required'=>'Vui lòng nhập mật khẩu mới',
            'confirm_new_password.required'=>'Vui lòng nhập xác nhận mật khẩu mới',
            'confirm_new_password.same'=>'Xác nhận mật khẩu mới chưa trùng khớp với mật khẩu mới',
            'new_password.min'=>'Mật khẩu mới tối thiểu 8 ký tự',
            'old_password.min'=>'Mật khẩu cũ tối thiểu 8 ký tự',
        ];
    }
}
