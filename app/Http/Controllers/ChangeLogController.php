<?php

namespace App\Http\Controllers;

use App\Models\ChangeLog;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChangeLogController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:view_changeLog'])->only(['index']);
    }
    public function index(Request $request)
    {
        $logs = ChangeLog::with('user')->get();
        return view('admin.logs.index', compact('logs'));
    }

    // public function employeeTourStatistics()
    // {
    //     // Thống kê nhân viên thay đổi tour
    //     $employeeTourStats = ChangeLog::selectRaw('
    //         users.name AS employee_name,
    //         tours.name AS tour_name,
    //         COUNT(change_logs.id) AS total_changes
    //     ')
    //     ->join('users', 'change_logs.user_id', '=', 'users.id')
    //     ->join('tours', 'change_logs.model_id', '=', 'tours.id')
    //     ->where('change_logs.model', 'App\\Models\\Admins\\Tour')
    //     ->groupBy('users.id', 'tours.id')
    //     ->orderBy('total_changes', 'DESC')
    //     ->get();

    //     // Nhân viên hoạt động nhiều nhất
    //     $topEmployee = ChangeLog::selectRaw('
    //         users.name AS employee_name,
    //         COUNT(change_logs.id) AS total_actions
    //     ')
    //     ->join('users', 'change_logs.user_id', '=', 'users.id')
    //     ->groupBy('users.id')
    //     ->orderBy('total_actions', 'DESC')
    //     ->first();

    //     return view('admin.logs.employee_tour', compact('employeeTourStats', 'topEmployee'));
    // }
    public function employeeTourStatistics(Request $request)
    {
        // Lấy giá trị thời gian từ request
        $startDate = $request->input('start_date') ? Carbon::parse($request->input('start_date'))->startOfDay() : null;
        $endDate = $request->input('end_date') ? Carbon::parse($request->input('end_date'))->endOfDay() : null;

        // Truy vấn thống kê nhân viên thay đổi tour
        $employeeTourStats = ChangeLog::selectRaw('
            users.name AS employee_name,
            tours.name AS tour_name,
            COUNT(change_logs.id) AS total_changes,
            MIN(change_logs.created_at) AS first_change_date,
            MAX(change_logs.created_at) AS last_change_date')
            ->join('users', 'change_logs.user_id', '=', 'users.id')
            ->join('tours', 'change_logs.model_id', '=', 'tours.id')
            ->where('change_logs.model', 'App\\Models\\Admins\\Tour')
            ->when($startDate && $endDate, function ($query) use ($startDate, $endDate) {
                $query->whereBetween('change_logs.created_at', [$startDate, $endDate]);
            })
            ->groupBy('users.id', 'tours.id')
            ->orderBy('total_changes', 'DESC')
            ->get();

        // Nhân viên hoạt động nhiều nhất
        $topEmployee = ChangeLog::selectRaw('
        users.name AS employee_name,
        COUNT(change_logs.id) AS total_actions
    ')
            ->join('users', 'change_logs.user_id', '=', 'users.id')
            ->when($startDate && $endDate, function ($query) use ($startDate, $endDate) {
                $query->whereBetween('change_logs.created_at', [$startDate, $endDate]);
            })
            ->groupBy('users.id')
            ->orderBy('total_actions', 'DESC')
            ->first();

        return view('admin.logs.employee_tour', compact('employeeTourStats', 'topEmployee', 'startDate', 'endDate'));
    }
}
