<?php

namespace App\Http\Controllers;

use App\Models\Admins\User;
use App\Models\Permission;
use App\Models\PermissionUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissionUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissionUsers = PermissionUser::with('permission', 'user')->get();
        // dd($permissionUsers);
        if (request()->ajax()) {

            return datatables()->of($permissionUsers)
                ->addColumn('name', function ($permissionUser) {
                    return $permissionUser->user->name; // Truy cập vào mối quan hệ user
                })
                ->addColumn('permission_name', function ($permissionUser) {
                    return $permissionUser->permission->name; // Truy cập vào mối quan hệ permission
                })
                ->addColumn('action', function ($permissionUser) {
                    return '<button id="deleteItem" class="btn btn-danger btn-sm" data-user-id="' . $permissionUser->user_id . '" data-permission-id="' . $permissionUser->permission_id . '">Xóa</button>';
                })
                ->rawColumns(['name', 'permission_name', 'action'])
                ->make(true);
        }

        return view('admin.permission.list_admin_permission');
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::query()->where('role_id', 1)->get();
        $permissions = PermissionUser::query()->get();
        return view('admin.permission.add_admin_permission', compact('users', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id', // Kiểm tra người dùng có tồn tại trong bảng users
            'permission_id' => 'required|array', // Kiểm tra permission_id phải là mảng
            'permission_id.*' => 'exists:permissions,id' // Kiểm tra từng permission_id có tồn tại trong bảng permissions
        ]);

        // Lưu thông báo cho nhiều người dùng
        foreach ($validatedData['permission_id'] as $permissionId) {
            PermissionUser::create([
                'user_id' => $validatedData['user_id'],
                'permission_id' => $permissionId
            ]);
        }

        session()->flash('success', 'Gán quyền cho admin thành công.');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(PermissionUser $permissionUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PermissionUser $permissionUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PermissionUser $permissionUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $userId = $request->input('user_id');
        $permissionId = $request->input('permission_id');

        // Tìm và xóa bản ghi dựa trên khóa chính tổng hợp
        $deleted = DB::table('user_permission')
            ->where('user_id', $userId)
            ->where('permission_id', $permissionId)
            ->delete();

        if ($deleted) {
            return response()->json(['status' => true, 'message' => 'Xóa thành công!']);
        }

        return response()->json(['status' => false, 'message' => 'Không tìm thấy bản ghi!']);
    }




    public function searchPermissions(Request $request)
    {
        $search = $request->get('q');
        $permissions = Permission::where('name', 'like', "%{$search}%")->get();

        return response()->json($permissions);
    }
}
