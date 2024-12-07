<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryTourRequest extends FormRequest
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
            'category_tour' => 'required',
            'description' => 'required',
            'slug' => 'required',
            'responsibility' => 'required',
            'status' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Trường :attribute không được để trống.',
        ];
    }
}
