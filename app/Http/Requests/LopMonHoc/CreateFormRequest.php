<?php

namespace App\Http\Requests\LopMonHoc;

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
            'malop'=>'required',
            'tenlop'=>'required'
        ];
    }
    public function messages(): array
    {
        return [
            'malop.required' => 'Không được để trống Mã lớp học',
            'tenlop.required' => 'Không được để trống Tên lớp học',
        ];
    }
}
