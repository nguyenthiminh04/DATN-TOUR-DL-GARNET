<?php

namespace App\Http\Controllers;

use App\Models\BookTour;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function storePayment(Request $request)
{
    // Validate các trường trong form thanh toán
    $request->validate([
        'payment_method' => 'required|string',
        'money' => 'required|numeric',
        'p_note' => 'nullable|string|max:255',
    ]);

    // Lấy thông tin booking từ session hoặc database
    $booking = BookTour::find($request->booking_id);  // Giả sử bạn có booking_id trong form

    // Lưu thông tin thanh toán vào bảng payments
    $payment = new Payment();
    $payment->booking_id = $booking->id; // Lấy ID của booking
    // $payment->user_id = auth()->user()->id; // Lấy ID của người dùng
    $payment->user_id=1;
    $payment->money = $request->money; // Số tiền thanh toán
    $payment->p_note = $request->p_note; // Ghi chú thanh toán (nếu có)
    $payment->vnp_response_code = $request->vnp_response_code; // Mã phản hồi VNPay (nếu có)
    $payment->transaction = $request->transaction; // Mã giao dịch (nếu có)
    $payment->code_vnpay = $request->code_vnpay; // Mã VNPay (nếu có)
    $payment->code_bank = $request->code_bank; // Mã ngân hàng (nếu có)
    $payment->time = now(); // Thời gian thanh toán
    $payment->trang_thai = $request->trang_thai; // Trạng thái thanh toán (nếu có)
    $payment->save(); // Lưu vào bảng payments

    // Sau khi lưu thành công, bạn có thể chuyển hướng người dùng đến trang xác nhận hoặc trang khác
    return redirect()->route('payment.success', ['bookingId' => $booking->id]);
}
public function success($bookingId)
{
    // Lấy thông tin booking từ database
    $booking = BookTour::find($bookingId);

    if (!$booking) {
        return redirect()->route('payment.failure')->with('error', 'Không tìm thấy thông tin booking!');
    }

    // Lấy thông tin thanh toán từ bảng payments
    $payment = Payment::where('booking_id', $bookingId)->first();

    // Trả về view success, truyền thông tin booking và payment vào view
    return view('client.payment.success', compact('booking', 'payment'));
}
}
