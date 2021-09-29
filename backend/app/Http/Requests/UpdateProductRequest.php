<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'category_id'=>"required",
            'title'=>"required||min:8",
            'price'=>"required||numeric||min:0",
            'amount'=>"required||numeric||min:0",
            'summary'=>"required||max:255",
            'content'=>"required",
            'size'=>'required',
            'promotions'=>'required||numeric||min:0',
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>"Tên sản phẩm không được để trống",
            'title.min'=>"Tên sản phẩm nhỏ nhất 8 ký tự",
            'category_id.required'=>"Phải chọn danh mục",
            'price.required'=>"giá sản phẩm không được trống",
            'price.min'=>"giá sản phẩm không được nhỏ hơn 0",
            'price.numeric'=>"giá sản phẩm phải là số",
            'amount.numeric'=>"số lượng sản phẩm phải là số",
            'amount.required'=>"số lượng sản phẩm không được trống",
            'amount.min'=>"số lượng sản phẩm không được nhỏ hơn 0",
            'content.required'=>"content không được để trống",
            'summary.max'=>"summary không vượt quá 255 ký tự",
            'summary.required'=>"summary không được để trống",
            'size.required'=>"size không được để trống",
        ];
    }
}
