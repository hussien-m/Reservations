<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSessionRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'session_id' => 'required|int|exists:sessions,id',
            'start_date' => 'required|before:end_date',
            'end_date'   => 'required',
        ];
    }

    public function messages()
    {
        return [
            'session_id.required' => 'اختر نوع الجلسة',
            'session_id.int'      => 'اختر نوع الجلسة',
            'session_id.exists'   => 'اختر نوع الجلسة',
            'start_date.required' => 'ادخل تاريخ بداية الجلسة',
            'end_date.required'   => 'ادخل تاريخ انتهاء الجلسة',
            'start_date.before'   => 'يجب ان يكون تاريخ بداية الجلسة قبل موعد الانتهاء'
        ];
    }
}
