<?php

namespace App\Http\Controllers\Client;

use App\Models\Admins\Tour;
use Illuminate\Http\Request;
use App\Models\Admins\Location;
use App\Http\Controllers\Controller;
use App\Models\BookTour;
use App\Models\Payment;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        // Xác thực dữ liệu gửi lên
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            // 'date_booking' => 'required|date',
            'start_date' => 'required',
            'note' => 'nullable|string',
            'number_old' => 'required|integer',
            'number_children' => 'required|integer',
            'total_money' => 'required|numeric',
            'status' => 'nullable|integer',
            'sale' => 'nullable|integer',
            'tour_id' => 'required|exists:tours,id',
        ]);

        // Tạo mới bản ghi đặt tour
        $bookTour = BookTour::create([
            // 'user_id' => auth()->id(), 
            'user_id' => auth()->check() ? auth()->user()->id : 1,

            // 'user_id' => auth()->user()->id,

            // 'tour_id' => $validated['tour_id'],
            'tour_id' => $validated['tour_id'],

            // 'guide_id' => $validated['guide_id'] ?? null, // optional field
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'date_booking' => now(),
            'start_date' => $validated['start_date'],
            'note' => $validated['note'] ?? null,
            'number_old' => $validated['number_old'],
            'number_children' => $validated['number_children'],
            'total_money' => $validated['total_money'],
            'status' => $validated['status'] ?? 0, // Mặc định là 0
            'sale' => $validated['sale'] ?? 0, // Mặc định là 0
        ]);


        return redirect()->route('tour.confirm', ['id' => $bookTour->id]);
    }
    public function showBookingInfo($id)
    {
        // Lấy thông tin đặt tour từ bảng book_tour
        $booking = BookTour::findOrFail($id);
        //dd($booking);
        // $pay = Payment::findOrFail($id);
        // dd($pay);
        $booking1 = BookTour::with('tour')->find($id);

        if (!$booking1) {
            return redirect()->back()->with('error', 'Booking not found');
        }

        $tourName = $booking1->tour ? $booking->tour->name : 'No Tour Found';

        
        // Trả về view và truyền dữ liệu
        return view('client.tour.confirm', compact('booking', 'tourName','booking1'));
    }
}
