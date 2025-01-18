<?php

namespace App\Http\Controllers\Admin;

use App\Models\Status;
use App\Models\Admins\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequests;
use App\Http\Controllers\Controller;
use App\Models\Admins\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:view_user'])->only(['index']);
        // $this->middleware(['permission:create_user'])->only(['create']);
        // $this->middleware(['permission:store_user'])->only(['store']);
        // $this->middleware(['permission:edit_user'])->only(['edit']);
        // $this->middleware(['permission:update_user'])->only(['update']);
        // $this->middleware(['permission:destroy_user'])->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Danh Sách Nhân viên";

        $status = $request->get('status');
        $query = User::query();

        if ($status !== null) {
            $query->where('status', $status);
        }

        
        $listuser = User::with('role')->get();
       



        if ($request->ajax()) {
            return response()->json([
                'data' => $listuser
            ]);
        }

        return view('admin.staff.index', compact('title', 'listuser'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $listStatus = Status::query()->get();
        $listRole = Role::query()
            ->whereIn('id', [3, 4])
            ->get();
        return view('admin.staff.add', compact('listStatus', 'listRole'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequests $request)
    {
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');

            // Lấy trực tiếp giá trị từ dropdown
            $params['status'] = $request->input('status');
            $params['role_id'] = $request->input('role');

            $params['password'] = bcrypt($request->input('password'));


            // Xử lý hình ảnh đại diện
            if ($request->hasFile('avatar')) {
                $params['avatar'] = $request->file('avatar')->store('uploads/avatar', 'public');
            } else {
                $params['avatar'] = null;
            }

            // Thêm sản phẩm
            $user = User::query()->create($params);

            // Lấy id sản phẩm vừa thêm để thêm được album
            $user = $user->id;

            return redirect()->route('useradmin.index')->with('success', 'Thêm mới thành công!');
            ;
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::with('role')->findOrFail($id);
        return view('admin.staff.details', compact('user'));  
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::with('role')->findOrFail($id);
        $listRole = Role::query()
        ->whereIn('id', [3, 4])
        ->get();

        return view('admin.staff.edit', compact('user','listRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        if ($request->isMethod('PATCH')) {
           
            $role_id = $request->role;
            $status=$request->status;
            User::where('id', $id)->update([
                'role_id' => $role_id,
                'status'  => $status,
            ]);

            return redirect()->route('useradmin.index')->with('success', 'Cập nhật thành công!');
            ;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    { {

            if ($request->isMethod('DELETE')) {

                $user = User::findOrFail($id);

                if ($user) {

                    $user->delete();

                    return redirect()->route('user.index');
                }
                return redirect()->route('user.index');
            }
        }
    }


    public function userStatus(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Không tìm thấy người dùng'], 404);
        }


        if ($user->role_id == 1) {
            return response()->json(['success' => false, 'message' => 'Không thể thay đổi trạng thái của tài khoản này'], 403);
        }

        $user->status = $user->status == 0 ? 1 : 0;
        $user->save();

        return response()->json([
            'success' => true,
            'status' => $user->status
        ]);
    }
}
