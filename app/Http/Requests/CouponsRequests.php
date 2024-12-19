<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponsRequests extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'name' => 'required|string|max:255',
            'tour_id' => 'required|integer',
            'code' => 'required|string|max:10',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'percentage_price' => 'required|numeric|min:0|max:100',
            'status' => 'required|boolean',
        ];
    }
    public function messages(): array
    {
        return[
            'name.required' => 'Trường name không được để trống.',
            'name.max' => 'Trường name không được quá 255 ký tự.',
            'tour_id.required' => 'Trường tour_id không được để trống.',
            'code.required' => 'Trường code không được để trống.',
            'code.max' => 'Trường code không được quá 10 ký tự.',
            'start_date.required' => 'Trường start_date không được để trống.',
            'start_date.date' => 'Trường start_date phải là định dạng ngày.',
            'end_date.required' => 'Trường end_date không được để trống.',
            'end_date.date' => 'Trường end_date phải là định dạng ngày.',
            'end_date.after' => 'Trường end_date phải sau ngày start_date.',
            'percentage_price.required' => 'Trường percentage_price không được để trống.',
            'percentage_price.min' => 'Mã giảm giá không thể 0.',
            'percentage_price.max' => 'Mã giảm giá không thể quá 100.',
            'status.required' => 'Trường status không được để trống.',

        ];
    }
}
