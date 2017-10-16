<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CateRequest extends FormRequest
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
            'txtCateName'    => 'required|unique:categories,name',
            'txtDescription' => 'required',
            'txtKeyword'     => 'required'
        ];
    }

    public function messages()
    {
        return [
            'txtCateName.required'    => 'Vui lòng nhập tên thể loại',
            'txtCateName.unique'      => 'Tên thể loại này đã tồn tại',
            'txtDescription.required' => 'Vui lòng nhập mô tả về thể loại',
            'txtKeyword.required'     => 'Vui lòng nhập từ khóa cho thể loại'
        ];
    }

}
