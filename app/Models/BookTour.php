<?php

namespace App\Models;

use App\Models\Admins\Tour;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookTour extends Model
{
    use HasFactory;
    protected $table = 'book_tour';

    // Các trường có thể mass-assignable (dùng trong phương thức create hoặc update)
    protected $fillable = [
        'user_id',
        'tour_id',
        'guide_id',
        'name',
        'email',
        'phone',
        'address',
        'date_booking',
        'start_date',
        'note',
        'number_old',
        'number_children',
        'total_money',
        'status',
        'sale',
    ];

    // Nếu sử dụng Carbon để làm việc với ngày tháng
    protected $dates = [
        'date_booking',
        'start_date',
    ];

    // Các quan hệ với các model khác, ví dụ: user, tour, guide
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    // public function guide()
    // {
    //     return $this->belongsTo(Guide::class);
    // }
}