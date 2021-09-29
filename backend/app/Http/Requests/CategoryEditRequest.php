<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryEditRequest extends FormRequest
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
            'name'=>"required||max:255",
            'avatar'=>"max:10000",
            'description'=>"required||min:8",
            'status'=>"required",
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>"Tên danh mục không được để trống",
            'name.max'=>"Tên danh mục tối đa 255 ký tự",
           
            
            'description.required'=>"description không được để trống",
            'description.min'=>"mô tả ít nhất 8 ký tự",
            'status.required'=>"status không được để trống",
        ];
    }
}
