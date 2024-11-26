<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourRequest extends FormRequest
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
          'name' => 'required',
            'journeys' => 'required',
            'schedule' => 'required',
            'move_method' => 'required',
            'starting_gate' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'number_guests' => 'required',
            'price_old' => 'required',
            'price_children' => 'required',
            'sale' => 'required',
            'description' => 'required',
            'content' => 'required',
            'image' => 'required',
            'location_id' => 'required',
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
