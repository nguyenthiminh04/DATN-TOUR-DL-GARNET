<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admins\UserModel;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequests;
use App\Models\Status;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title ="Danh Mục User";

        $listuser = UserModel::orderBYDesc('id')->get();
        return view('admins.user.index', compact('title','listuser'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $listStatus = Status::query()->get();
        return view('admins.user.add', compact('listStatus'));
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

        // Xử lý hình ảnh đại diện
        if ($request->hasFile('avatar')) {
            $params['avatar'] = $request->file('avatar')->store('uploads/avatar', 'public');
        } else {
            $params['avatar'] = null;
        }

        // Thêm sản phẩm
        $user = UserModel::query()->create($params);

        // Lấy id sản phẩm vừa thêm để thêm được album
        $user = $user->id;

        return redirect()->route('user.index'); 
    }
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
        $user = UserModel::query()->findOrFail($id);
        return view('admins.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        if ($request->isMethod('PUT')) {
            $params = $request->except('_token', '_method');
            $user = UserModel::findOrFail($id);
        
            // Xử lý Hình Ảnh
            if ($request->hasFile('avatar')) {
                // Nếu có ảnh mới, xóa ảnh cũ và lưu ảnh mới
                if ($user->avatar) {
                    Storage::disk('public')->delete($user->avatar);
                    
                }
                $params['avatar'] = $request->file('avatar')->store('uploads/avatar', 'public');
            } else {
                // Nếu không có ảnh mới, giữ lại ảnh cũ
                $params['avatar'] = $user->avatar;
            }
        
            // Cập nhật dữ liệu
            $user->update($params);
        
            return redirect()->route('user.index');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request ,string $id)
    {
        {
           
            if ($request->isMethod('DELETE')) {
                
                $user = UserModel::findOrFail($id);
    
                if ($user) {
                    
                     $user->delete();
                     
                    return redirect()->route('user.index');
                }
                return redirect()->route('user.index');
            }
           
    
        }

    }
}
