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
        $id = $this->route('tour');

        return [
            'name' => 'required|max:255|unique:tours,name,' . $id,
            'journeys' => 'required|max:255',
            'schedule' => 'required|max:255',
            'move_method' => 'required|max:255',
            'starting_gate' => 'required|max:255',
            'start_date' => 'required|date|after_or_equal:today|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'number' => 'numeric|min:1|max_digits:10',
            'number_guests' => 'required|integer|min:1',
            'price_old' => 'required|numeric|min:0',
            'price_children' => 'required|numeric|min:0',
            'sale' => 'required|numeric|min:0|max:100',
            'description' => 'required|string',
            'image' => 'mimes:jpeg,png,jpg,gif,svg',
            'location_id' => 'required',
            'user_id' => 'required',
            'status' => 'required',

        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên là bắt buộc.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'name.unique' => 'Tên đã tồn tại.',
            'journeys.required' => 'Hành trình là bắt buộc.',
            'journeys.max' => 'Hành trình không được vượt quá 255 ký tự.',
            'schedule.required' => 'Lịch trình là bắt buộc.',
            'schedule.max' => 'Lịch trình không được vượt quá 255 ký tự.',
            'move_method.required' => 'Phương thức di chuyển là bắt buộc.',
            'move_method.max' => 'Phương thức di chuyển không được vượt quá 255 ký tự.',
            'starting_gate.required' => 'Cổng khởi hành là bắt buộc.',
            'starting_gate.max' => 'Cổng khởi hành không được vượt quá 255 ký tự.',
            'start_date.required' => 'Ngày bắt đầu là bắt buộc.',
            'start_date.date' => 'Ngày bắt đầu phải là ngày hợp lệ.',
            'start_date.after_or_equal' => 'Ngày bắt đầu không được là ngày trong quá khứ.',
            'start_date.before_or_equal' => 'Ngày bắt đầu không được lớn hơn ngày kết thúc',
            'end_date.required' => 'Ngày kết thúc là bắt buộc.',
            'end_date.date' => 'Ngày kết thúc phải là ngày hợp lệ.',
            'end_date.after_or_equal' => 'Ngày kết thúc phải bằng hoặc sau ngày bắt đầu.',
            'number.numeric' => 'Số lượng này phải là một số.',
            'number.min' => 'Số lượng phải lớn hơn hoặc bằng 1.',
            'number.max_digits' => 'Số lượng không được vượt quá 10 ký tự.',
            'number_guests.required' => 'Số lượng khách là bắt buộc.',
            'number_guests.integer' => 'Số lượng khách phải là số nguyên.',
            'number_guests.min' => 'Số lượng khách phải lớn hơn hoặc bằng 1.',
            'price_old.required' => 'Giá cũ là bắt buộc.',
            'price_old.numeric' => 'Giá cũ phải là số.',
            'price_old.min' => 'Giá cũ không được âm.',
            'price_children.required' => 'Giá trẻ em là bắt buộc.',
            'price_children.numeric' => 'Giá trẻ em phải là số.',
            'price_children.min' => 'Giá trẻ em không được âm.',
            'sale.required' => 'Giảm giá là bắt buộc.',
            'sale.numeric' => 'Giảm giá phải là số.',
            'sale.min' => 'Giảm giá không được nhỏ hơn 0%.',
            'sale.max' => 'Giảm giá không được lớn hơn 100%.',
            'description.required' => 'Mô tả là bắt buộc.',
            // 'content.required' => 'Nội dung là bắt buộc.', // Nếu có trường nội dung thì cần thêm dòng này
            'image.required' => 'Hình ảnh là bắt buộc.',
            'image.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, gif hoặc svg.',
            'image.max' => 'Hình ảnh không được vượt quá 2MB.',
            'location_id.required' => 'Địa điểm là bắt buộc.',
            'user_id.required' => 'Người dùng là bắt buộc.',
            'status.required' => 'Trạng thái là bắt buộc.',
        ];
    }
}
