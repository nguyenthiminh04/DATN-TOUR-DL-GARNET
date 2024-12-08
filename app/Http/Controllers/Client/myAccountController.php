<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\BookTour;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Admins\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class myAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Kiểm tra nếu người dùng đã đăng nhập
        if (auth()->check()) {
            // Lấy thông tin người dùng đã đăng nhập
            $user = auth()->user();
            $payments = Payment::where('user_id', $user->id)
                ->with([
                    'booking' => function ($query) {
                        $query->with(['tour', 'status']);
                    }
                ])
                ->orderBy('created_at', 'desc')
                ->get();
            // Lấy các đơn hàng của người dùng đã đăng nhập
            $bookTours = $user->bookTours()->with(['tour', 'status'])->orderBy('created_at', 'desc')->get();

        } else {
            // Nếu không đăng nhập, lấy temporary_user_id từ session
            $temporaryUserId = Session::get('temporary_user_id');
    
            if (!$temporaryUserId) {
                return redirect()->route('home')->with('error', 'Không tìm thấy thông tin khách hàng ẩn danh.');
            }
    
            // Tìm khách hàng ẩn danh dựa trên temporary_user_id
            $customer = Customer::where('temporary_user_id', $temporaryUserId)->first();
    
            if (!$customer) {
                return redirect()->route('home')->with('error', 'Không tìm thấy khách hàng ẩn danh.');
            }
    
            // Lấy các đơn hàng của khách hàng ẩn danh
            $bookTours = BookTour::where('customer_id', $customer->id)
                                 ->with(['tour', 'status'])
                                 ->orderBy('created_at', 'desc')
                                 ->get();
    
            // Vì không có người dùng đăng nhập, không cần truyền biến $user
            $user = null;
        }
    
        // Trả về view với thông tin người dùng và các đơn hàng
        return view('client.myAccount.Account', compact('user', 'bookTours','payments'));
    }
    

    public function changePassword(Request $request)
    {
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
            return response()->json([
                'status' => 'error',
                'message' => 'Mật khẩu hiện tại không đúng.'
            ], 400);
        }


        $user = auth()->user();
        $user->password = bcrypt($request->new_password);
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Đổi mật khẩu thành công.'
        ]);
    }

    public function addressNew(Request $request)
    {
        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|digits:10',
            'address' => 'required|string|max:255',
            'zip' => 'nullable|string|max:10',
            'IsDefault' => 'nullable|boolean',
        ], [
            'name.required' => 'Vui lòng nhập tên.',
            'name.string' => 'Tên phải là chuỗi ký tự.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'phone.numeric' => 'Số điện thoại phải là số.',
            'phone.digits' => 'Số điện thoại phải có 10 chữ số.',
            'address.required' => 'Vui lòng nhập địa chỉ.',
            'address.string' => 'Địa chỉ phải là chuỗi ký tự.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
            'zip.string' => 'Mã bưu chính phải là chuỗi ký tự.',
            'zip.max' => 'Mã bưu chính không được vượt quá 10 ký tự.',
            'IsDefault.boolean' => 'Trạng thái mặc định phải là true hoặc false.',
        ]);

        // Cập nhật thông tin người dùng
        $user = auth()->user();
        $user->name = $request->name ?? auth()->user()->name;
        $user->phone = $request->phone;
        $user->address = $request->address;

        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Cập nhật địa chỉ thành công!',
        ]);
    }
    public function detailDoHang($id)
    {
        $payment = Payment::with([
            'booking.tour',
            'booking.status', 
            'paymentMethod',
            'paymentStatus',
            'user',
            'booking'
        ])->findOrFail($id);
        // dd($payment);
        return view('client.myAccount.detailDonHang', compact('payment'));
    }

    public function cancelOrder(Request $request, $id)
{
    $request->validate([
        'ly_do_huy' => 'required|string|max:255',
    ]);
    $payment = Payment::findOrFail($id);
    $bookTour = BookTour::where('id', $payment->booking_id)->first();
    if ($bookTour) {
        $bookTour->ly_do_huy = $request->ly_do_huy;
        $bookTour->status = 13;
        $bookTour->save();
    }
    $payment->status_id = 13;
    $payment->save();
    return redirect()->back()->with('success', 'Đơn hàng đã được hủy thành công.');
}

}
