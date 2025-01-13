<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    use HasFactory;
    protected $table = 'guides';
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'address',
        'experience',
        'skills',
        'status'
    ];

    public function tours()
    {
        return $this->hasManyThrough(
            Tour::class,        // Bảng đích là Tour
            BookTour::class,    // Bảng trung gian là BookTour
            'guide_id',         // Khóa ngoại trong BookTour trỏ tới Guide
            'id',               // Khóa chính trong Tour
            'id',               // Khóa chính trong Guide
            'tour_id'           // Khóa ngoại trong BookTour trỏ tới Tour
        );
    }
    
    // Quan hệ với bảng users
    public function user()
    {
        return $this->hasOne(User::class);  // Một hướng dẫn viên có thể có một tài khoản người dùng
    }
}
