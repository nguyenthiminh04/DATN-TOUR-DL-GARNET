<?php

namespace App\Http\Controllers;

use App\Models\BookTour;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VnpController extends Controller
{

    // public function vnpay_payment()
    // {
    //     $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    //     $vnp_Returnurl = "http://datn-tour-dl-garnet.test/";
    //     $vnp_TmnCode = "GKKOYDOM";//Mã website tại VNPAY 
    //     $vnp_HashSecret = "07HSNBEXRMJQYXP7MLGNGRTRBVMQI68M"; //Chuỗi bí mật

    //     $vnp_TxnRef = '1245'; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này 

    //     $vnp_OrderInfo = 'thanh toán đơn hàng';
    //     $vnp_OrderType = 'billpayment';
    //     $vnp_Amount = 20000 * 100;
    //     $vnp_Locale = 'vn';
    //     $vnp_BankCode = 'NCB';
    //     $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

    //     $inputData = array(
    //         "vnp_Version" => "2.1.0",
    //         "vnp_TmnCode" => $vnp_TmnCode,
    //         "vnp_Amount" => $vnp_Amount,
    //         "vnp_Command" => "pay",
    //         "vnp_CreateDate" => date('YmdHis'),
    //         "vnp_CurrCode" => "VND",
    //         "vnp_IpAddr" => $vnp_IpAddr,
    //         "vnp_Locale" => $vnp_Locale,
    //         "vnp_OrderInfo" => $vnp_OrderInfo,
    //         "vnp_OrderType" => $vnp_OrderType,
    //         "vnp_ReturnUrl" => $vnp_Returnurl,
    //         "vnp_TxnRef" => $vnp_TxnRef,
    //         //"vnp_ExpireDate"=>$vnp_ExpireDate
    //     );

    //     if (isset($vnp_BankCode) && $vnp_BankCode != "") {
    //         $inputData['vnp_BankCode'] = $vnp_BankCode;
    //     }
    //     if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
    //         $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    //     }

    //     //var_dump($inputData);
    //     ksort($inputData);
    //     $query = "";
    //     $i = 0;
    //     $hashdata = "";
    //     foreach ($inputData as $key => $value) {
    //         if ($i == 1) {
    //             $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
    //         } else {
    //             $hashdata .= urlencode($key) . "=" . urlencode($value);
    //             $i = 1;
    //         }
    //         $query .= urlencode($key) . "=" . urlencode($value) . '&';
    //     }

    //     $vnp_Url = $vnp_Url . "?" . $query;
    //     if (isset($vnp_HashSecret)) {
    //         $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
    //         $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    //     }
    //     $returnData = array(
    //         'code' => '00'
    //         ,
    //         'message' => 'success'
    //         ,
    //         'data' => $vnp_Url
    //     );
    //     if (isset($_POST['redirect'])) {
    //         header('Location: ' . $vnp_Url);
    //         die();
    //     } else {
    //         echo json_encode($returnData);
    //     }
    //     // vui lòng tham khảo thêm tại code demo
    // }
    public function vnpay_payment(Request $request)
    {
        // Kiểm tra tính hợp lệ của dữ liệu nhận được từ form
        $request->validate([
            'booking_id' => 'required|exists:book_tour,id',
            'money' => 'required|numeric',
            'payment_method' => 'required|string|in:vnpay',
        ]);
    
        // Lấy thông tin booking
        $booking = BookTour::find($request->booking_id);
    
        if (!$booking) {
            return redirect()->back()->with('error', 'Không tìm thấy thông tin đặt tour!');
        }
    
        // Lấy trạng thái "Chờ thanh toán" từ bảng statuses
        $pendingStatus = DB::table('statuses')->where('name', 'Chờ thanh toán')->first();
    
        // Tạo một giao dịch thanh toán mới
        $payment = Payment::create([
            'booking_id' => $booking->id,
            'user_id' => 1,
            'money' => $request->money,
            'p_note' => $request->input('p_note', ''),
            'payment_method' => 'vnpay',
            'status_id' => $pendingStatus->id,
            'time' => now(),
        ]);
    
        // Thông tin cần gửi tới VNPay
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('payment.success', ['payment_id' => $payment->id]);
        $vnp_TmnCode = env('VNP_TMNCODE', 'GKKOYDOM'); // Đưa mã này vào file .env
        $vnp_HashSecret = env('VNP_HASHSECRET', '07HSNBEXRMJQYXP7MLGNGRTRBVMQI68M'); // Đưa chuỗi bí mật vào file .env
    
        $vnp_TxnRef = $payment->id;
        $vnp_OrderInfo = 'Thanh toán đơn hàng ID ' . $payment->id;
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $request->money * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $request->ip();
    
        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        ];
    
        // Nếu có mã ngân hàng
        if ($vnp_BankCode) {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
    
        ksort($inputData);
        $query = "";
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
    
        $hashdata = ltrim($hashdata, '&');
        $vnp_Url = $vnp_Url . "?" . $query;
    
        if ($vnp_HashSecret) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
    
        return redirect()->away($vnp_Url);
    }
}
