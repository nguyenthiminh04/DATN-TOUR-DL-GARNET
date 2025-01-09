<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use App\Models\Guide_tours;
use App\Models\Tour;
use App\Models\Tour_dates;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GuideToursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Guide_tours::with('tour', 'guide')->get();
        return view('admin.guide_tour.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $guides = Guide::select('id', 'name')->get();
        $tours = Tour::select('id', 'name')->get();
        return view('admin.guide_tour.create', compact('guides', 'tours'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'guide_id' => 'required|exists:guides,id',
            'tour_id' => 'required|exists:tours,id',
            'assigned_at' => 'required|date|exists:tour_dates,tour_date,tour_id,' . $request->tour_id, // Kiểm tra ngày có tồn tại trong bảng tour_dates
        ]);

        // Kiểm tra nếu hướng dẫn viên đã được gán cho tour với ngày đã chọn
        $exists = Guide_tours::where('guide_id', $request->guide_id)
            ->where('tour_id', $request->tour_id)
            ->where('assigned_at', $request->assigned_at)
            ->exists();

        if ($exists) {
            return back()->with(
                'error',
                'Hướng dẫn viên đã được gán vào tour này với ngày đã chọn.',
            );
        }

        // Lưu dữ liệu vào bảng guide_tours
        Guide_tours::create([
            'guide_id' => $request->guide_id,
            'tour_id' => $request->tour_id,
            'assigned_at' => $request->assigned_at,
        ]);

        return redirect()->route('guide_tour.index')->with('success', 'Gán hướng dẫn viên vào tour thành công.');
    }



    /**
     * Display the specified resource.
     */
    public function show(Guide_tours $guide_tours)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $guideTour = Guide_tours::findOrFail($id);
        $guides = Guide::select('id', 'name')->get();
        $tours = Tour::select('id', 'name')->get();
        $availableDates = Tour_dates::where('tour_id', $guideTour->tour_id)->pluck('tour_date')->toArray();
        // dd($availableDates);
        $tourDays = Carbon::parse($guideTour->assigned_at)->format('Y-m-d');
        return view('admin.guide_tour.edit', compact('guideTour', 'guides', 'tours', 'availableDates', 'tourDays'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'guide_id' => 'required|exists:guides,id',
            'tour_id' => 'required|exists:tours,id',
            'assigned_at' => 'required|date|exists:tour_dates,tour_date,tour_id,' . $request->tour_id, // Kiểm tra ngày có tồn tại trong bảng tour_dates
        ]);

        // Kiểm tra nếu hướng dẫn viên đã được gán cho tour với ngày đã chọn
        $exists = Guide_tours::where('guide_id', $request->guide_id)
            ->where('tour_id', $request->tour_id)
            ->where('assigned_at', $request->assigned_at)
            ->exists();

        if ($exists) {
            return back()->with(
                'error',
                'Hướng dẫn viên đã được gán vào tour này với ngày đã chọn.',
            );
        }
        $guideTour = Guide_tours::findOrFail($id);

        // Lưu dữ liệu vào bảng guide_tours
        $guideTour->update([
            'guide_id' => $request->guide_id,
            'tour_id' => $request->tour_id,
            'assigned_at' => $request->assigned_at,
        ]);

        return redirect()->route('guide_tour.index')->with('success', 'Gán hướng dẫn viên vào tour thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $guideTour = Guide_tours::findOrFail($id);
            $guideTour->delete();

            return response()->json(['status' => true, 'message' => 'Xóa thành công!']);
            
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Đã xảy ra lỗi: ' . $e->getMessage()], 500);
        }
    }


    public function getDates($tourId)
    {
        // dd(10);
        try {
            // Kiểm tra tour_id có tồn tại trong bảng tour_dates
            $dates = Tour_dates::where('tour_id', $tourId)->get(['tour_date']);
            // dd($dates);
            if ($dates->isEmpty()) {
                return response()->json(['message' => 'Không tìm thấy ngày cho tour này.'], 404);
            }

            return response()->json($dates); // Trả về kết quả
        } catch (\Exception $e) {
            // Xử lý lỗi nếu có
            return response()->json(['error' => 'Đã có lỗi xảy ra: ' . $e->getMessage()], 500);
        }
    }
}
