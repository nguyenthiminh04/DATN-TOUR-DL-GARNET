<?php

namespace App\Http\Controllers;

use App\Models\Admins\Tour;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ScheduleController extends Controller
{
     // Hiển thị danh sách lịch trình theo tour
     public function index($tourId)
     {
         $tour = Tour::findOrFail($tourId);
         $schedules = $tour->schedules;
 
         return view('schedules.index', compact('tour', 'schedules'));
     }
 
     // Hiển thị form tạo lịch trình mới
     public function create($tourId)
     {
         $tour = Tour::findOrFail($tourId);
 
         // Gọi API để lấy danh sách địa điểm
         $locations = $this->getLocationsFromAPI();
 
         return view('schedules.create', compact('tour', 'locations'));
     }
 
     // Lưu lịch trình mới
     public function store(Request $request, $tourId)
     {
         $tour = Tour::findOrFail($tourId);
 
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
 
         // Thêm lịch trình mới
         Schedule::create([
             'tour_id' => $tour->id,
             'day' => $request->day,
             'from_location' => $request->from_location,
             'to_location' => $request->to_location,
             'description' => $request->description,
         ]);
 
         return redirect()->route('schedules.index', $tour->id)->with('success', 'Thêm lịch trình thành công!');
     }
 
     // Hiển thị form chỉnh sửa lịch trình
     public function edit($tourId, $scheduleId)
     {
         $tour = Tour::findOrFail($tourId);
         $schedule = Schedule::findOrFail($scheduleId);
 
         // Gọi API để lấy danh sách địa điểm
         $locations = $this->getLocationsFromAPI();
 
         return view('schedules.edit', compact('tour', 'schedule', 'locations'));
     }
 
     // Cập nhật lịch trình
     public function update(Request $request, $tourId, $scheduleId)
     {
         $tour = Tour::findOrFail($tourId);
         $schedule = Schedule::findOrFail($scheduleId);
 
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
         $schedule = Schedule::findOrFail($scheduleId);
 
         // Xóa lịch trình
         $schedule->delete();
 
         return redirect()->route('schedules.index', $tour->id)->with('success', 'Xóa lịch trình thành công!');
     }
 
     // Gọi API để lấy thông tin địa điểm
     private function getLocationsFromAPI()
     {
         // Ví dụ: Gọi API của bạn để lấy địa điểm
         $response = Http::get('https://your-api-url.com/locations');
 
         // Kiểm tra nếu API trả về dữ liệu thành công
         if ($response->successful()) {
             return $response->json(); // Trả về danh sách địa điểm dưới dạng mảng hoặc đối tượng
         }
 
         // Nếu có lỗi, có thể trả về mảng rỗng hoặc thông báo lỗi
         return [];
     }
}
