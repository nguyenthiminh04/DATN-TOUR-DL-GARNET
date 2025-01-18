<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admins\Schedule as AdminsSchedule;
use App\Models\Admins\Tour;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ScheduleController extends Controller
{

    public function index($tourId)
    {
        //$tour = Tour::findOrFail($tourId);
        //dd($tour);

        $schedules = AdminsSchedule::where('tour_id', $tourId)->get();
        $tour = Tour::findOrFail($tourId);


        return view('admin.schedule.index', compact('schedules', 'tour'));
    }

    // Hiển thị form tạo lịch trình mới
    public function create($tourId)
    {
        // $tour = Tour::findOrFail($tourIdư);

        // Gọi API để lấy danh sách địa điểm
        $locations = $this->getLocationsFromAPI();

        // dd($locations);

        return view('admin.schedule.add', compact('locations', 'tourId'));
    }

    // Lưu lịch trình mới
    public function store(Request $request)
    {
        $tourId=$request->tour_id;
        $tour = Tour::findOrFail($tourId);


        // Kiểm tra số ngày tour có đủ không
        if ($request->day > $tour->time) {
            return back()->with('error', 'Ngày vượt quá số ngày của tour!');
        }

        // Thêm lịch trình mới
        AdminsSchedule::create([
            'tour_id' => $tour->id,
            'day' => $request->day,
            'from_location' => $request->from_location,
            'to_location' => $request->to_location,
            'description' => $request->description ?? '',
        ]);

        return redirect()->route('schedule.index', $tour->id)->with('success', 'Thêm lịch trình thành công!');
    }


    // Hiển thị form chỉnh sửa lịch trình
    public function edit( $scheduleId)
    {
        
        $schedule = AdminsSchedule::findOrFail($scheduleId);
        $tour=Tour::findOrFail($schedule->tour_id);

        // Gọi API để lấy danh sách địa điểm
        $locations = $this->getLocationsFromAPI();

        return view('admin.schedule.edit', compact( 'schedule', 'locations','tour'));
    }

    // Cập nhật lịch trình
    public function update(Request $request, $tourId, $scheduleId)
    {
        $tour = Tour::findOrFail($tourId);
        $schedule = AdminsSchedule::findOrFail($scheduleId);

        // Xác thực dữ liệu
        $validated = $request->validate([
            'day' => 'required|integer',
            'from_location' => 'required|string|max:255',
            'to_location' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Kiểm tra số ngày tour có đủ không
        if ($request->day > $tour->time) {
            return back()->with('error', 'Ngày vượt quá số ngày của tour!');
        }

        // Cập nhật lịch trình
        $schedule->update([
            'day' => $request->day,
            'from_location' => $request->from_location,
            'to_location' => $request->to_location,
            'description' => $request->description,
        ]);

        return redirect()->route('schedules.index', $tour->id)->with('success', 'Cập nhật lịch trình thành công!');
    }

    // Xóa lịch trình
    public function destroy($tourId, $scheduleId)
    {
        $tour = Tour::findOrFail($tourId);
        $schedule = AdminsSchedule::findOrFail($scheduleId);

        // Xóa lịch trình
        $schedule->delete();

        return redirect()->route('schedules.index', $tour->id)->with('success', 'Xóa lịch trình thành công!');
    }

    // Gọi API để lấy thông tin địa điểm
    private function getLocationsFromAPI()
    {
        // Ví dụ: Gọi API của bạn để lấy địa điểm
        $response = Http::get('https://provinces.open-api.vn/api/');

        // Kiểm tra nếu API trả về dữ liệu thành công
        if ($response->successful()) {
            return $response->json(); // Trả về danh sách địa điểm dưới dạng mảng hoặc đối tượng
        }

        // Nếu có lỗi, có thể trả về mảng rỗng hoặc thông báo lỗi
        return [];
    }
}
