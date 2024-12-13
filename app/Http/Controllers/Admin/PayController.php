<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admins\Tour;
use App\Models\Status;
use App\Models\Payment;
use App\Models\BookTour;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\PaymentStatus;
use App\Http\Controllers\Controller;

class PayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Danh sách Tour";


        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $status_id = $request->get('status_id');
        $payment_method_id = $request->get('payment_method_id');
        $query = Payment::query()->orderByDesc('id');

        if ($status_id !== null) {
            $query->where('payments.status_id', $status_id);
        }
        if ($payment_method_id !== null) {
            $query->where('payments.payment_method_id', $payment_method_id);
        }


        if ($startDate && $endDate) {
            $query->whereBetween('time', [$startDate, $endDate]);
        } elseif ($startDate) {
            $query->whereDate('time', '>=', $startDate);
        } elseif ($endDate) {
            $query->whereDate('time', '<=', $endDate);
        }

        $listTour = $query->get();

        $trangThaiTour = Status::pluck('name', 'id')->toArray();

        $trangThaiThanhToan = PaymentStatus::pluck('name', 'id')->toArray();

        if ($request->ajax()) {
            return response()->json([
                'data' => $listTour
            ]);
        }
        return view('admin.quanlytour.index', compact('title', 'listTour', 'trangThaiTour', 'trangThaiThanhToan'));
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
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Tìm thông tin Payment
        $tour = Payment::query()->findOrFail($id);

        // Lấy giá trị hiện tại và giá trị mới
        $paymentStatusId = $tour->payment_status_id;
        $currentTrangThai = $tour->status_id;
        $newTrangThai = $request->input('status_id');

        // Kiểm tra điều kiện: chỉ cho phép chuyển status_id sang 6 nếu payment_status_id là 2
        if ($newTrangThai == 6 && $paymentStatusId != 2) {
            return redirect()->route('trangthaitour.index')
                ->with('error', 'Chỉ có thể chuyển trạng thái "Đã thanh toán" (ID: 6) khi trạng thái thanh toán (payment_status_id) là "Đã đặt cọc" (ID: 2).');
        }

        // Kiểm tra điều kiện: không cho phép chuyển ngược trạng thái
        if ($newTrangThai < $currentTrangThai) {
            return redirect()->route('trangthaitour.index')
                ->with('error', 'Không thể chuyển trạng thái ngược. Vui lòng chọn trạng thái hợp lệ.');
        }

        // Kiểm tra điều kiện: không cho phép chuyển status_id sang 13 nếu payment_status_id là 2
        if ($newTrangThai == 13 && $paymentStatusId == 2) {
            return redirect()->route('trangthaitour.index')
                ->with('error', 'Không thể chuyển trạng thái sang ID: 13 vì khách hàng đã thanh toán (payment_status_id là 2).');
        }

        // Gán trạng thái mới và lưu
        $tour->status_id = $newTrangThai;
        $tour->save();

        return redirect()->route('trangthaitour.index')
            ->with('success', 'Cập nhật trạng thái đơn hàng thành công');
    }






    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function ThanhToan(Request $request, string $id)
    {
        // Tìm Payment bằng ID
        $tour = Payment::findOrFail($id);

        // Cập nhật trạng thái thanh toán
        $tour->payment_status_id = $request->input('payment_status_id');
        $tour->save();

        // Chuyển hướng về danh sách tour với thông báo thành công
        return redirect()->route('trangthaitour.index')->with('success', 'Cập nhật trạng thái thanh toán thành công');
    }
}
