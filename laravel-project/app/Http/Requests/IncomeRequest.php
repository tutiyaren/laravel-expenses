<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IncomeRequest extends FormRequest
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
            'income_source_id' => 'required',
            'amount' => 'required|integer',
            'accrual_date' => 'required|date'
        ];
    }

    public function messages()
    {
        return [
            'income_source_id.required' => '収入源を選択してください',
            'amount.required' => '金額を入力してください',
            'amount.integer' => '金額は数値で入力してください',
            'accrual_date.required' => '日付を入力してください',
            'accrual_date.date' => '日付の形式で入力してください'
        ];
    }
}
