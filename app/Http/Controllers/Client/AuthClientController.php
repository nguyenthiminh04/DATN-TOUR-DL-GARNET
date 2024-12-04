<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;

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
            return response()->json([
                'status' => 'success',
                'message' => 'Đăng nhập thành công!',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Email hoặc mật khẩu không chính xác.',
            ]);
        }
    }


    public function DangKy()
    {
        return view('client.auth.register');
    }
    public function postDangKy(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'lastName' => 'required|string|max:50',
            'firstName' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ], [
            'lastName.required' => 'Họ là bắt buộc.',
            'lastName.string' => 'Họ phải là chuỗi ký tự.',
            'lastName.max' => 'Họ không được vượt quá 50 ký tự.',

            'firstName.required' => 'Tên là bắt buộc.',
            'firstName.string' => 'Tên phải là chuỗi ký tự.',
            'firstName.max' => 'Tên không được vượt quá 50 ký tự.',

            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email phải có định dạng hợp lệ.',
            'email.unique' => 'Email này đã được đăng ký.',

            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
        ]);
        $name = $request->lastName . ' ' . $request->firstName;
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
        ]);
        return redirect()->route('dang-nhap')->with('success', 'Đăng ký thành công');
    }
    public function logouts(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('dang-nhap')->with('success', 'Đã đăng xuất thành công');
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
}
