<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Mail\BookingSuccess;
use App\Models\BookTour;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    // Xử lý lưu thanh toán
    public function storePayment(Request $request)
{
    $request->validate([
        'payment_method_id' => 'required|exists:payment_methods,id', 
        'money' => 'required|numeric',
        'p_note' => 'nullable|string|max:255',
    ]);

    
    $booking = BookTour::find($request->booking_id);
  

    if (!$booking) {
        return redirect()->back()->with('error', 'Không tìm thấy thông tin đặt tour!');
    }

    
    $pendingStatus = DB::table('statuses')->where('name', 'Chờ thanh toán')->first();

    
    $paymentMethod = DB::table('payment_methods')->find($request->payment_method_id);

    if (!$paymentMethod) {
        return redirect()->back()->with('error', 'Phương thức thanh toán không hợp lệ!');
    }

    
    $payment = Payment::create([
        'booking_id' => $booking->id,
        'user_id' => 1, 
        'money' => $request->money,
        'p_note' => $request->p_note,
        'payment_method_id' => $paymentMethod->id, 
        'status_id' => $pendingStatus->id,
        'time' => now(),
    ]);

    
    if ($paymentMethod->name === 'direct') {
        Mail::to($booking['email'])->send(new BookingSuccess($payment));
        
        return redirect()->route('payment.success', ['payment_id' => $payment->id]);
    }

    
   

    return redirect()->back()->with('error', 'Phương thức thanh toán không hợp lệ!');
}


    



    // Hiển thị trang thành công
    public function success($payment_id)
    {
        $payment = Payment::find($payment_id);
        
        if (!$payment) {
            return redirect()->route('payment.failed')->with('error', 'Không tìm thấy thông tin thanh toán!');
        }
    
        // Lấy thông tin booking từ payment
        $booking = BookTour::findOrFail($payment->booking_id);
    
        // Lấy trạng thái "Đã thanh toán" từ bảng statuses
        $paidStatus = DB::table('statuses')->where('name', 'Đã thanh toán')->first();
        
        // Lấy thông tin phương thức thanh toán từ bảng payment_methods
        $paymentMethod = DB::table('payment_methods')->find($payment->payment_method_id);
        
    
        // Kiểm tra phương thức thanh toán
        if (!$paymentMethod) {
            return redirect()->route('payment.failed')->with('error', 'Phương thức thanh toán không hợp lệ!');
        }
    
        // Nếu thanh toán qua VNPay hoặc các phương thức online
        if ($paymentMethod->name === 'vnpay' || $paymentMethod->name === 'credit-card') {
            // Cập nhật trạng thái thanh toán thành "Đã thanh toán"
            $payment->status_id = $paidStatus->id;
            $payment->save();
            Mail::to($booking['email'])->send(new BookingSuccess($payment));
    
            // Trả về view success cho thanh toán online
            return view('client.payment.success-online', compact('payment', 'booking'));
        }
    
        // Nếu thanh toán trực tiếp (Cash on Delivery)
        if ($paymentMethod->name === 'direct') {
            // Cập nhật trạng thái thanh toán thành "Chờ thanh toán"
            $pendingStatus = DB::table('statuses')->where('name', 'Chờ thanh toán')->first();
            $payment->status_id = $pendingStatus->id;
            $payment->save();
            $paymentLocation="Hà Nội";
            // Trả về view success cho thanh toán trực tiếp
            return view('client.payment.success-direct', compact('payment', 'booking','paymentLocation'));
        }
    
        // Nếu phương thức thanh toán không hợp lệ
        return redirect()->route('payment.failed')->with('error', 'Phương thức thanh toán không hợp lệ!');
    }
    
    
    public function vnpayCancel(Request $request)
    {
        $payment = Payment::where('transaction', $request->vnp_TxnRef)->first();

        if ($payment) {

            $cancelledStatus = DB::table('statuses')->where('name', 'Huỷ')->first();
            $payment->status_id = $cancelledStatus->id;
            $payment->save();
        }

        return redirect()->route('payment.failed')->with('error', 'Thanh toán VNPay đã bị huỷ.');
    }



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
     
        $booking = BookTour::find($request->booking_id);

        if (!$booking) {
            return redirect()->back()->with('error', 'Không tìm thấy thông tin đặt tour!');
        }

        
        $pendingStatus = DB::table('statuses')->where('name', 'Chờ thanh toán')->first();

        
        $payment = Payment::create([
            'booking_id' => $booking->id,
            'user_id' => 1,  
            'money' => $request->money,
            'p_note' => $request->input('p_note', ''),
            'payment_method' => 'vnpay',
            'payment_method_id' => intval($request->payment_method_id), 
            'status_id' => $pendingStatus->id,
            'time' => now(),
            
        ]);

        
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('payment.vnpayReturn', ['payment_id' => $payment->id]); 
        $vnp_TmnCode = "GKKOYDOM"; // Mã website tại VNPAY 
        $vnp_HashSecret = "07HSNBEXRMJQYXP7MLGNGRTRBVMQI68M"; // Chuỗi bí mật

        
        $vnp_TxnRef = $payment->id; 
        $vnp_OrderInfo = 'Thanh toán đơn hàng ID ' . $payment->id;
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $request->money * 100; 
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB'; 
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        
        $inputData = array(
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
        );

       
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        // Tính mã bảo mật
        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        // Trả về URL thanh toán VNPay
        $returnData = array(
            'code' => '00',
            'message' => 'success',
            'data' => $vnp_Url,
        );

        
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }
    

    public function vnpayReturn(Request $request)
    {
        
        $vnp_response_code = $request->input('vnp_ResponseCode'); 
        $payment_id = $request->input('vnp_TxnRef'); 
        $code_vnpay = $request->input('vnp_TransactionNo'); 
    
        
        $payment = Payment::find($payment_id); 
    
        if (!$payment) {
            return redirect()->route('payment.failed')->with('error', 'Không tìm thấy giao dịch!');
        }
    
        
        if ($vnp_response_code === '00') {
            
            $payment->vnp_response_code = $vnp_response_code;
            $payment->transaction = $payment_id;  
            $payment->code_vnpay = $code_vnpay;
            $payment->status_id = DB::table('statuses')->where('name', 'Đã thanh toán')->first()->id;
            $payment->save();
    
            
            return redirect()->route('payment.success', ['payment_id' => $payment->id])
                             ->with('success', 'Thanh toán thành công!');
        } 
        else {
            // Nếu thanh toán bị hủy (ví dụ như có trạng thái "Đã huỷ")
            $payment->vnp_response_code = $vnp_response_code;
            $payment->transaction = $payment_id;  
            $payment->code_vnpay = $code_vnpay;
            $payment->status_id = DB::table('statuses')->where('name', 'Đã huỷ')->first()->id;
            $payment->save();
    
           
            return redirect()->route('payment.failed', ['payment_id' => $payment->id])
                 ->with('error', 'Thanh toán đã bị hủy!');
        }
    }
    

public function failure(){
    
    return view('client.payment.failure');
}
    







}
