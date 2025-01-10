<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuideManagerController extends Controller
{
    public function getToursByGuide()
    {
        $user = Auth::user();

        // Kiểm tra nếu người dùng có hướng dẫn viên (guide) gắn kèm
        $guide = $user->guide;

        // Nếu không có hướng dẫn viên, trả về thông báo hoặc điều hướng khác
        if (!$guide) {
            return redirect()->route('home-admin')->with('error', 'Không tìm thấy hướng dẫn viên cho người dùng này.');
        }

        // Lấy thông tin hướng dẫn viên và các tour mà họ được gán
        $guideTours = Guide::with(['tours.tour']) // Eager load tours
            ->where('id', $guide->id)
            ->first();


        // if (!$guideTours) {
        //     return redirect()->route('home-admin')->with('error', 'Hướng dẫn viên không có tour nào được gán.');
        // }

        // dd($guideTours);
        // Trả về view với danh sách tour
        return view('admin.guide_manager.index', compact('guideTours'));
    }

    public function updateStatusPayment($id)
    {
        try {
            // Lấy bản ghi payment cần cập nhật
            $payment = Payment::findOrFail($id);

            // Cập nhật status_id thành trạng thái hoàn thành (giả sử ID trạng thái hoàn thành là 2)
            $payment->status_id = 6; // 2: Trạng thái hoàn thành (cập nhật theo hệ thống của bạn)
            $payment->save();

            // Trả về thông báo thành công
            return redirect()->route('guide-manager.getToursByGuide')
                ->with('success', 'Đã xác nhận hoàn thành tour.');
        } catch (\Exception $e) {
            // Xử lý lỗi nếu có
            return redirect()->route('guide-manager.getToursByGuide')
                ->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }
}
