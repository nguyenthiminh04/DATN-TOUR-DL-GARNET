<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admins\DonTour;
use App\Models\Admins\Tour;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StatisticalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware(['permission:view_dashboard'])->only(['index']);
    }
    public function index()
    {
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();
        //tính tiền hôm nay so với hôm qua
        $revenueToday = DonTour::whereDate('created_at', $today)->sum('total_money');
        $revenueYesterday = DonTour::whereDate('created_at', $yesterday)->sum('total_money');
        $percentage = 0;
        if ($revenueYesterday > 0) {
            $percentage = (($revenueToday - $revenueYesterday) / $revenueYesterday) * 100;
        }
        // Lấy tổng số lượng đơn đặt tour hôm nay và ngày hôm qua
        $bookTourToday = DonTour::whereDate('created_at', $today)->count();
        $bookTourYesterday = DonTour::whereDate('created_at', $yesterday)->count();

    // Tính phần trăm thay đổi số lượng đơn đặt tour hôm nay so với ngày hôm qua
        $percentageChange = 0;
        if ($bookTourYesterday > 0) {
            $percentageChange = (($bookTourToday - $bookTourYesterday) / $bookTourYesterday) * 100;
        }
        //tỉnh tổng tiền các tour
        $totalMoney = DonTour::whereDate('created_at', $today)->sum('total_money');

        //tính số lượng tour
        $OderCount = DonTour::whereDate('created_at', $today)->count();
        // Lấy top 5 tour được đặt nhiều nhất
        $top5Tours = Tour::withCount('bookTours')->orderBy('book_tours_count', 'desc') ->take(5)->get();
        // Đếm số khách hàng đã đặt tour hôm nay
        $customerCount = DonTour::whereDate('created_at', $today)->distinct('user_id')->count('user_id'); 
        // dd($totalMoney);
        return view('admin.dashboard',compact('totalMoney','OderCount','top5Tours','customerCount','percentage','percentageChange'));
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
