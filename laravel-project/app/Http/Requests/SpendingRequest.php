<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpendingRequest extends FormRequest
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
            'category_id' => 'required',
            'name' => 'required|string|max:255',
            'amount' => 'required|integer',
            'accrual_date' => 'required|date'
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'カテゴリを選択してください',
            'name.required' => '支出名を入力してください',
            'name.string' => '支出名は文字列で入力してください',
            'name.max' => '支出名は255文字以内で入力してください',
            'amount.required' => '金額を入力してください',
            'amount.integer' => '金額は数値で入力してください',
            'accrual_date.required' => '日付を入力してください',
            'accrual_date.date' => '日付の形式で入力してください'
        ];
    }
}
