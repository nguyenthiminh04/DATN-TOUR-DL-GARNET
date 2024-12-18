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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            // 'date_booking' => 'required|date',
            'start_date' => 'required',
            'note' => 'nullable|string',
            'number_old' => 'required|integer',
            'number_children' => 'required|integer',
            'total_money' => 'required|numeric',
            'status' => 'nullable|integer',
            'sale' => 'nullable|integer',
            'tour_id' => 'required|exists:tours,id',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        // $coupon = DB::table('coupons')->where('code', $request->coupon)->first();
        $coupon = DB::table('coupons')
            ->where('code', $request->coupon)
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->where('number', '>', 0)
            ->where('tour_id', '=', $request['tour_id'])

            ->first();
        //dd($coupon);
        if ($coupon) {
            session(['code' => $coupon->code]);
        }


        //dd($code);



        // Xác thực dữ liệu gửi lên
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'note' => 'nullable|string',
            'number_old' => 'required|integer|min:0',
            'number_children' => 'required|integer|min:0',
            'total_money' => 'required|numeric|min:0',
            'status' => 'nullable|integer',
            'sale' => 'nullable|integer',
            'tour_id' => 'required|exists:tours,id',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        if (auth()->check()) {
            // Nếu người dùng đã đăng nhập
            $customerId = auth()->user()->id;
            $userId = auth()->user()->id;
        } else {
            // Nếu người dùng chưa đăng nhập, tạo khách hàng ẩn danh
            // Lấy hoặc tạo temporary_user_id
            $temporaryUserId = Session::get('temporary_user_id');
            if (!$temporaryUserId) {
                $temporaryUserId = Str::uuid();  // UUID được tạo ra
                Session::put('temporary_user_id', $temporaryUserId);
            }


            // Debug giá trị temporary_user_id
            // dd($temporaryUserId);  // Để kiểm tra

            // Tạo khách hàng ẩn danh
            $customer = Customer::firstOrCreate(
                ['temporary_user_id' => $temporaryUserId],
                [
                    'name' => $validated['name'] ?? 'Khách hàng ẩn danh',
                    'email' => $validated['email'],
                    'phone' => $validated['phone'],
                    'type' => 'anonymous',
                    'temporary_user_id' => $temporaryUserId,  // Lưu UUID vào cột temporary_user_id
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
            'note' => $validated['note'] ?? null,
            'number_old' => $validated['number_old'],
            'number_children' => $validated['number_children'],
            'total_money' => $validated['total_money'],
            'status' => $validated['status'] ?? 0,
            'sale' => $validated['sale'] ?? 0,
        ]);

        // Chuyển hướng đến trang xác nhận đặt tour
        return redirect()->route('tour.confirm', ['id' => $bookTour->id]);
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
