<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordMail;
use App\Models\Admins\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Str;

class PasswordController extends Controller
{
    public function forgotPassword()
    {
        return view('client.auth.forgotpassword');
    }

    public function postForgotPassword(Request $request)
    {
        $user = User::getEmailSingle($request->email);

        if (!empty($user)) {
            $token = Str::random(30);
            $user->remember_token = $token;
            $user->token_created_at = Carbon::now();
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return response()->json(['message' => 'Vui lòng kiểm tra email và đặt lại mật khẩu của bạn!']);
        } else {
            return response()->json(['message' => 'Không tìm thấy email!'], 404);
        }
    }


    private function isTokenExpired($tokenCreatedAt)
    {
        $createdAt = \Carbon\Carbon::parse($tokenCreatedAt);
        return $createdAt->diffInHours(now()) > 24;
    }

    public function resetPassword($remember_token)
    {
        try {
            $user = User::getTokenSingle($remember_token);

            if (!$user || $this->isTokenExpired($user->token_created_at)) {
                abort(503, 'Service Unavailable');
            }

            $data['user'] = $user;
            return view('client.auth.restpassword', $data);
        } catch (\Exception $e) {

            \Log::error('Lỗi truy xuất người dùng để đặt lại mật khẩu: ' . $e->getMessage());

            abort(503, 'Service Unavailable');
        }
    }

    public function postResetPassword($token, Request $request)
    {
        if ($request->password == $request->cpassword) {

            $user = User::getTokenSingle($token);
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(30);
            $user->save();

            return redirect(url('/'))->with('success', 'Đặt lại mật khẩu thành công!');
        } else {
            return redirect()->back()->with('error', 'Mật khẩu và Xác nhận mật khẩu không khớp!');
        }
    }
}
