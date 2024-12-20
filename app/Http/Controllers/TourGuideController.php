<?php

namespace App\Http\Controllers;

use App\Models\Admins\Tour;
use App\Models\Admins\User;
use App\Models\Tour_Guide;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TourGuideController extends Controller
{
    public function index()
    {
        $tour_guide = Tour_Guide::with(['tour', 'user'])->get();
        // dd($tour_guide);
        return view('admin.tour_guide.index', compact('tour_guide'));
    }

    public function create()
    {
        $users = User::query()
            ->where('role_id', 4)
            ->get();

        // Lấy danh sách các tour đang hoạt động từ hôm nay trở đi
        $tours = Tour::query()
            ->whereDate('end_date', '>=', now()) // Tour chưa kết thúc
            ->whereDate('start_date', '<=', now()) // Tour đã bắt đầu hoặc bắt đầu từ hôm nay
            ->get();

        return view('admin.tour_guide.add', compact('users', 'tours'));
    }


    public function store(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'tour_id' => 'required|exists:tours,id',
            'assigned_at' => 'required|date|after_or_equal:today',  // Kiểm tra ngày hợp lệ
        ]);

        $userId = $validated['user_id'];
        $tourId = $validated['tour_id'];
        $assignedAt = Carbon::parse($validated['assigned_at']);  // Chuyển đổi thành đối tượng Carbon

        // Lấy tour
        $tour = Tour::find($tourId);

        // Kiểm tra tour có start_date hợp lệ không
        if (!$tour || !$tour->start_date) {
            return redirect()->back()->withErrors(['tour_id' => 'Tour này không có ngày bắt đầu hợp lệ.']);
        }

        // Kiểm tra xem hướng dẫn viên đã được gán cho tour này trong ngày không
        $existingGuide = Tour_Guide::where('tour_id', $tourId)
            ->whereDate('assigned_at', $assignedAt->format('Y-m-d'))  // So sánh chỉ ngày
            ->where('user_id', $userId)  // Kiểm tra xem user đã được gán cho tour đó hay chưa
            ->exists();

        if ($existingGuide) {
            return redirect()->back()->withErrors(['tour_id' => 'Hướng dẫn viên này đã được gán cho tour này trong ngày ' . $assignedAt->format('d/m/Y') . '.']);
        }

        // Gán hướng dẫn viên cho tour
        Tour_Guide::create([
            'user_id' => $userId,
            'tour_id' => $tourId,
            'assigned_at' => $assignedAt,
        ]);

        return redirect()->route('tour-guides.index')->with('success', 'Gán hướng dẫn viên thành công!');
    }

    public function edit(Tour_Guide $tour_guide)
    {
        // Lấy danh sách hướng dẫn viên có vai trò là hướng dẫn viên
        $users = User::where('role_id', 4)->get();

        // Lấy danh sách các tour hợp lệ (đang diễn ra hoặc chưa kết thúc)
        $tours = Tour::whereDate('end_date', '>=', now()) // Tour chưa kết thúc
            ->whereDate('start_date', '<=', now())       // Tour đã bắt đầu hoặc bắt đầu từ hôm nay
            ->get();

        return view('admin.tour_guide.edit', compact('tour_guide', 'users', 'tours'));
    }

    public function update(Request $request, Tour_Guide $tour_guide)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'tour_id' => 'required|exists:tours,id',
            'assigned_at' => 'required|date',
        ]);

        $tour = Tour::find($validated['tour_id']);

        // Kiểm tra ngày có trong khoảng hợp lệ không
        if (!$tour || $validated['assigned_at'] < $tour->start_date || $validated['assigned_at'] > $tour->end_date) {
            return redirect()->back()->withErrors(['assigned_at' => 'Ngày không nằm trong khoảng hợp lệ của tour.']);
        }

        // Cập nhật thông tin
        $tour_guide->update($validated);

        return redirect()->route('tour-guides.index')->with('success', 'Cập nhật thành công!');
    }

    public function destroy(Tour_Guide $tour_guide)
    {
        try {
            if ($tour_guide->delete()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Xóa thành công.'
                ]);
            }

            return response()->json([
                'status' => false,
                'message' => 'Xóa thất bại. Vui lòng thử lại.'
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage()
            ], 500);
        }
    }
}
