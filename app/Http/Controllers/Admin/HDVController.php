<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Guide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class HDVController extends Controller
{
    //
    public function index()
    {
        $users = User::where('role_id', '!=', 1)->get(); // Lấy tất cả user mà không có role_id = 1
        return view('admin.hdv.index', compact('users'));
    }
    

   

    
public function assignGuide($id)
{
    $user = User::findOrFail($id);

    // Kiểm tra email đã tồn tại trong bảng guides
    $validator = Validator::make(['email' => $user->email], [
        'email' => 'unique:guides,email',
    ]);

    if ($validator->fails()) {
        // Nếu email đã tồn tại, quay lại và báo lỗi
        return redirect()->route('hdv.index')
            ->withErrors(['email' => 'Email đã tồn tại trong danh sách hướng dẫn viên!'])
            ->withInput();
    }

    // Tạo bản ghi mới trong bảng guides
    $guider = Guide::create([
        'name' => $user->name,
        'email' => $user->email,
        'phone_number' => $user->phone, // Số điện thoại từ user
        'address' => $user->address,    // Địa chỉ từ user
        'experience' => null,           // Đặt mặc định là null
        'skills' => null,               // Đặt mặc định là null
        'status' => 'active',           // Gán mặc định là 'active'
    ]);

    // Cập nhật guide_id và role_id trong bảng users
    $user->guide_id = $guider->id;
    $user->role_id = 3; // Gán role_id thành 3
    $user->save();

    return redirect()->route('hdv.index')->with('success', 'Gán quyền hướng dẫn viên thành công!');
}

    

}
