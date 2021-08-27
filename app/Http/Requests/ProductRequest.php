<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|unique:products|max:100|min:6',
            'price' => 'required',
            'desc' => 'required|min:10|max:255',
            'type' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name' => 'Tên sản phẩm',
            'price' => 'Giá',
            'desc' => 'Mô tả',
            'type' => 'Loại'
        ];
    }

    public function attributes()
    {
        return [
            'required' => ':attribute không được bỏ trống',
            'unique' => ':attribute đã tồn tại',
            'min' => ':attribute kí tự quá nhỏ',
            'max' => ':attribute kí tự quá lớn',
            'numeric' => ':attribute phải là số'
        ];
    }
}
