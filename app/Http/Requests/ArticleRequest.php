<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
          'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'img_thumb' => 'required',
            'category_id' => 'required',
            'user_id' => 'required',
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
