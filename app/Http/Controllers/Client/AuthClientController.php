<?php

namespace App\Http\Controllers\Client;

use App\Models\User;
use App\Models\BookTour;
use Illuminate\Http\Request;
use App\Models\Admins\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use App\Http\Requests\RegisterRequest;
use App\Models\Payment;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class AuthClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function DangNhap()
    {
        return view('client.auth.login');
    }
    public function postDangNhap(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email phải có định dạng hợp lệ.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'validation_error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->status == 1) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Đăng nhập thành công!',
                ]);
            } else if ($user->status == 0) {

                if (Auth::check() && Auth::user()->role_id != 1) {
                    Auth::logout();
                }

                return response()->json([
                    'status' => 'error',
                    'message' => 'Tài khoản của bạn hiện đang bị vô hiệu hóa!',
                ]);
            }
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Email hoặc mật khẩu không chính xác!',
            ]);
        }
    }


    public function DangKy()
    {
        return view('client.auth.register');
    }
    public function postDangKy(RegisterRequest $request)
    {
        try {
            DB::beginTransaction(); // Bắt đầu transaction để đảm bảo tính toàn vẹn dữ liệu

            // Tạo tài khoản người dùng mới
            $name = $request->lastName . ' ' . $request->firstName;

            // Lấy temporary_user_id từ session
            $temporaryUserId = Session::get('temporary_user_id');

            if ($temporaryUserId) {
                // Tìm khách hàng ẩn danh theo temporary_user_id
                $anonymousCustomer = Customer::where('temporary_user_id', $temporaryUserId)->first();

                // Kiểm tra nếu khách hàng ẩn danh tồn tại và email trùng khớp
                if (!$anonymousCustomer || $anonymousCustomer->email !== $request->email) {
                    $temporaryUserId = null; // Xóa temporary_user_id nếu email không khớp
                }
            }

            // Nếu không có temporary_user_id, tạo mới và lưu vào session
            if (!$temporaryUserId) {
                $temporaryUserId = (string) Str::uuid(); // Tạo UUID mới
                Session::put('temporary_user_id', $temporaryUserId);
            }

            // Tạo người dùng mới
            $user = User::create([
                'name' => $name,
                'email' => $request->email,
                'phone' => $request->phone ?? null,
                'address' => $request->address ?? null,
                'avatar' => $request->avatar ?? null,
                'birth' => $request->birth ?? null,
                'gender' => $request->gender ?? null,
                'password' => Hash::make($request->password),
                'status' => 1,
                'remember_token' => $request->session()->token(),
                'role_id' => 2,
                'temporary_user_id' => $temporaryUserId, // Lưu temporary_user_id vào bảng users
            ]);

            // Nếu temporary_user_id khớp với khách hàng ẩn danh
            if ($anonymousCustomer && $anonymousCustomer->temporary_user_id === $temporaryUserId) {
                // Chuyển đơn hàng từ khách hàng ẩn danh sang tài khoản mới
                Payment::where('customer_id', $anonymousCustomer->id)
                    ->update(['user_id' => $user->id]); // Cập nhật user_id trong bảng payments

                // Xóa temporary_user_id khỏi session
                Session::forget('temporary_user_id');
            }

            DB::commit(); // Kết thúc transaction thành công

            return response()->json([
                'status' => 'success',
                'message' => 'Đăng ký thành công!',
            ]);
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback nếu có lỗi
            return response()->json([
                'status' => 'error',
                'message' => 'Đã xảy ra lỗi trong quá trình xử lý, vui lòng thử lại.',
            ], 500);
        }
    }

    public function logouts(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('homehome')->with('success', 'Đã đăng xuất thành công');
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback()
    {
        // $users = Socialite::driver('google')->user();
        // dd($users);
        try {
            $googleUser = Socialite::driver('google')->user();
            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'password' => Hash::make(uniqid()),
                    'role_id' => 2,
                ]);
            }

            Auth::login($user);

            if ($user->role_id == 1) {
                // return redirect()->route('admin')->with('success', 'Đăng nhập bằng Google thành công (Admin)');
                echo (123);
            } elseif ($user->role_id == 2) {
                return redirect()->route('home')->with('success', 'Đăng nhập bằng Google thành công (User)');
            }
        } catch (\Exception $e) {
            return redirect()->route('dang-nhap')->with('error', 'Đăng nhập bằng Google thất bại');
        }
    }


    public function sendResetMK(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email không hợp lệ.',
            'email.exists' => 'Email này không tồn tại.',
        ]);

        $response = Password::sendResetLink(
            $request->only('email')
        );

        if ($response == Password::RESET_LINK_SENT) {
            return back()->with('success', 'Một liên kết để đặt lại mật khẩu đã được gửi đến email của bạn.');
        } else {
            return back()->withErrors(['email' => 'Đã có lỗi xảy ra. Vui lòng thử lại.']);
        }
    }
    public function showResetForm($token)
    {
        return view('auth.passwords.reset', ['token' => $token]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|confirmed',
            'token' => 'required',
        ]);

        $response = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();
            }
        );

        if ($response == Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', 'Mật khẩu của bạn đã được cập nhật thành công.');
        } else {
            return back()->withErrors(['email' => trans($response)]);
        }
    }


    public function checkUserStatus()
    {
        if (!Auth::check()) {
            return response()->json([
                'status' => 0,
                'message' => 'Vui lòng đăng nhập để tiếp tục.'
            ], 401);
        }

        $user = Auth::user();

        if ($user->status != 1) {
            if ($user->role_id != 1) {
                Auth::logout();
            }

            return response()->json([
                'status' => 0,
                'message' => 'Tài khoản của bạn đã bị vô hiệu hóa.'
            ]);
        }

        return response()->json([
            'status' => 1,  // Trạng thái là 1 (hoạt động)
            'message' => 'Tài khoản vẫn đang hoạt động.'
        ]);
    }
}
