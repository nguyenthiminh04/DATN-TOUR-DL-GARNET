<?php

namespace App\Models\Admins;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    protected $table = 'users';  // Tên bảng thực sự trong cơ sở dữ liệu
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'avatar',
        'birth',
        'gender',
        'role_id',
        'password',
    ];
    protected $cats = [
        'status' => 'boolean',
    ];
public function Role()
{
    return $this->belongsTo(Role::class);
}
}
