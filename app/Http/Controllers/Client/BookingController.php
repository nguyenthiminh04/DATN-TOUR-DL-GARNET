<?php

namespace App\Http\Controllers\Client;

use App\Models\Admins\Tour;
use Illuminate\Http\Request;
use App\Models\Admins\Location;
use App\Http\Controllers\Controller;
use App\Models\Admins\Customer;
use App\Models\BookTour;
use App\Models\Coupon;
use App\Models\Payment;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class BookingController extends Controller
{


    public function store(Request $request)
    {
        // Xác thực dữ liệu gửi lên

        $messages = [
            'name.required' => 'Vui lòng nhập tên của bạn.',
            'name.string' => 'Tên phải là chuỗi.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không hợp lệ.',
            'phone.string' => 'Số điện thoại phải là chuỗi.',
            'phone.max' => 'Số điện thoại không được vượt quá 20 ký tự.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'address.required' => 'Vui lòng nhập địa chỉ.',
            'address.string' => 'Địa chỉ phải là chuỗi.',
            'start_date.required' => 'Ngày bắt đầu là bắt buộc.',
            'start_date.date' => 'Ngày bắt đầu phải là ngày hợp lệ.',
            'end_date.required' => 'Ngày kết thúc là bắt buộc.',
            'end_date.date' => 'Ngày kết thúc phải là ngày hợp lệ.',
            'number_old.required' => 'Số lượng người lớn là bắt buộc.',
            'number_old.integer' => 'Số lượng người lớn phải là số nguyên.',
            'number_old.min' => 'Số lượng người lớn phải lớn hơn hoặc bằng 0.',
            'number_children.required' => 'Số lượng trẻ em là bắt buộc.',
            'number_children.integer' => 'Số lượng trẻ em phải là số nguyên.',
            'number_children.min' => 'Số lượng trẻ em phải lớn hơn hoặc bằng 0.',
            'total_money.required' => 'Tổng tiền là bắt buộc.',
            'total_money.numeric' => 'Tổng tiền phải là một số.',
            'total_money.min' => 'Tổng tiền phải lớn hơn hoặc bằng 0.',
            'tour_id.required' => 'Tour là bắt buộc.',
            'tour_id.exists' => 'Tour không tồn tại.',
            'g-recaptcha-response.required' => 'Vui lòng xác minh.',
            'g-recaptcha-response.captcha' => 'Captcha không hợp lệ.',
            'agree_policy' => 'Bạn cần đồng ý với chính sách để tiếp tục!'
        ];

        // Xác thực dữ liệu gửi lên với thông báo lỗi tùy chỉnh
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',

            'note' => 'nullable|string',
            'number_old' => 'required|integer|min:0',
            'number_children' => 'required|integer|min:0',
            'total_money' => 'required|numeric|min:0',
            'status' => 'nullable|integer',
            'sale' => 'nullable|integer',
            'tour_id' => 'required|exists:tours,id',
            'g-recaptcha-response' => 'required|captcha',

            'agree_policy' => 'required',
        ], $messages);


        // Kiểm tra mã giảm giá
        $coupon = DB::table('coupons')
            ->where('code', $request->coupon)
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->where('number', '>', 0)
            ->where('tour_id', '=', $request['tour_id'])
            ->first();


        if ($coupon) {
            session(['code' => $coupon->code]);
        }


        // Kiểm tra nếu người dùng đã đăng nhập
        if (auth()->check()) {
            // Nếu người dùng đã đăng nhập
            $customerId = auth()->user()->id;
            $userId = auth()->user()->id;
        } else {
            // Nếu người dùng chưa đăng nhập, tạo khách hàng ẩn danh
            $temporaryUserId = Session::get('temporary_user_id');
            if (!$temporaryUserId) {
                $temporaryUserId = Str::uuid();  // UUID được tạo ra
                Session::put('temporary_user_id', $temporaryUserId);
            }



            // Tạo khách hàng ẩn danh hoặc tìm bản ghi hiện tại nếu đã tồn tại
            $customer = Customer::firstOrCreate(
                ['temporary_user_id' => $temporaryUserId],
                [
                    'name' => $validated['name'] ?? 'Khách hàng ẩn danh',
                    'email' => $validated['email'],
                    'phone' => $validated['phone'],
                    'type' => 'anonymous',
                ]
            );


            $customerId = $customer->id;
            $userId = null;  // Vì khách hàng ẩn danh không có user_id
        }


        // Tạo bản ghi trong bảng book_tour
        $bookTour = BookTour::create([
            'customer_id' => $customerId,
            'user_id' => $userId,  // user_id có thể là null nếu khách hàng ẩn danh
            'tour_id' => $validated['tour_id'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'date_booking' => now(),
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],

            'note' => $validated['note'] ?? null,
            'number_old' => $validated['number_old'],
            'number_children' => $validated['number_children'],
            'total_money' => $validated['total_money'],
            'status' => $validated['status'] ?? 0,
            'sale' => $validated['sale'] ?? 0,
        ]);



        // Chuyển hướng đến trang xác nhận đặt tour
        if ($bookTour->id) {
            return redirect()->route('tour.confirm', ['id' => $bookTour->id]);
        } else {
            return redirect()->back()->withErrors(['error' => 'Đặt tour không thành công. Vui lòng thử lại.']);
        }
    }






    public function showBookingInfo($id)
    {

        $code = session('code');




        // Lấy thông tin đặt tour từ bảng book_tour
        $booking = BookTour::findOrFail($id);
        //dd($booking);
        // $pay = Payment::findOrFail($id);
        $booking1 = BookTour::with('tour')->find($id);

        if (!$booking1) {
            return redirect()->back()->with('error', 'Booking not found');
        }

        $tourName = $booking1->tour ? $booking->tour->name : 'No Tour Found';


        // Trả về view và truyền dữ liệu
        return view('client.tour.confirm', compact('booking', 'tourName', 'booking1', 'code'));
    }
}
