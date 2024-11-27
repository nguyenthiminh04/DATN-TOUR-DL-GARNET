<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class myAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $bookTours = $user->bookTours()->with(['tour', 'status'])->orderBy('created_at', 'desc')->get();
        // dd($bookTours);
        return view('client.myAccount.Account',compact('user','bookTours'));
    }
    public function changePassword(Request $request)
    {
        // dd($request);
        $request->validate([
            'current_password' => 'required|string|min:6|max:255',
            'new_password' => 'required|string|min:6|max:255|confirmed',
        ], [
            'current_password.required' => 'Vui lòng nhập mật khẩu hiện tại.',
            'current_password.string' => 'Mật khẩu hiện tại phải là chuỗi ký tự.',
            'current_password.min' => 'Mật khẩu hiện tại phải có ít nhất 6 ký tự.',
            'current_password.max' => 'Mật khẩu hiện tại không được vượt quá 255 ký tự.',
            'new_password.required' => 'Vui lòng nhập mật khẩu mới.',
            'new_password.string' => 'Mật khẩu mới phải là chuỗi ký tự.',
            'new_password.min' => 'Mật khẩu mới phải có ít nhất 6 ký tự.',
            'new_password.max' => 'Mật khẩu mới không được vượt quá 255 ký tự.',
            'new_password.confirmed' => 'Xác nhận mật khẩu mới không khớp.',
        ]);
        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return back()->with('error', 'Mật khẩu hiện tại không đúng.');
        }
        $user = auth()->user();
        $user->password = bcrypt($request->new_password);
        $user->save();
        return back()->with('success', 'Đổi mật khẩu thành công.');
    }
    public function addressNew(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|digits:10',
            'address' => 'required|string|max:255',
            'zip' => 'nullable|string|max:10',
            'IsDefault' => 'nullable|boolean',
        ],[
            'name.required' => 'Tên là bắt buộc.',
            'name.string' => 'Tên phải là một chuỗi ký tự.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'phone.required' => 'Số điện thoại là bắt buộc.',
            'phone.numeric' => 'Số điện thoại phải là một số.',
            'phone.digits' => 'Số điện thoại phải có đúng 10 chữ số.',
            'address.required' => 'Địa chỉ là bắt buộc.',
            'address.string' => 'Địa chỉ phải là một chuỗi ký tự.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
            'zip.string' => 'Mã bưu chính phải là một chuỗi ký tự.',
            'zip.max' => 'Mã bưu chính không được vượt quá 10 ký tự.',
        ]);
        $user = auth()->user();
        $user->name = $request->name ?? auth()->user()->name;
        $user->phone = $request->phone;
        $user->address = $request->address;

        $user->save();
        return redirect()->back()->with('success', 'Cập nhật địa chỉ thành công!');
    }
}
