<?php

namespace App\Http\Requests\SinhVien;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormRequest extends FormRequest
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
            'masv'=>'required',
            'hoten'=>'required'
        ];
    }
    public function messages(): array
    {
        return [
            'masv.required' => 'Không được để trống mã sinh viên',
            'hoten.required' => 'Không được để trống tên sinh viên',
        ];
    }
}
