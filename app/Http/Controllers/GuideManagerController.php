<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use App\Models\Guide_tours;
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

        // Nếu không có hướng dẫn viên, trả về thông báo hoặc hành động khác
        if (!$guide) {
            return redirect()->route('some.route')->with('error', 'Không tìm thấy hướng dẫn viên cho người dùng này.');
        }

        // Lấy các tour gán cho hướng dẫn viên đó
        $tours = $tours = Guide_tours::where('guide_id', $guide->id)
            ->with('tour') // Lấy quan hệ với bảng tours
            ->get();
        // dd($tours);
        return view('admin.guide_manager.index', compact('guide', 'tours'));
    }

    public function updateStatus(Request $request, $id)
    {
        // Lấy thông tin người dùng hiện tại
        $user = Auth::user();

        // Kiểm tra xem user có phải hướng dẫn viên hay không
        if (!$user->guide) {
            return response()->json(['status' => false, 'message' => 'Bạn không có quyền cập nhật trạng thái này!'], 403);
        }

        // Tìm payment theo ID
        $payment = Payment::findOrFail($id);

        // Cập nhật status_id thành 6
        $payment->status_id = 6;
        $payment->save();

        return response()->json(['status' => true, 'message' => 'Cập nhật trạng thái thành công!']);
    }
}
