<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use function PHPSTORM_META\map;

class adminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'id'=>'numeric',
            'name' => 'required|unique:rooms,name',
            'id_type' => 'required |string',
            'image'=>'required | file',
            'price'=>'required | numeric',

            'number' => 'required | numeric',
            'area' => 'required | numeric'
        ];
    }

    public function messages()
    {
        return[
            'name.required'=>'Vui lòng nhập tên sản phẩm',
            'image.required'=>'Vui lòng chọn ảnh cho sản phẩm',
            'id_type.string' => 'Loại phòng phải là chữ',
            'price.numeric' => 'Giá phải là số',
            'number.numeric' => 'Vui lòng nhập lại số phòng',
            'area.numeruc'=>'Vui lòng nhập lại diện tích'
        ];


    }
}
