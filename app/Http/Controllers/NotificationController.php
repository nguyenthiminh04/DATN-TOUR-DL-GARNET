<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\NotificationUser;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {

            return DataTables()->of(Notification::select('*'))
                ->addColumn('all_user', function ($notification) {
                    if ($notification->all_user == 1) {
                        return '<span class="text-success">Có</span>';
                    } else {
                        return '<span class="text-danger">Không</span>';
                    }
                })
                ->addColumn('is_active', function ($notification) {
                    if ($notification->is_active == 1) {
                        return '<span class="text-success">Hiển thị</span>';
                    } else {
                        return '<span class="text-danger">Ẩn</span>';
                    }
                })
                ->addColumn('action', function ($notification) {
                    $editUrl = route('notifications.edit', $notification->id);
                    return '
                        <a href="' . $editUrl . '" class="btn btn-subtle-secondary btn-icon btn-sm edit-item-btn" data-id="' . $notification->id . '"><i class="ph-pencil"></i></a>
                        <a href="#deleteRecordModal" id="deleteItem" data-bs-toggle="modal" data-id="' . $notification->id . '" class="btn btn-subtle-danger btn-icon btn-sm remove-item-btn"><i class="ph-trash"></i></a>
                    ';
                })
                ->rawColumns(['all_user', 'is_active', 'action']) // Cho phép HTML hiển thị trong các cột này
                ->make(true);
        }


        return view('admin.notification.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.notification.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'all_user' => 'required|in:0,1',
            'type' => 'nullable|string|max:255',
            'is_active' => 'required|in:0,1',
        ]);

        try {
            // Tạo thông báo
            $notification = Notification::create($validatedData);

            // Nếu là thông báo cho tất cả người dùng
            if ($request->all_user == 1) {
                // Lấy danh sách tất cả người dùng
                $users = User::all();

                // Tạo dữ liệu để lưu vào bảng notification_user
                $notificationUsers = $users->map(function ($user) use ($notification) {
                    return [
                        'notification_id' => $notification->id,
                        'user_id' => $user->id,
                        'is_read' => 0,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                })->toArray();

                // Thêm dữ liệu vào bảng notification_user
                NotificationUser::insert($notificationUsers);
            }

            session()->flash('success', 'Thêm mới thành công.');
            return back();
        } catch (\Exception $e) {
            // Ghi log nếu cần thiết
            // Log::error($e->getMessage());

            session()->flash('error', 'Thêm mới thất bại.');
            return back()->withErrors($e->getMessage());
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notification $notification)
    {

        return view('admin.notification.edit', compact('notification'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notification $notification)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'all_user' => 'required|in:0,1',
            'type' => 'nullable|string|max:255',
            'is_active' => 'required|in:0,1',
        ]);

        // dd($request);
        if ($validatedData) {
            $notification->update($validatedData);
            session()->flash('success', 'Sửa thành công.');
            return back();
        } else {
            session()->flash('error', 'Sửa thất bại.');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notification $notification)
    {
        $check = $notification->delete();
        if ($check) {

            return response()->json([
                'status' => true,
                'message' => 'xóa thành công.'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Xóa thất bại.'
            ]);
        }
    }
}
