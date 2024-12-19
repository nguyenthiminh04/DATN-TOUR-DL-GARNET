<?php

if (!function_exists('hasPermission')) {
    /**
     * Kiểm tra quyền của người dùng hiện tại.
     *
     * @param string $permission
     * @return bool
     */
    function hasPermission(string $permission): bool
    {
        if (auth()->check()) {
            $permissions = auth()->user()->permissions->pluck('name')->toArray();
            return in_array($permission, $permissions);
        }

        return false;
    }
}
