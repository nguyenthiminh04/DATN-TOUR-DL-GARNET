<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Mail\CancelProofUploaded;
use App\Mail\RejectCancelTourMail;
use Illuminate\Support\Facades\Mail;


class HuyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $query = Payment::query()
    ->where('payment_status_id', 2)
    ->where('status_id', 13)
    ->where('payment_method_id', 1)
    ->orderByDesc('id');

$listTour = $query->paginate(10);

return view('admin.quanlytour.huytou', compact('listTour'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $quanlytour = Payment::findOrFail($id);

        return view('admin.quanlytour.detailshuy', compact('quanlytour'));  // Trả về view chi tiết
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return view('admin.quanlytour.acp');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // Validate dữ liệu đầu vào
    $request->validate([
        'cancel_proof_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ảnh minh chứng
        'confirmation_code'  => 'required|string|max:255',                      // Mã xác nhận
    ]);

    // Tìm thông tin thanh toán và booking liên quan
    $payment = Payment::with(['booking', 'booking.tour'])->findOrFail($id);
    $bookTour = $payment->booking;

    // Kiểm tra nếu không có booking hoặc không tồn tại
    if (!$bookTour) {
        return redirect()->back()->with('error', 'Thông tin đặt tour không tồn tại.');
    }

    // Lưu đường dẫn ảnh QR nếu được tải lên
    $qrCodePath = null;
    if ($request->hasFile('cancel_proof_image')) {
        $qrCodePath = $request->file('cancel_proof_image')->store('cancel_proof_images', 'public'); // Lưu vào thư mục `storage/app/public/qr_codes`
    }

    // Cập nhật thông tin vào bảng `book_tour`
    $bookTour->update([
        'confirmation_code' => $request->confirmation_code,
        'cancel_proof_image' => $qrCodePath,
    ]);

    // Gửi thông báo hoặc phản hồi về kết quả
    return redirect()->back()->with('success', 'Yêu cầu hoàn tiền đã được gửi thành công. Chúng tôi sẽ xử lý trong thời gian sớm nhất.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function acceptCancel(string $id)
    {
        
    }
    public function rejectCancel(Request $request, string $id)
    {
        // Tìm thông tin thanh toán hoặc đặt tour
        $payment = Payment::with(['booking', 'booking.user'])->findOrFail($id); // Gọi thêm liên kết với user để lấy email
        $bookTour = $payment->booking;
        // Kiểm tra trạng thái hiện tại, nếu cần
        if ($payment->status_id == 1) {
            return redirect()->back()->with('info', 'Tour này đã ở trạng thái không được hủy.');
        }
    
        // Cập nhật trạng thái về 1 (không cho hủy)
        $payment->update([
            'status_id' => 1,
        ]);
    
        // Gửi email thông báo cho khách hàng
        $userEmail = $bookTour->email; // Email của khách hàng từ bảng `book_tour`
        $tourName = $bookTour->tour->name; // Tên tour
        Mail::to($userEmail)->queue(new RejectCancelTourMail($tourName));
    
        // Phản hồi lại cho người dùng
        return redirect()->back()->with('success', 'Đã cập nhật trạng thái. .');
    }
    
    
    
    public function uploadCancelProof(Request $request, string $id)
    {
        // Tìm thông tin thanh toán và booking liên quan
        $payment = Payment::with(['booking', 'booking.tour'])->findOrFail($id);
        $bookTour = $payment->booking;
    
        // Kiểm tra nếu không có booking hoặc không tồn tại
        if (!$bookTour) {
            return redirect()->back()->with('error', 'Thông tin đặt tour không tồn tại.');
        }
    
        // Lưu đường dẫn ảnh QR nếu được tải lên
        $qrCodePath = null;
        if ($request->hasFile('cancel_proof_image')) {
            $qrCodePath = $request->file('cancel_proof_image')->store('cancel_proof_images', 'public');
        }
    
        // Cập nhật thông tin vào bảng `book_tour`
        $bookTour->update([
            'confirmation_code' => $request->confirmation_code,
            'cancel_proof_image' => $qrCodePath,
        ]);
    
        // Cập nhật trạng thái thanh toán
        $payment->update([
            'payment_status_id' => 3, // Chuyển sang trạng thái có ID là 3
        ]);
    $sotien = $payment->refund_amount;
        // Gửi email tới người dùng
        $userEmail = $bookTour->email; // Email của khách hàng từ bảng `book_tour`
        Mail::to($userEmail)->queue(new CancelProofUploaded($request->confirmation_code, $qrCodePath,$sotien));
    
        // Gửi thông báo hoặc phản hồi về kết quả
        return redirect()->back()->with('success', 'Yêu cầu hoàn tiền đã được gửi thành công. .');
    }
    
    
}
