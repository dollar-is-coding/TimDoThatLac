<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaiDangAdminRequets extends FormRequest
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
            'tieu_de'=>'required',
            'noi_dung'=>'required',
        ];
    }
    public function messages()
    {
        return [
                'tieu_de.required'=>'Vui lòng nhập tiêu đề',
                'noi_dung.required'=>'Vui lòng nhập nội dung',
            ];
    }
}
