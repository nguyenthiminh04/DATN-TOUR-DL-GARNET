<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Admins\DonTour;
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
        // dd($bookTours);
        return view('client.myAccount.accUser', compact('user'));
    }
    public function edit()
    {
        $user = Auth::user();
        return view('client.myAccount.editAccUser', compact('user'));
    }
    public function update(Request $request, string $id)
    {
        $user = Auth::user(); 
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|regex:/^[0-9]{10,15}$/',
            'address' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'birth' => 'nullable|date',
            'gender' => 'nullable|in:nam,nu',
        ],[
            'name.required' => 'Tên không được để trống.',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email đã tồn tại trong hệ thống.',
            'phone.regex' => 'Số điện thoại không đúng định dạng.',
            'phone.max' => 'Số điện thoại không vượt quá 15 chữ số.',
            'address.string' => 'Địa chỉ phải là chữ.',
            'address.max' => 'Địa chỉ không vượt quá 255 ký tự.',
            'avatar.image' => 'Avatar phải là ảnh.',
        ]);
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $avatarPath = $file->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'birth' => $request->input('birth'),
            'gender' => $request->input('gender'),
        ]);
        return redirect()->route('my-account.edit', $user->id)->with('success', 'Cập nhật thông tin thành công.');
    }
    public function indexChangePassword()
    {
        return view('client.myAccount.resetPassMy');
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
    public function indexAddressNew()
    {
        $user = Auth::user();
        return view('client.myAccount.addressMy', compact('user'));
    }
    public function addressNew(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|digits:10',
            'address' => 'required|string|max:255',
            'zip' => 'nullable|string|max:10',
            'IsDefault' => 'nullable|boolean',
        ], [
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
    public function indexOrderMy()
    {
        $user = Auth::user();
        $bookTours = $user->bookTours()->with(['tour', 'status'])->orderBy('created_at', 'desc')->get();
        return view('client.myAccount.myOrder', compact('bookTours'));
    }
    public function details($id)
    {
        $user = Auth::user();
        $selectedOrder = $user->bookTours()->with('tour')->findOrFail($id);
        return view('client.myAccount.myOrder', compact('selectedOrder'));
    }
}
