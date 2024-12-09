<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Mail\BookingSuccess;
use App\Mail\ThankYouMail;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class sendPaymentEmailController extends Controller
{
    public function sendPaymentEmail($paymentId)
    {
        // Lấy thông tin thanh toán và các liên kết
        $payment = Payment::with(['user', 'status', 'paymentMethod', 'bookTours'])
            ->findOrFail($paymentId);

        // Tạo mảng dữ liệu để truyền vào email
        $emailData = [
            'user_name' => $payment->user->name,
            'user_email' => $payment->user->email,
            'money' => $payment->money,
            'note' => $payment->p_note,
            'status' => $payment->status->name ?? 'N/A',
            'payment_method' => $payment->paymentMethod->name ?? 'N/A',
            'transaction' => $payment->transaction,
            'code_vnpay' => $payment->code_vnpay,
            'code_bank' => $payment->code_bank,
            'time' => $payment->time,
            'bookings' => $payment->bookTours->map(function ($booking) {
                return [
                    'tour_name' => $booking->tour_name,
                    'date' => $booking->date,
                    'guests' => $booking->guests,
                    'total_price' => $booking->total_price,
                ];
            }),
        ];


        //Gửi email
        try {
            Mail::to($payment->user->email)->send(new BookingSuccess($emailData));
        } catch (\Exception $e) {
            Log::error('Failed to send email: ' . $e->getMessage());
        }



        return response()->json(['message' => 'Email sent successfully']);

    }
}
