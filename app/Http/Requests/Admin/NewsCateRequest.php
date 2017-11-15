<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NewsCateRequest extends FormRequest
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
            'txtNewsCateName' => 'required|unique:news_categories,name',
            'txtDescription'  => 'required',
            'txtKeyword'      => 'required'
        ];
    }

    public function messages()
    {
        return [
            'txtNewsCateName.required' => 'Vui lòng nhập tên loại tin',
            'txtNewsCateName.unique'   => 'Tên loại tin này đã tồn tại',
            'txtDescription.required'  => 'Vui lòng nhập mô tả về loại tin',
            'txtKeyword.required'      => 'Vui lòng nhập từ khóa cho loại tin'
        ];
    }
}
