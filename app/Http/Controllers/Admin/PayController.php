<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\PaymentStatus;
use App\Models\Status;
use Illuminate\Http\Request;

class PayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $title = "Danh sách Tour";

    // Lấy giá trị ngày bắt đầu và ngày kết thúc từ request
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    // Khởi tạo query để lấy danh sách tour
    $query = Payment::query()->orderByDesc('id');

    // Áp dụng điều kiện lọc theo khoảng ngày
    if ($startDate && $endDate) {
        $query->whereBetween('time', [$startDate, $endDate]);
    } elseif ($startDate) {
        $query->whereDate('time', '>=', $startDate);
    } elseif ($endDate) {
        $query->whereDate('time', '<=', $endDate);
    }

    // Lấy danh sách tour sau khi áp dụng điều kiện
    $listTour = $query->get();

    // Các dữ liệu khác
    $trangThaiTour = Status::pluck('name', 'id')->toArray();
    $trangThaiThanhToan = PaymentStatus::pluck('name','id')->toArray();

    // Trả về view cùng dữ liệu
    return view('admin.quanlytour.index', compact('title', 'listTour', 'trangThaiTour','trangThaiThanhToan'));
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
        //
        $tour = Payment::query()->findOrFail($id);
        $currentTrangThai = $tour->status_id;
        $trangThaiTour = Status::pluck('id')->toArray();
        $newTrangThai = $request->input('status_id');
        $trangThai = array_keys($trangThaiTour);
        //Kiểm tra nếu đơn hàng đã huye thì không được thay đổi trạng thái nữa
        // if ($currentTrangThai === DonTour::HUY_TOUR ){
        //     return redirect()->route('dontour.index')->with('error','Đơn hàng đã bị hủy ko thể thay đổi được trạng thái');

        // }
        //Kiểm tra trạng thái mới không được nằm sau trạng thái hiện tại
        // if(array_search($newTrangThai,$trangThai)< array_search($currentTrangThai,$trangThai)){
        //     return redirect()->route('trangthaitour.index')->with('error','Không thể cập nhật ngược đươch trạng thái');
        // }
        $tour->status_id = $newTrangThai;
        // dd($tour);
        $tour->save();
        return redirect()->route('trangthaitour.index')->with('success','Cập nhật trạng thái đơn hàng  thành công');
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
