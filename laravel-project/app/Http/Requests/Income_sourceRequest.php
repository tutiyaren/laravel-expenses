<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Income_sourceRequest extends FormRequest
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
            'name' => 'required|string|max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '収入源を入力してください',
            'name.string' => '収入源を文字列で入力してください',
            'name.max' => '収入源は255文字以内で入力してください',
        ];
    }
}
