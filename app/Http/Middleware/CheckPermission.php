<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $permission)
    {
        $user = Auth::user();

        // Chỉ kiểm tra quyền nếu user tồn tại và role_id là 3
        if ($user && $user->role_id == 3) {
            if (!$user->hasPermission($permission)) {
                // Trả về lỗi 403 nếu không có quyền
                return response()->view('admin.errors.403', [], Response::HTTP_FORBIDDEN);
            }
        }

        return $next($request);
    }
}
