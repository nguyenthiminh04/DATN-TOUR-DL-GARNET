<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'address',
        'experience',
        'skills',
        'status'
    ];

    // Quan hệ với bảng guide_tours (một hướng dẫn viên có thể được gán nhiều tour)
    public function guideTours()
    {
        return $this->hasMany(Guide_tours::class, 'guide_id');
    }

    // Quan hệ gián tiếp với bảng tours qua bảng guide_tours
    public function tours()
    {
        return $this->belongsToMany(Tour::class, 'guide_tours', 'guide_id', 'tour_id');
    }
    // Quan hệ với bảng users
    public function user()
    {
        return $this->hasOne(User::class);  // Một hướng dẫn viên có thể có một tài khoản người dùng
    }
}
