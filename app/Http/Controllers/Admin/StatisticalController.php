<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admins\DonTour;
use App\Models\Admins\Tour;
use App\Models\BookTour;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StatisticalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

        // $averageRating = Review::where('tour_id', $id)->avg('rating');

        // Lấy top 5 tour được đặt nhiều nhất
        $topBookedTours = BookTour::selectRaw('tour_id, COUNT(*) as total_bookings')
        ->groupBy('tour_id')
        ->orderBy('total_bookings', 'desc')
        ->with('tour')
        ->get();

        $chartData = $topBookedTours->map(function ($item) {
            return [
                'label' => trim($item->tour->name ?? 'Không xác định'), //tours
                'y' => $item->total_bookings, // đặt
            ];
        });

        // thống kê trạng thái tour
        // $statuses = BookTour::select('status', \DB::raw('COUNT(*) as count'))
        // ->groupBy('status')
        // ->get();
        // $total = $statuses->sum('count');
        // $chartData = $statuses->map(function ($item) use ($total) {
        //     return [
        //         'y' => round(($item->count / $total) * 100, 2),
        //         'label' => $this->getStatusName($item->status),
        //     ];
        // });

        // thông kê số lượng đặt tour ngày


        $data = [
            'totalMoney'        =>$totalMoney,
            'OderCount'         =>$OderCount,
            'top5Tours'         =>$top5Tours,
            'customerCount'     =>$customerCount,
            'percentage'        =>$percentage,
            'percentageChange'  =>$percentageChange,
            'chartData'         => $chartData, 
            
        
        ];
        return view('admin.dashboard',$data);
    }
    protected function getStatusName($statusId)
    {
        $statusNames = [
            1 => 'Chờ xác nhận',
            2 => 'Đã xác nhận',
            5 => 'Chưa hoàn thành',
            6 => 'Đã hoàn thành',
            13 => 'Đã hủy',
        ];
    
        return $statusNames[$statusId] ?? 'Không xác định';
    }
    public function getRevenue($timeframe)
{
    // Khởi tạo biến để lưu tổng doanh thu
    $totalMoney = 0;
    $percentage = 0;

    // Lấy dữ liệu theo khoảng thời gian
    switch ($timeframe) {
        case 'hom-qua':
            $totalMoney = DonTour::whereDate('created_at', today()->subDay())->sum('total_money');
            $previousDay = DonTour::whereDate('created_at', today()->subDays(2))->sum('total_money');
            break;
        case 'tuan-truoc':
            $totalMoney = DonTour::whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()])->sum('total_money');
            $previousDay = DonTour::whereBetween('created_at', [now()->subWeeks(2)->startOfWeek(), now()->subWeeks(2)->endOfWeek()])->sum('total_money');
            break;
        case 'thang-nay':
            $totalMoney = DonTour::whereMonth('created_at', now()->month)->sum('total_money');
            $previousDay = DonTour::whereMonth('created_at', now()->subMonth()->month)->sum('total_money');
            break;
        case 'nam-nay':
            $totalMoney = DonTour::whereYear('created_at', now()->year)->sum('total_money');
            $previousDay = DonTour::whereYear('created_at', now()->subYear()->year)->sum('total_money');
            break;
        default:
            $totalMoney = DonTour::whereDate('created_at', today())->sum('total_money');
            $previousDay = DonTour::whereDate('created_at', today()->subDay())->sum('total_money');
            break;
    }

    // Tính phần trăm thay đổi
    $percentage = $previousDay > 0 ? round((($totalMoney - $previousDay) / $previousDay) * 100, 2) : 0;

    // Trả dữ liệu về dạng JSON
    return response()->json([
        'totalMoney' => $totalMoney,
        'percentage' => $percentage,
    ]);
}

}
