<?php

namespace App\Http\Controllers;

use App\Models\Admins\User;
use App\Models\Permission;
use App\Models\PermissionUser;
use Illuminate\Http\Request;

class PermissionUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $permissionUsers = PermissionUser::with('permission', 'user')->get();
    
            return datatables()->of($permissionUsers)
                ->addColumn('name', function ($permissionUser) {
                    return $permissionUser->user->name; // Truy cập vào mối quan hệ user
                })
                ->addColumn('permission_name', function ($permissionUser) {
                    return $permissionUser->permission->name; // Truy cập vào mối quan hệ permission
                })
                ->addColumn('action', function ($permissionUser) {
                    return '<button id="deleteItem" class="btn btn-danger btn-sm" data-id="' . $permissionUser->id . '">Xóa</button>';
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
    public function destroy($id)
    {
        $permissionUser = PermissionUser::findOrFail($id);
        $permissionUser->delete();

        return redirect()->back()->with('success', 'Đã xóa quyền của người dùng.');
    }


    public function searchPermissions(Request $request)
    {
        $search = $request->get('q');
        $permissions = Permission::where('name', 'like', "%{$search}%")->get();

        return response()->json($permissions);
    }
}
